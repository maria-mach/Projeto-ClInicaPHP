let contador = 0;

$(document).ready(function () {
  BoasVindas(); // Chama a saudação
  $("#infoClick").click(cliqueInfo); // Configura o clique para mostrar info
  $(".cdhover").hover(MouseEntrou, MouseSaiu); // Configura o efeito de hover
  $(".btn-ver-detalhes").click(VerDetalhes); // Configura botões de "Ver mais detalhes" em detalhes.html
  $("#btn_contador").click(Incrementar); // Configura o contador de clientes
  $("#formOb").submit(ValideForm); // Configura a validação do formulário
  $("#txt_mensagem").on("input", attContador); // Configura o contador de caracteres em tempo real
  BtnTopo(); // Inicializa a lógica do botão "Voltar ao Topo"
  $("#btn_comentarios").click(carregarComentarios); // Configura o carregamento via JSON
  ConfigurarGaleria(); // Configura a galeria interativa na página Clientes

});


// Função que exibe o Toast de boas-vindas apenas na Home
function BoasVindas() {
  var caminho = window.location.pathname;
  // Verifica se estamos na raiz ou na página index.html ou index.php
  if (caminho === "/" || caminho.endsWith("index.html") || caminho.endsWith("index.php")) {
    const toastLiveExample = document.getElementById('welcomeToast');
    if (toastLiveExample) {
      // Inicializa o componente de Toast do Bootstrap e o exibe
      const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
      toastBootstrap.show();
    }
  }
}

// Alterna a visibilidade (toggle) de um elemento de informação
function cliqueInfo() {
  $("#infoMostrar").toggleClass("d-none");
}

// Altera a cor de fundo para azul claro quando o mouse entra no elemento
function MouseEntrou() {
  $(this).css("background-color", "lightblue");
}

// Restaura a cor de fundo para branco quando o mouse sai do elemento
function MouseSaiu() {
  $(this).css("background-color", "white");
}

// Alterna a visibilidade de seções escondidas com efeito de slide (toggle)
function VerDetalhes() {
  // Obtém o ID do alvo através do atributo 'data-target'. Se não existir, usa 'infoDetalhes' como padrão.
   const targetId = $(this).attr("data-target") || "infoDetalhes";
  // Alterna a visibilidade com o efeito de deslizamento em 1 segundo
  $(`#${targetId}`).slideToggle(1000);
}

// Incrementa o contador global e atualiza o texto no HTML
function Incrementar() {
  contador++;
  $("#contador").text(contador);
}

// Valida o formulário antes do envio
function ValideForm(event) {
  event.preventDefault(); // Impede o recarregamento da página

  // Obtém os valores e remove espaços em branco extras
  let nome = $("#nome").val().trim();
  let email = $("#email").val().trim();

  // Verifica se os campos estão vazios
  if (nome === "" || email === "") {
    $("#mensagem").text("Todos os campos devem estar preenchidos!");
  } else {
    // Se estiver tudo ok, faz a mensagem de erro sumir suavemente
    $("#mensagem").fadeOut(1000);
  }
}

// Atualiza o contador de caracteres conforme o usuário digita
function attContador() {
  let qtd = $("#txt_mensagem").val().length;
  $("#txt_contador").text(qtd + " caracteres");
}

// Lógica do botão de "Voltar ao Topo"
function BtnTopo() {
  // Garante que o botão comece escondido
  $("#btnTopo").hide();

  $(window).scroll(function () {
    // Se a rolagem chegar perto do final da página (50px do fim), mostra o botão
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 50) {
      $("#btnTopo").fadeIn();
    } else {
      $("#btnTopo").fadeOut();
    };
  })

  // Ao clicar no botão, rola a página suavemente até o topo em 800ms
  $("#btnTopo").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 800);
  })
}

// Função que carrega comentários de um arquivo JSON e monta o carrossel
function carregarComentarios() {
  // Usa o jQuery para ler o arquivo JSON de forma simples
  $.getJSON(BASE_URL + "js/comentarios.json", function (dados) {
    const $inner = $("#carouselDepoimentos .carousel-inner");
    $inner.empty(); // Limpa itens antigos

    // Adiciona cada comentário como um item do carrossel
    dados.forEach((c, i) => {
      $inner.append(`
        <div class="carousel-item ${i === 0 ? "active" : ""} text-center">
          <blockquote class="blockquote">
            <p>"${c.comentario}"</p>
            <footer class="blockquote-footer mt-2">${c.autor}</footer>
          </blockquote>
        </div>
      `);
    });

    // Mostra o carrossel apenas agora que tem conteúdo
    $("#carrosel").show();

    // Inicializa o componente
    const carousel = new bootstrap.Carousel("#carouselDepoimentos", {
      interval: 3000, // Passa sozinho a cada 3 segundos
      pause: 'hover'  // Pausa se o mouse estiver em cima
    });

    // Adiciona o clique para passar para o próximo slide
    $("#carouselDepoimentos").css("cursor", "pointer").click(function() {
      carousel.next();
    });
  }).fail(function () {
    console.error("Erro ao carregar comentários.");
  });
}

// Configura a galeria interativa na página Clientes
function ConfigurarGaleria() {
  // Quando clica em uma imagem da galeria
  $(".galeria-item").click(function() {
    // Pega o caminho da imagem clicada
    let src = $(this).attr("src");
    // Pega o texto alternativo (legenda)
    let alt = $(this).attr("alt");
    
    // Atualiza a imagem no modal
    $("#imgModal").attr("src", src);
    // Atualiza o título do modal com o texto da imagem
    $("#modalGaleriaLabel").text(alt);
    
    // Abre o modal usando o Bootstrap
    const modalElement = document.getElementById('modalGaleria');
    if (modalElement) {
      const modal = new bootstrap.Modal(modalElement);
      modal.show();
    }
  });
}
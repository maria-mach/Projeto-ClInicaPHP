let contador = 0;

$(document).ready(function () {
  boasVindas(); // Chama a saudação
  $("#infoClick").click(cliqueInfo); // Configura o clique para mostrar info
  $(".cdhover").hover(MouseEntrou, MouseSaiu); // Configura o efeito de hover
  $(".btn-ver-detalhes").click(VerDetalhes); // Configura botões de "Ver mais detalhes" em detalhes.html
  $("#btn_contador").click(Incrementar); // Configura o contador de clientes
  $("#formOb").submit(ValideForm); // Configura a validação do formulário
  $("#txt_mensagem").on("input", attContador); // Configura o contador de caracteres em tempo real
  BtnTopo(); // Inicializa a lógica do botão "Voltar ao Topo"
  ConfigurarGaleria(); // Configura a galeria interativa na página Clientes
  ConfigurarAgendamento(); // Configura o modal de agendamento
});


// Função que exibe o Toast de boas-vindas apenas na Home
function boasVindas() {
  const toastLiveExample = document.getElementById("welcomeToast");

  if (toastLiveExample && window.bootstrap?.Toast) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
    toastBootstrap.show();
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

function ValideForm(event) {
  let nome = $("#nome").val().trim();
  let email = $("#email").val().trim();
  let assunto = $("#assunto").val().trim();
  let tipo = $("#tipo").val().trim();
  let mensagem = $("#txt_mensagem").val().trim();

  if (nome === "" || email === "" || assunto === "" || tipo === "" || mensagem === "") {
    event.preventDefault();

    $("#mensagem")
      .removeClass()
      .addClass("alert alert-danger")
      .text("Todos os campos devem estar preenchidos!");
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

function ConfigurarAgendamento() {

  $(document).on("click", ".btnAgendar", function () {

    $("#servico_id").val($(this).data("id"));
    $("#servico_nome").val($(this).data("nome"));

    $("#unidade_id").val("");
    $("#data_agendamento").val("");

    $("#aviso_horario").text("");

    $("#horario").html(
      '<option value="">Selecione uma unidade e uma data primeiro</option>'
    );

  });

  $(document).on("change", "#unidade_id, #data_agendamento", function () {

    let unidade = $("#unidade_id").val();
    let data = $("#data_agendamento").val();

    $("#aviso_horario").text("");

    if (unidade === "" || data === "") {
      $("#horario").html(
        '<option value="">Selecione uma unidade e uma data primeiro</option>'
      );
      return;
    }

    $("#horario").html(
      '<option value="">Carregando horários...</option>'
    );

    $.get(
      URL_HORARIOS,
      {
        unidade_id: unidade,
        data_agendamento: data
      },
      function (resposta) {

        let html = "";

        if (!resposta.sucesso) {
          $("#aviso_horario").text(resposta.mensagem);

          html = `<option value="">${resposta.mensagem}</option>`;
          $("#horario").html(html);
          return;
        }

        const horarios = resposta.dados;

        if (horarios.length === 0) {
          $("#aviso_horario").text("Nenhum horário disponível para esta unidade nesta data.");
          html = '<option value="">Nenhum horário disponível</option>';
        } else {
          $("#aviso_horario").text("");
          html = '<option value="">Selecione...</option>';

          horarios.forEach(function (hora) {
            html += `<option value="${hora}">${hora}</option>`;
          });
        }

        $("#horario").html(html);

      },
      "json"
    );

  });

}

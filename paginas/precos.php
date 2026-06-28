<?php
$tituloPagina = 'Clínica Geral | Preços';
require_once __DIR__ . '/../partials/header.php';
?>

        <main class="app-main">
            <div class="app-content mt-4">
                <div class="container">

                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="fw-bold text-success"><i class="fas fa-tags me-2"></i>Preços</h2>
                            <p class="text-muted">Bem-vindo à seção Preços.</p>
                        </div>
                    </div>


                    <div class="table-responsive bg-white rounded shadow-sm p-4">
                        <table class="table table-hover align-middle">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col">Serviço/Especialidade</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Valor Médio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Clínico Geral</td>
                                    <td>Consulta</td>
                                    <td>R$ 120,00</td>
                                </tr>
                                <tr>
                                    <td>Cardiologia</td>
                                    <td>Consulta</td>
                                    <td>R$ 180,00</td>
                                </tr>
                                <tr>
                                    <td>Pediatria</td>
                                    <td>Consulta</td>
                                    <td>R$ 150,00</td>
                                </tr>
                                <tr>
                                    <td>Ortopedia</td>
                                    <td>Consulta</td>
                                    <td>R$ 160,00</td>
                                </tr>
                                <tr>
                                    <td>Exames Laboratoriais</td>
                                    <td>Exame</td>
                                    <td>A partir de R$ 40,00</td>
                                </tr>
                                <tr>
                                    <td>Exames de Imagem</td>
                                    <td>Exame</td>
                                    <td>A partir de R$ 150,00</td>
                                </tr>
                                <tr>
                                    <td>Cirurgias Eletivas</td>
                                    <td>Cirurgia</td>
                                    <td>A partir de R$ 3.500,00</td>
                                </tr>
                                <tr>
                                    <td>Procedimentos Ambulatoriais</td>
                                    <td>Cirurgia</td>
                                    <td>A partir de R$ 1.200,00</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="alert alert-info mt-3"><i class="bi bi-info-circle me-2"></i>Os valores são apenas
                            referenciais e dependem da complexidade de cada caso. Consulte a clínica para um orçamento
                            exato.
                        </div> <!-- /.alert -->
                    </div> <!-- /.table-responsive -->

                </div> <!-- /.container (top) -->
            </div> <!-- /.app-content -->
        </main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>

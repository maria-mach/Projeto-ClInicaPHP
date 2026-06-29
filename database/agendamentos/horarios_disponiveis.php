<?php
require_once __DIR__ . '/../helpers/json_helper.php';
require_once __DIR__ . '/agendamentos_funcs.php';
require_once __DIR__ . '/../unidades/unidades_funcs.php';

$unidadeId = filter_input(INPUT_GET, 'unidade_id', FILTER_VALIDATE_INT);
$data = trim($_GET['data_agendamento'] ?? '');

if (!$unidadeId) {
    resposta_json(false, null, 'Selecione uma unidade.', 400);
}

if ($data === '') {
    resposta_json(false, null, 'Selecione uma data.', 400);
}

if ($data < date('Y-m-d')) {
    resposta_json(false, null, 'Não é possível agendar em datas anteriores à data atual.', 400);
}

if (!unidade_funciona_na_data($unidadeId, $data)) {
    resposta_json(
        false,
        null,
        'Esta unidade não atende nesta data.',
        200
    );
}

$horarios = listar_horarios_disponiveis($unidadeId, $data);
$horariosPermitidos = array_values(array_filter($horarios, function (string $horario) use ($unidadeId): bool {
    return horario_dentro_funcionamento($unidadeId, $horario);
}));

resposta_json(true, $horariosPermitidos);
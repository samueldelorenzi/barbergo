<?php
// Conexão com o banco de dados
include '../../controllers/banco.php';
include_once '../../helpers/auxiliares.php';
include '../../models/Agendamentos.php';
include '../../models/Cliente.php';

$agendamentos = Agendamento::listar($conexao);

$agendamentos_hoje = [];
$agendamentos_amanha = [];
$agendamentos_demais = [];

foreach ($agendamentos as $agendamento) {
    $data_agendamento = date('Y-m-d', strtotime($agendamento['dia']));
    $data_hoje = date('Y-m-d');
    $data_amanha = date('Y-m-d', strtotime('+1 day'));

    if ($data_agendamento == $data_hoje) {
        $agendamentos_hoje[] = $agendamento;
    } elseif ($data_agendamento == $data_amanha) {
        $agendamentos_amanha[] = $agendamento;
    } else {
        $agendamentos_demais[] = $agendamento;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberGO - Agendamentos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../../assets/img/icone.png" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/style-menus.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <h3 class="mb-3 card-header text-center">Hoje</h3>
            <div class="card-body">
                <table id="tabela-agendamentos" class=" table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Serviço</th>
                            <th>Dia</th>
                            <th>Hora</th>
                            <th>Preço</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        <?php if (!empty($agendamentos_hoje)) :
                            $soma = 0;
                            $hora_atual = strtotime(date('H:i')); // Hora atual
                            $proximo_horario = null;
                            $proxima_linha = null;
                        ?>
                            <?php foreach ($agendamentos_hoje as $index => $agendamento) :
                                $servico = get_servico_by_id($conexao, $agendamento['id_servico']);
                                $cliente = Cliente::get_cliente_by_id($conexao, $agendamento['id_cliente']);
                                $hora_agendamento = strtotime($agendamento['hora']); // Hora do agendamento
                                $data_formatada = converte_data_usuario($agendamento['dia']);
                                $hora_formatada = date('H:i', $hora_agendamento);
                                $soma += $servico['preco'];

                                // Verifica se é o próximo horário após a hora atual
                                if ($hora_atual < $hora_agendamento && ($proximo_horario === null || $hora_agendamento < $proximo_horario)) {
                                    $proximo_horario = $hora_agendamento;
                                    $proxima_linha = $index; // Armazena o índice da linha que será destacada
                                }
                            ?>
                                <tr class="<?php echo ($proxima_linha === $index) ? 'highlight' : ''; ?>">
                                    <td><?php echo "{$cliente['nome']}"; ?></td>
                                    <td><?php echo "{$servico['nome']}"; ?></td>
                                    <td><?php echo $data_formatada; ?></td>
                                    <td><?php echo $hora_formatada; ?></td>
                                    <td><?php echo "R\${$servico['preco']}"; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4" class="text-right fw-bold">Total diário</td>
                                <td><?php echo "R\${$soma}"; ?></td>
                            </tr>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" class="text-center">
                                    <a class="btn btn-primary btn-sm">
                                        Não há agendamentos. Aproveite o descanso.
                                    </a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="card">
            <h3 class="mb-3 card-header text-center">Amanhã</h3>
            <div class="card-body">
                <table id="tabela-agendamentos" class=" table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Serviço</th>
                            <th>Dia</th>
                            <th>Hora</th>
                            <th>Preço</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        <?php if (!empty($agendamentos_amanha)) : ?>
                            <?php foreach ($agendamentos_amanha as $agendamento) : ?>
                                <?php
                                // Obter detalhes do serviço
                                $servico = get_servico_by_id($conexao, $agendamento['id_servico']);
                                $cliente = Cliente::get_cliente_by_id($conexao, $agendamento['id_cliente']);
                                $hora_formatada = date('H:i', strtotime($agendamento['hora']));
                                $data_fortada = converte_data_usuario($agendamento['dia']);
                                ?>
                                <tr>
                                    <td><?php echo "{$cliente['nome']}"; ?></td>
                                    <td><?php echo "{$servico['nome']}"; ?></td>
                                    <td><?php echo $data_fortada; ?></td>
                                    <td><?php echo $hora_formatada; ?></td>
                                    <td><?php echo "R\${$servico['preco']}"; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" class="text-center">
                                    <a class="btn btn-primary btn-sm">
                                        Não há agendamentos. Aproveite o descanso.
                                    </a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="card">
            <h3 class="mb-3 card-header text-center">Próximos dias</h3>
            <div class="card-body">
                <table id="tabela-agendamentos" class=" table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Serviço</th>
                            <th>Dia</th>
                            <th>Hora</th>
                            <th>Preço</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        <?php if (!empty($agendamentos_demais)) : ?>
                            <?php foreach ($agendamentos_demais as $agendamento) : ?>
                                <?php
                                // Obter detalhes do serviço
                                $servico = get_servico_by_id($conexao, $agendamento['id_servico']);
                                $cliente = Cliente::get_cliente_by_id($conexao, $agendamento['id_cliente']);
                                $hora_formatada = date('H:i', strtotime($agendamento['hora']));
                                $data_fortada = converte_data_usuario($agendamento['dia']);
                                ?>
                                <tr>
                                    <td><?php echo "{$cliente['nome']}"; ?></td>
                                    <td><?php echo "{$servico['nome']}"; ?></td>
                                    <td><?php echo $data_fortada; ?></td>
                                    <td><?php echo $hora_formatada; ?></td>
                                    <td><?php echo "R\${$servico['preco']}"; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" class="text-center">
                                    <a class="btn btn-primary btn-sm">
                                        Não há agendamentos. Aproveite o descanso.
                                    </a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
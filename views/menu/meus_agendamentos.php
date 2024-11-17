<?php
// Conexão com o banco de dados
include '../controllers/banco.php';
include_once '../helpers/auxiliares.php';
include '../models/Agendamentos.php';

$agendamentos = Agendamento::listarPorCliente($conexao, $id_cliente);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberGO - Meus agendamentos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../assets/img/icone.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style-menus.css">
</head>
<body>
    <div class="container-fluid">
        <h3 class="mb-3">Meus Agendamentos</h3>
        
        <!-- Tabela de Agendamentos -->
        <table id="tabela-agendamentos" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Serviço</th>
                    <th>Dia</th>
                    <th>Hora</th>
                    <th>Preço</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
            <tbody>
                <?php if (!empty($agendamentos)) : ?>
                    <?php foreach ($agendamentos as $agendamento) : ?>
                        <?php
                            // Obter detalhes do serviço
                            $servico = get_servico_by_id($conexao, $agendamento['id_servico']);
                            $hora_formatada = date('H:i', strtotime($agendamento['hora']));
                            $data_fortada = converte_data_usuario($agendamento['dia']);
                        ?>
                        <tr>
                            <td><?php echo "{$servico['nome']}"; ?></td>
                            <td><?php echo $data_fortada; ?></td>
                            <td><?php echo $hora_formatada; ?></td>
                            <td><?php echo "R\${$servico['preco']}"; ?></td>
                            <td>
                                <a href="../controllers/cancelar_agendamento.php?id=<?php echo $agendamento['id']; ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja cancelar?');">Cancelar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" class="text-center">
                            <a href="painel_usuario.php?pagina=inicio" class="btn btn-primary btn-sm">
                                Você ainda não possui um agendamento. Agende já!
                            </a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

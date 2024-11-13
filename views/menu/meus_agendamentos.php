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
</head>
<body>
<div class="container-fluid">
    <h3 class="mb-3">Meus Agendamentos</h3>

    <!-- Botão para adicionar novo agendamento -->
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAdicionar">
        <i class="fas fa-plus"></i> Novo Agendamento
    </button>
    
    <!-- Tabela de Agendamentos -->
    <table id="tabela-agendamentos" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Serviço</th>
                <th>Dia</th>
                <th>Hora</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
        <tbody>
            <?php if (!empty($agendamentos)) : ?>
                <?php foreach ($agendamentos as $agendamento) : ?>
                    <?php
                        // Obter detalhes do serviço
                        $servico = get_servico_by_id($conexao, $agendamento['id_servico']);
                    ?>
                    <tr>
                        <td><?php echo $servico['nome']; ?></td>
                        <td><?php echo $agendamento['dia']; ?></td>
                        <td><?php echo $agendamento['hora']; ?></td>
                        <td><?php echo $servico['preco']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4">Nenhum agendamento encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal de Adição -->
<div class="modal fade" id="modalAdicionar" tabindex="-1" role="dialog" aria-labelledby="modalAdicionarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAdicionarLabel">Novo Agendamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="../controllers/agendamento.php">
                <input type="hidden" name="action" value="add">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="horario-novo">Dia</label>
                        <input type="date" class="form-control" id="data-nova" name="data" required>
                    </div>
                    <div class="form-group">
                        <label for="horario-novo">Hora</label>
                        <input type="time" class="form-control" id="hora-nova" name="hora" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo-novo">Serviço</label>
                        <select class="form-control" id="tipo-novo" name="servico" required>
                            <option value="1">Corte</option>
                            <option value="2">Barba</option>
                            <option value="3">Corte e Barba</option>
                        </select>
                    </div>
                </div>
                <?php
                    if (isset($_SESSION['success_message'])) {
                        echo '<p class="text-success text-center">' . $_SESSION['success_message'] . '</p>';
                        unset($_SESSION['success_message']);
                    } elseif (isset($_SESSION['error_message'])) {
                        echo '<p class="text-danger text-center">' . $_SESSION['error_message'] . '</p>';
                        unset($_SESSION['success_message']);
                    }
                ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar Agendamento</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de Edição -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarLabel">Editar Agendamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" id="id-editar" name="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nome-editar">Nome</label>
                        <input type="text" class="form-control" id="nome-editar" name="nome" readonly>
                    </div>
                    <div class="form-group">
                        <label for="horario-editar">Horário</label>
                        <input type="time" class="form-control" id="horario-editar" name="horario" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo-editar">Tipo</label>
                        <select class="form-control" id="tipo-editar" name="tipo" required>
                            <option value="Corte">Corte</option>
                            <option value="Barba">Barba</option>
                            <option value="Corte e Barba">Corte e Barba</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Preencher os campos do modal de edição com os dados do agendamento
$('#modalEditar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Botão que acionou o modal
    var id = button.data('id');
    var nome = button.data('nome');
    var horario = button.data('horario');
    var tipo = button.data('tipo');
    
    var modal = $(this);
    modal.find('#id-editar').val(id);
    modal.find('#nome-editar').val(nome);
    modal.find('#horario-editar').val(horario);
    modal.find('#tipo-editar').val(tipo);
});
</script>
</body>
</html>

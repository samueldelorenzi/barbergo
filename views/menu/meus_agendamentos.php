<?php
// Conexão com o banco de dados
include '../controllers/banco.php';

// Verifica se o cliente está logado
if (isset($_SESSION['id_cliente'])) {
    $id_cliente = $_SESSION['id_cliente']; // Pega o ID do cliente logado

    // Consulta para pegar o nome do cliente (opcional, caso você precise mostrar o nome em algum lugar)
    $sql_cliente = "SELECT nome FROM cliente WHERE id = '$id_cliente'";
    $result_cliente = mysqli_query($conexao, $sql_cliente);

    // Verifica se encontrou o cliente
    if ($result_cliente && mysqli_num_rows($result_cliente) > 0) {
        $row_cliente = mysqli_fetch_assoc($result_cliente);
        $cliente_nome = $row_cliente['nome']; // Armazena o nome do cliente
    } else {
        $cliente_nome = "Cliente não encontrado"; // Caso o cliente não seja encontrado
    }

    // Insere o agendamento no banco se o formulário for enviado
    if (isset($_POST['action']) && $_POST['action'] == 'add') {
        // Coletando os dados do formulário
        $id_servico = $_POST['id_servico']; // ID do serviço
        $data_hora = $_POST['data_hora'];  // Data e hora do agendamento
        $status = $_POST['status'];         // Status do agendamento (Agendado, Cancelado, Pendente)

        // Verifica se os campos obrigatórios estão preenchidos
        if (empty($id_servico) || empty($data_hora) || empty($status)) {
            echo "Por favor, preencha todos os campos!";
        } else {
            // Usando prepared statements para evitar SQL injection
            $sql = "INSERT INTO agendamento (id_cliente, id_servico, data_hora, status) 
                    VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($conexao, $sql);

            if ($stmt) {
                // Bind dos parâmetros: 'i' para inteiro (id_cliente, id_servico) e 's' para string (data_hora, status)
                mysqli_stmt_bind_param($stmt, "iiss", $id_cliente, $id_servico, $data_hora, $status);

                // Executa a consulta
                if (mysqli_stmt_execute($stmt)) {
                    // Redireciona para a mesma página para evitar reenvio do formulário
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit;
                } else {
                    echo "Erro ao executar a consulta: " . mysqli_error($conexao);
                }

                // Fecha a declaração
                mysqli_stmt_close($stmt);
            } else {
                echo "Erro ao preparar a consulta: " . mysqli_error($conexao);
            }
        }
    }
} else {
    echo "Você não está logado.";
}



// Função para editar um agendamento
if (isset($_POST['action']) && $_POST['action'] == 'edit') {
    $id = $_POST['id'];
    $nome = $cliente_nome;  // Nome do cliente já pego da sessão
    $horario = $_POST['horario'];
    $tipo = $_POST['tipo'];
    $status = $_POST['status'];

    $sql = "UPDATE agendamento SET nome='$nome', horario='$horario', tipo='$tipo', status='$status' WHERE id=$id";
    mysqli_query($conexao, $sql);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

// Função para excluir um agendamento
if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = $_POST['id'];

    $sql = "DELETE FROM agendamento WHERE id=$id";
    mysqli_query($conexao, $sql);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Agendamentos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                <th>Nome</th>
                <th>Horário</th>
                <th>Tipo</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
               $sql = "SELECT agendamento.id, cliente.nome, agendamento.data_hora, agendamento.status, servico.tipo
               FROM agendamento
               JOIN cliente ON agendamento.id_cliente = cliente.id
               JOIN servico ON agendamento.id_servico = servico.id
               WHERE agendamento.id_cliente = '$id_cliente'";
       

         $result = mysqli_query($conexao, $sql);
         while ($row = mysqli_fetch_assoc($result)) {
             echo "<tr>";
             echo "<td>" . $row['nome'] . "</td>";  // Nome do cliente
             echo "<td>" . $row['data_hora'] . "</td>";  // Horário do agendamento
             echo "<td>" . $row['tipo'] . "</td>";  // Tipo de serviço
             echo "<td>" . $row['status'] . "</td>";  // Status do agendamento
             echo "<td>
                     <button class='btn btn-info btn-sm' data-toggle='modal' data-target='#modalEditar' data-id='{$row['id']}'>
                         <i class='fas fa-edit'></i> Editar
                     </button>
                     <button class='btn btn-danger btn-sm' onclick='deletarAgendamento({$row['id']})'>
                         <i class='fas fa-trash'></i> Excluir
                     </button>
                  </td>";
             echo "</tr>";
         }
                
            ?>
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
            <form method="POST" action="">
                <input type="hidden" name="action" value="add">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nome-novo">Nome</label>
                        <!-- Nome do cliente já é preenchido automaticamente -->
                        <input type="text" class="form-control" id="nome-novo" name="nome" value="<?php echo $cliente_nome; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="horario-novo">Horário</label>
                        <input type="time" class="form-control" id="horario-novo" name="horario" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo-novo">Tipo</label>
                        <select class="form-control" id="tipo-novo" name="tipo" required>
                            <option value="Corte">Corte</option>
                            <option value="Barba">Barba</option>
                            <option value="Corte e Barba">Corte e Barba</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status-novo">Status</label>
                        <select class="form-control" id="status-novo" name="status" required>
                            <option value="Agendado">Agendado</option>
                            <option value="Concluído">Concluído</option>
                            <option value="Cancelado">Cancelado</option>
                        </select>
                    </div>
                </div>
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
                    <div class="form-group">
                        <label for="status-editar">Status</label>
                        <select class="form-control" id="status-editar" name="status" required>
                            <option value="Agendado">Agendado</option>
                            <option value="Concluído">Concluído</option>
                            <option value="Cancelado">Cancelado</option>
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
    var status = button.data('status');
    
    var modal = $(this);
    modal.find('#id-editar').val(id);
    modal.find('#nome-editar').val(nome);
    modal.find('#horario-editar').val(horario);
    modal.find('#tipo-editar').val(tipo);
    modal.find('#status-editar').val(status);
});
</script>
</body>
</html>

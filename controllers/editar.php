<?php
// Inclua seus arquivos de conexão e helpers
include '../controllers/banco.php';
include '../helpers/auxiliares.php';
include '../models/Agendamentos.php';

if (isset($_GET['id'])) {
    $id_agendamento = $_GET['id'];

    $agendamento = Agendamento::listarPorId($conexao, $id_agendamento);
    $servicos = get_servicos($conexao); // Função para listar os serviços

    if (!$agendamento) {
        echo "Agendamento não encontrado!";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_servico = $_POST['servico'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];

    $resultado = Agendamento::atualizar($conexao, $id_agendamento, $id_servico, $data, $hora);

    if ($resultado) {
        header("Location: meus_agendamentos.php");
        exit;
    } else {
        echo "Erro ao atualizar agendamento.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Agendamento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h3 class="mb-3">Editar Agendamento</h3>
        <form action="editar_agendamento.php?id=<?php echo $agendamento['id']; ?>" method="POST">
            <div class="form-group">
                <label for="servico">Serviço</label>
                <select name="servico" id="servico" class="form-control" required>
                    <?php foreach ($servicos as $servico) : ?>
                        <option value="<?php echo $servico['id']; ?>" <?php echo $agendamento['id_servico'] == $servico['id'] ? 'selected' : ''; ?>>
                            <?php echo $servico['nome']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <input type="date" name="data" id="data" class="form-control" value="<?php echo $agendamento['dia']; ?>" required>
            </div>
            <div class="form-group">
                <label for="hora">Hora</label>
                <input type="time" name="hora" id="hora" class="form-control" value="<?php echo $agendamento['hora']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
</body>

</html>
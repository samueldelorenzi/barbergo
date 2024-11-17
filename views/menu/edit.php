<?php




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processar a atualização do agendamento
    $id_servico = $_POST['servico'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];

    // Atualize o agendamento no banco
    $resultado = Agendamento::atualizar($conexao, $id_agendamento, $id_servico, $data, $hora);

    if ($resultado) {
        header("Location: meus_agendamentos.php"); // Redireciona de volta para a lista de agendamentos
        exit;
    } else {
        echo "Erro ao atualizar agendamento.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Agendamento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../assets/img/icone.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style-menus.css">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-3">Editar Agendamento</h3>
        </div>
        <div class="card-body">
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

                <div class="text-center">
                    <button type="submit" name="gravar" class="btn btn-primary w-50 mt-3 p-2">Salvar alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>

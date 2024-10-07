<?php
session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: form_login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1920x1080, initial-scale=1.0">
    <title>BarberGO</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" href="../anexos/icone.png" type="image/x-icon">
</head>
<body>
    <div class="title">
        <h1>BarberGO</h1>
        <h3>Agendamento</h3>
    </div>
    <div class="container">
        <form method="POST" action="../controllers/agendamento.php">
            <label for="servico">Qual serviço está procurando?</label>
            <select id="servico" name="servico" required>
                <option value="corte">Corte</option>
                <option value="barba">Barba</option>
                <option value="corte e barba">Corte e Barba</option>
            </select>

            <label for="data">Qual melhor dia para atendê-lo?</label>
            <input type="date" id="data" name="data" required>

            <label for="hora">Qual melhor horário para atendê-lo?</label>
            <input type="time" id="hora" name="hora" required>

            <input type="submit" value="Agendar">
        </form>

    </div>
</body>
</html>
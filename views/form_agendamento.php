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
    <div class="header">
        <div id="header-left">
            <a href="../views/meus_agendamentos.php">Meus agendamentos</a>
        </div>
        <div id="header-right">
            <p><?php echo $_SESSION['usuario_email']; ?></p>
            <a href="../controllers/logout.php">Sair</a>
        </div>
    </div>

    <div class="title">
        <h1>BarberGO</h1>
        <h3>Agendamento</h3>
    </div>
    <div class="container">
        <form method="POST" action="../controllers/agendamento.php">
            <label for="servico">Qual serviço está procurando?</label>
            <select id="servico" name="servico" required>
                <option value="0">Corte</option>
                <option value="1">Barba</option>
                <option value="2">Corte e Barba</option>
            </select>

            <label for="data">Qual melhor dia para atendê-lo?</label>
            <input type="date" id="data" name="data" required>

            <label for="hora">Qual melhor horário para atendê-lo?</label>
            <input type="time" id="hora" name="hora" min="09:00" max="18:00" step="1800" required>

            <?php
                    session_start();

                    if (isset($_SESSION['success_message'])) 
                    {
                        echo '<p style="color: green;">' . $_SESSION['success_message'] . '</p>';
                        unset($_SESSION['success_message']);
                    }
                    else
                    {
                        echo '<p style="color: red;">' . $_SESSION['error_message'] . '</p>';
                        unset($_SESSION['error_message']);
                    }
            ?>
            <br>

            <input type="submit" value="Agendar">
        </form>

    </div>
</body>
</html>
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include '../helpers/auxiliares.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $selectedDate = isset($_POST['data']) ? new DateTime($_POST['data']) : new DateTime();

    if (!isset($_SESSION['usuario_logado'])) {
        header("Location: form_login.php");
        exit();
    }

    date_default_timezone_set('America/Sao_Paulo');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1920x1080, initial-scale=1.0">
    <title>BarberGO</title>
    <link rel="stylesheet" href="../assets/css/style.css">
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
        <form method="POST">
            <label for="data">Qual melhor dia para atendê-lo?</label>
            <input type="date" id="data" name="data" value="<?php echo $selectedDate->format('Y-m-d'); ?>" required>
            <input type="submit" value="Ver horários">
        </form>

        <br>

        <div id="div-horarios">
            <?php 
                getHorariosDisp($selectedDate);
            ?>

        <?php
                if (isset($_SESSION['success_message'])) 
                {
                    echo '<p style="color: green;">' . $_SESSION['success_message'] . '</p>';
                    unset($_SESSION['success_message']);
                }
                else if (isset($_SESSION['error_message']))
                {
                    echo '<p style="color: red;">' . $_SESSION['error_message'] . '</p>';
                    unset($_SESSION['error_message']);
                }
        ?>
        <br>
    </div>
</body>
</html>
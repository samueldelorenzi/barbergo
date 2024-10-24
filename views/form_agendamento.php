<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

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
                $abertura = 8;
                $fechamento = 18;
                $hoje = new DateTime();
                $horarios_mostrados = 0;

                $isToday = $selectedDate->format('Y-m-d') === $hoje->format('Y-m-d');

                // Define a hora atual para comparação (apenas se for o dia atual)
                $currentDateTime = new DateTime();
            
                // Loop para gerar horários
                for ($hora = $abertura; $hora < $fechamento; $hora++) {
                    for ($minuto = 0; $minuto < 60; $minuto += 30) {
                        // Criar um objeto DateTime para o slot
                        $slotTime = clone $selectedDate;
                        $slotTime->setTime($hora, $minuto); // Definir o horário do slot
            
                        // Mostrar apenas horários futuros se a data for hoje
                        if ($isToday) {
                            if ($slotTime > $currentDateTime) { // Mostrar apenas horários futuros
                                $horarios_mostrados++;
                                echo '<div class="horario">';
                                echo $slotTime->format('H:i'); // Exibir no formato 24h
                                echo '</div>';
                            }
                        } else {
                            $horarios_mostrados++;
                            echo '<div class="horario">';
                            echo $slotTime->format('H:i'); // Exibir no formato 24h
                            echo '</div>';
                        }

                    }
                }
                if($horarios_mostrados == 0)
                {
                    echo '</div>';
                    echo '<br>';
                    echo '<p>Não há horários disponíveis para o dia selecionado.</p>';
                }
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
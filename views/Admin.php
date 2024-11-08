<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus agendamentos</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" href="../anexos/icone.png" type="image/x-icon">
</head>
<body>
    <div class="header">
        <div id="header-left">
            <a href="../views/form_agendamento.php">Agendar novo horário</a>
        </div>
        <div id="header-right">
            <p>
                <?php 
                    echo $_SESSION['usuario_email']; 
                ?>
            </p>
            <a href="../controllers/logout.php">Sair</a>
        </div>
    </div>
    <div class="title">
        <h1>BarberGO</h1>
        <h3>Meus agendamentos</h3>
    </div>
    <a href="./perfil.php">1</a>
    <div class="container">
        <?php
            include "../controllers/banco.php";
            include "../helpers/auxiliares.php";

            if (isset($_SESSION['id_cliente'])) {
                $agendamentos = get_agendamentos($conexao, $_SESSION['id_cliente']);
                
                if (!empty($agendamentos)) {
                    echo "<table class='agendamentos'>";
                    echo    "<thead>";
                    echo        "<tr>";
                    echo            "<th>Serviço</th>";
                    echo            "<th>Dia</th>";
                    echo            "<th>Hora</th>";
                    echo            "<th>Preço</th>";                   
                    echo        "</tr>";
                    echo    "</thead>";
                    echo "<tbody>";
                    foreach ($agendamentos as $agendamento) {
                        $servico = get_servico_by_id($conexao, $agendamento['id_servico']+1);
                        $hora_bd = $agendamento['hora'];
                        $hora_bd = explode(":", $hora_bd);
                        $hora = $hora_bd[0] . ":" . $hora_bd[1];
                        echo "<tr>";
                        echo "<td>" . $servico['nome'] . "</td>";
                        echo "<td>" . converte_data_usuario($agendamento['dia']) . "</td>";
                        echo "<td>" . $hora . "</td>";
                        echo "<td>" . (int)$servico['preco'] . "R$</td>";
                        echo "</tr>";
                    }
                    echo    "</tbody>";
                    echo "</table>";
                } 
                else 
                {
                    echo "<a href='../views/form_agendamento.php'>Nenhum horário agendado. Clique aqui para agendar!</a>";
                }
            } 
            else 
            {
                echo "Erro ao buscar agendamentos. Tente novamente!";
            }
        ?>
    </div>
</body>
</html>

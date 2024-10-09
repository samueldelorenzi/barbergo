<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamentos do Cliente</title>
    <link rel="stylesheet" href="style.css"> <!-- Link para o arquivo CSS externo -->
</head>
<body>
    <div class="container">
        <h1>Meus Agendamentos</h1>
        <table class="agendamentos">
            <thead>
                <tr>
                    <th>Serviço</th>
                    <th>Dia</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    error_reporting(E_ALL);
                    ini_set('display_errors', 1);
                    include "../controllers/banco.php";
                    include "../helpers/auxiliares.php";

                    if (isset($_SESSION['id_cliente'])) {
                        $agendamentos = get_agendamentos($conexao, $_SESSION['id_cliente']);
                        
                        if (!empty($agendamentos)) {
                            foreach ($agendamentos as $agendamento) {
                                echo "<tr>";
                                echo "<td>" . $agendamento['id_servico'] . "</td>";
                                echo "<td>" . converte_data_usuario($agendamento['dia']) . "</td>";
                                echo "<td>" . $agendamento['hora'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No appointments found.</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Client ID not found in session.</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
require_once '../models/Agendamentos.php';
require_once '../controllers/banco.php';

// exibe erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberGO - Início</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../assets/img/icone.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style-menus.css">
</head>
<body>
    <div class="container">
        <div class="row pt-3">
            <div class="col-lg-6 col-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo Agendamento::numAgendamentos($conexao, $_SESSION['id_cliente']) ?></h3>
                        <p>Próximos Agendamentos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <a href="?pagina=agendamento" class="small-box-footer">Ver Agendamentos <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>Perfil</h3>
                        <p>Atualize suas informações</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <a href="?pagina=perfil" class="small-box-footer">Ver Perfil <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Formulário de Agendamento -->
        <div class="container-fluid d-flex align-items-center justify-content-center bg-opacity-75">
            <div class="rounded col-12 col-lg-8 shadow-lg p-4 bg-white glass shadow-darker border border-opacity-75">
                <h1 class="fs-2 my-4 text-center">Agende seu horário</h1>
                
                <form method="POST" action="../controllers/agendamento.php" class="needs-validation pb-3" novalidate autocomplete="on">
                    <!-- Campo para a data com ícone -->
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-calendar-day"></i></span>
                        <input type="date" class="form-control" id="data" name="data" required>
                    </div>

                    <!-- Campo para a hora com ícone -->
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-clock"></i></span>
                        <input type="time" class="form-control" id="hora" name="hora" required>
                    </div>

                    <!-- Campo para o serviço com ícone -->
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-cut"></i></span>
                        <select class="form-control" id="servico" name="servico" required>
                            <option value="1">Corte de Cabelo</option>
                            <option value="2">Barba</option>
                            <option value="3">Corte + Barba</option>
                        </select>
                    </div>

                    <?php
                        if (isset($_SESSION['success_message'])) {
                            echo '<p class="text-success text-center">' . $_SESSION['success_message'] . '</p>';
                            unset($_SESSION['success_message']);
                        } elseif (isset($_SESSION['error_message'])) {
                            echo '<p class="text-danger text-center">' . $_SESSION['error_message'] . '</p>';
                            unset($_SESSION['error_message']);
                        }
                    ?>

                    <!-- Botão de envio -->
                    <button type="submit" name="gravar" class="btn btn-primary w-100 mt-3">Agendar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

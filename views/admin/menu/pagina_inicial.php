<?php
require_once '../../models/Agendamentos.php';
require_once '../../controllers/banco.php';

// exibe erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Flag para abrir o modal
$abrirModal = false;

// Verifica se existe uma mensagem de erro ou sucesso
if (isset($_SESSION['success_message']) || isset($_SESSION['error_message'])) {
    $abrirModal = true;
}
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
    <link rel="shortcut icon" href="../../assets/img/icone.png" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/style-menus.css">
</head>

<body>
    <div class="container">
        <div class="row pt-3">
            <div class="col-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo Agendamento::totalAgendamentos($conexao) ?></h3>
                        <p>Próximos Agendamentos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <a href="?pagina=agendamento" class="small-box-footer">Ver Agendamentos <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
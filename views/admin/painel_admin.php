<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../../helpers/auxiliares.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$selectedDate = isset($_POST['data']) ? new DateTime($_POST['data']) : new DateTime();

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: ../form_login.php");
    exit();
}

if (isset($_SESSION['id_cliente'])) {
    $id_cliente = $_SESSION['id_cliente'];
} else {
    header('Location: ../form_login.php');
    exit();
}

date_default_timezone_set('America/Sao_Paulo');

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'inicio';

switch ($pagina) {
    case 'agendamento':
        $conteudo = 'menu/agendamentos.php';
        break;
    default:
        $conteudo = 'menu/pagina_inicial.php';
        break;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberGO - Painel do admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../assets/img/icone.png" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/style-painel-usuario.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed mb-lg-3">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-black fs-3 rounded "></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php
                        echo $_SESSION['usuario_email'];
                        ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="?pagina=agendamento" class="dropdown-item">
                            <i class="fas fa-calendar-alt mr-2"></i> Meus Agendamentos
                        </a>
                        <a href="../../controllers/logout.php" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt mr-2"></i> Sair
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="../../controllers/logout.php" class="brand-link d-flex align-content-center ">
                <img src="../../assets/img/icone.png" alt="Logo" class="brand-image img-circle elevation-3 mt-2">
                <p class="text-white fw-bold my-auto fs-3 ms-2">BarberGO</p>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <li class="nav-item">
                            <a href="?pagina=inicio" class="nav-link <?php echo $pagina == 'inicio' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Página Inicial</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?pagina=agendamento" class="nav-link <?php echo $pagina == 'agendamento' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>Agendamentos</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <?php include $conteudo; ?>
                </div>
            </section>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
</body>

</html>
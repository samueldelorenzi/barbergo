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
  <title>Recuperar Senha</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/css/style-login.css">

  <link rel="stylesheet" href="../assets/css/style.css">


  <link rel="shortcut icon" href="../assets/img/icone.png" type="image/x-icon">
</head>

<body class="">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark px-4 sticky-top top-0">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <!-- Logo e Nome à esquerda (define uma largura fixa usando flex-grow-1 para ocupar espaço) -->
            <div class="d-flex align-items-center flex-grow-1 w-50">
                <img src="../assets/img/icone.png" class="img" alt="Logo BarberGO">
                <p class="text-white fw-bold my-auto fs-3 ms-2">BarberGO</p>
            </div>

            <!-- Itens de navegação no centro -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 fs-6 remove-outline-lg" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 fs-6 remove-outline-lg" href="../index.php#services">Serviços</a></li>
                    <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 fs-6 remove-outline-lg" href="../index.php#barbers">Clientes</a></li>
                    <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 fs-6 remove-outline-lg" href="cadastro.php">Cadastro</a></li>
                </ul>
            </div>

            <!-- Botão de Login à direita, com largura igual à div da esquerda -->
            <div class="d-flex justify-content-end flex-grow-1 w-50">
                <a href="form_login.php" class="btn btn-warning login">Login</a>
            </div>
        </div>
    </nav>
    <div class="container d-flex align-items-center justify-content-center my-5 ">
        <div class="bg-white rounded col-10 col-lg-4 shadow-lg p-4 ">
            <div class="">

                <h1 class="fs-4 text-center py-3">Recupere sua senha</h1>
            </div>
            <form action="../controllers/forgot_password.php" method="post" class="needs-validation pb-3" autocomplete="on" novalidate>
                <div class="input-group mb-4">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Informe seu Email" aria-label="Informe seu Email" required autocomplete="email">
                    <label for="email" class="input-group-text" aria-label="Ícone de Email"><i class="fa-solid fa-envelope fs-4"></i></label>
                    <div class="invalid-feedback">
                        Preencha o teu Email.
                    </div>
                    <div class="valid-feedback">
                        Email Preenchido
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-3">Enviar Instruções</button>
            </form>
            <hr class="w-75 m-auto">
            <div class="my-2 text-center">
                <a href="./form_login.php" class="nav-link text-decoration-none">Voltar para o login</a>
            </div>
        </div>
    </div>
    <footer class="container-fluid text-light bg-dark ">
    <div class="row py-3">
        <div class="col-md-3 mb-3 text-center text-md-left">
            <h3 class="fs-5">Termo de Responsabilidade</h3>
            <a href="#" class="nav-link">Privacidade</a><br>
            <a href="#" class="nav-link">Termos de Uso</a>
        </div>
        <hr class="w-75 mx-auto d-md-none">
        <div class="col-md-3 mb-3 text-center text-md-left">
            <h3 class="fs-5">Equipe</h3>
            <a href="./sobre.php" class="nav-link">Sobre Nós</a>
        </div>
        <hr class="w-75 mx-auto d-md-none">
        <div class="col-md-3 mb-3 text-center text-md-left">
            <h3 class="fs-5">Feedback e Suporte</h3>
            <a href="#" class="nav-link">Feedback e Avaliações</a><br>
            <a href="#" class="nav-link">Suporte e Contato</a>
        </div>
        <hr class="w-75 mx-auto d-md-none">
        <div class="col-md-3 mb-3 text-center text-md-left">
            <h3 class="fs-5">Siga-nos nas Redes Sociais</h3>
            <div class="btn-group border ">
                <a href="https://instagram.com" target="_blank" class="btn btn-warning fs-3 p-2 border"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://facebook.com" target="_blank" class="btn btn-warning fs-4 p-2 border"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://linkedin.com" target="_blank" class="btn btn-warning fs-4 p-2 border"><i class="fa-brands fa-linkedin"></i></a>
            </div>

            <p>&copy; BarberGO 2024</p>
        </div>
    </div>
</footer>
    <!-- PHP para exibir mensagens -->
    <?php
        if (isset($_SESSION['success_message'])) {
            echo '<p style="color: green;">' . $_SESSION['success_message'] . '</p>';
            unset($_SESSION['success_message']);
        } elseif (isset($_SESSION['error_message'])) {
            echo '<p style="color: red;">' . $_SESSION['error_message'] . '</p>';
            unset($_SESSION['error_message']);
        }
    ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/valid.js"></script>

</body>

</html>

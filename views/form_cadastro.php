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
  <title>BarberGO - Cadastro</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/css/style-login.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="shortcut icon" href="../assets/img/icone.png" type="image/x-icon">
</head>
<body class="d-flex flex-column min-vh-100">

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
                    <li class="nav-item"><a class="btn btn btn-warning mx-md-1 fs-6" href="form_cadastro.php">Cadastro</a></li>
                </ul>
            </div>

            <!-- Botão de Login à direita, com largura igual à div da esquerda -->
            <div class="d-flex justify-content-end flex-grow-1 w-50">
                <a href="form_login.php" class="btn btn-outline-warning mx-md-1 fs-6 remove-outline-lg">Login</a>
            </div>
        </div>
    </nav>
<div class="background-img">
    <div class="container d-flex align-items-center justify-content-center my-5 bg-opacity-75">
        <div class="rounded col-10 col-lg-4 shadow-lg p-4 bg-white glass shadow-darker border  border-opacity-75">
            <h1 class="fs-5 my-4 text-center">Crie sua conta e comece agora a marcar horários pelo BarberGO</h1>
            
            <form method="POST" action="../controllers/form_cadastro.php" class="needs-validation pb-3" novalidate autocomplete="on">
                <div class="input-group mb-3">
                <label class="input-group-text"><i class="fa-solid fa-user fs-4"></i></label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                    
                    <div class="invalid-feedback">Campo obrigatório.</div>
                    <div class="valid-feedback">Preenchido.</div>
                </div>

                


                <div class="input-group mb-3">
                <label class="input-group-text"><i class="fa-solid fa-envelope fs-4"></i></label>
                    <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                   
                    <div class="invalid-feedback">Campo obrigatório.</div>
                    <div class="valid-feedback">Preenchido.</div>
                </div>
                
                <div class="input-group mb-3">
                <label class="input-group-text"><i class="fa-solid fa-lock fs-4"></i></label>
                    <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required maxlength="16" autocomplete="current-password">
                    
                    <span class="input-group-text" onclick="togglePasswordVisibility()">
                        <i id="toggleIcon" class="fa-solid fa-eye fs-4"></i>
                    </span>
                    <div class="invalid-feedback">Campo obrigatório.</div>
                    <div class="valid-feedback">Preenchido.</div>
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
                
                <button type="submit" name="gravar" class="btn btn-primary w-100 mt-3">Cadastrar-se</button>
            </form>
            
            <hr class="w-75 m-auto py-3">
            <div class="text-center">
                <a href="form_login.php" class="nav-link text-decoration-none">Já possui cadastro? Faça login</a>
            </div>
        </div>
    </div>
</div>

<script>
function togglePasswordVisibility() {
    const passwordInput = document.getElementById('senha');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}
</script>

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
                <a href="https://instagram.com" target="_blank" class="btn btn-warning fs-4 p-2 border"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://facebook.com" target="_blank" class="btn btn-warning fs-4 p-2 border"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://linkedin.com" target="_blank" class="btn btn-warning fs-4 p-2 border"><i class="fa-brands fa-linkedin"></i></a>
            </div>

            <p>&copy; BarberGO 2024</p>
        </div>
    </div>
</footer>
  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/valid.js"></script>
</body>
</html>

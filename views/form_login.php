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
  <title>BarberGO - Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/style-login.css">
  
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
                    <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 fs-6 remove-outline-lg" href="form_cadastro.php">Cadastro</a></li>
                </ul>
            </div>

            <!-- Botão de Login à direita, com largura igual à div da esquerda -->
            <div class="d-flex justify-content-end flex-grow-1 w-50">
                <a href="form_login.php" class="btn btn-warning login">Login</a>
            </div>
        </div>
    </nav>
    <div class="background-img">
    <div class=" container  d-flex align-items-center justify-content-center my-5 bg-opacity-75 ">
            <div class=" rounded col-10 col-lg-4 shadow-lg p-4 bg-white glass shadow-darker border  border-opacity-75">
                <div class="">
    
                    <h1 class="fs-5 my-4 text-center">Faça login para agendar seu horário</h1>
                </div>
                <form action="../controllers/login.php" method="post" class="needs-validation pb-3" autocomplete="on" novalidate>
                    <div class="input-group mb-4">
                    <label for="email" class="input-group-text" aria-label="Ícone de Email"><i class="fa-solid fa-envelope fs-4"></i></label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="E-mail" aria-label="E-mail" required autocomplete="email">
                       
                        <div class="invalid-feedback">
                            Campo obrigatório.
                        </div>
                        <div class="valid-feedback">
                            Preenchido.
                        </div>
                    </div>
                    <div class="input-group">
                    <label for="password" class="input-group-text">
                        <i class="fa-solid fa-lock fs-4"></i>
                        </label>
                        <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" autocomplete="current-password" required>

                        <span class="input-group-text" onclick="togglePasswordVisibility()">
                        <i id="toggleIcon" class="fa-solid fa-eye fs-4"></i>
                        </span>
                        <div class="invalid-feedback">
                            Campo obrigatório.
                        </div>
                        <div class="valid-feedback">
                            Preenchido.
                        </div>
                    </div>
                    <div class="py-3">
                        <a href="./form_esqueceu_senha.php" class="nav-link text-decoration-none">Esqueceu a senha?</a>
                    </div>
                    <div class="form-switch pb-3">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input ">
                        <label for="remember" class="form-check-label">Lembrar de mim</label>
                    </div>
                    <?php
                        if (isset($_SESSION['error_message'])) {
                            echo '<div style="text-align: center;"><p style="color: #b82222;">' . $_SESSION['error_message'] . '</p></div>';
                            unset($_SESSION['error_message']);
                        }
                    ?>
                    <button type="submit" class="btn btn-primary w-100 mb-3">Entrar</button>
                </form>
                <hr class="w-75 m-auto">
                <div class="my-2 text-center">
                    <p>Ao fazer login você concorda com os termos de uso</p>
                    <a href="form_cadastro.php" class="nav-link text-decoration-none">Não possui login? Registrar-se</a>
                </div>
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
                <a href="https://instagram.com" target="_blank" class="btn btn-warning fs-4 p-2 border"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://facebook.com" target="_blank" class="btn btn-warning fs-4 p-2 border"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://linkedin.com" target="_blank" class="btn btn-warning fs-4 p-2 border"><i class="fa-brands fa-linkedin"></i></a>
            </div>
            </div>

            <p>&copy; BarberGO 2024</p>
        </div>
    </div>
</footer>
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
  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/valid.js"></script>

</body>
</html>


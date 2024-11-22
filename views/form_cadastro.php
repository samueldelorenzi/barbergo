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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style-login.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/img/icone.png" type="image/x-icon">
</head>

<body class="d-flex flex-column">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark px-4 sticky-top top-0">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center flex-grow-1 w-50">
                <img src="../assets/img/icone.png" class="img" alt="Logo BarberGO">
                <p class="text-white fw-bold my-auto fs-3 ms-2">BarberGO</p>
            </div>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 fs-6 remove-outline-lg" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 fs-6 remove-outline-lg" href="../index.php#services">Serviços</a></li>
                    <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 fs-6 remove-outline-lg" href="../index.php#barbers">Clientes</a></li>
                    <li class="nav-item"><a class="btn btn btn-warning mx-md-1 fs-6" href="form_cadastro.php">Cadastro</a></li>
                </ul>
            </div>
            <div class="d-flex justify-content-end flex-grow-1 w-50">
                <a href="form_login.php" class="btn btn-outline-warning mx-md-1 fs-6 remove-outline-lg">Login</a>
            </div>
        </div>
    </nav>
    <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="toast text-center bg-green fw-bold justify-content-center align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body text-center w-100">
                        <?php echo $_SESSION['success_message']; ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-3 my-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            <?php unset($_SESSION['success_message']); ?>
        <?php elseif (isset($_SESSION['error_message'])): ?>
            <div class="toast text-center text-bg-danger fw-bold justify-content-center align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body text-center w-100">
                        <?php echo $_SESSION['error_message']; ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-3 my-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>
    </div>
    <div class="flex-grow-1 d-flex align-items-center justify-content-center">
        <div class="container d-flex align-items-center justify-content-center my-5">
            <div class="rounded col-10 col-lg-4 shadow-lg p-4 bg-white glass shadow-darker border border-opacity-75">
                <h1 class="fs-5 my-4 text-center">Crie sua conta e comece agora a marcar horários pelo BarberGO</h1>
                <form method="POST" action="../controllers/cadastro.php" class="needs-validation pb-3" novalidate autocomplete="on">
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
                    <button type="submit" name="gravar" class="btn btn-primary w-100 mt-3">Cadastrar-se</button>
                </form>
                <hr class="w-75 m-auto">
                <div class="my-2 text-center">
                    <p>Ao se cadastrar você concorda com os termos de uso</p>
                    <a href="form_login.php" class="nav-link text-decoration-none">Já possui cadastro? Fazer login</a>
                </div>
            </div>
        </div>
    </div>
    <footer class="container-fluid text-light bg-dark">
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
                <div class="btn-group border">
                    <a href="https://instagram.com" target="_blank" class="btn btn-warning fs-4 p-2 border"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://facebook.com" target="_blank" class="btn btn-warning fs-4 p-2 border"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://linkedin.com" target="_blank" class="btn btn-warning fs-4 p-2 border"><i class="fa-brands fa-linkedin"></i></a>
                </div>
                <p>&copy; BarberGO 2024</p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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
        
        document.addEventListener('DOMContentLoaded', function() {
            const toastElList = [].slice.call(document.querySelectorAll('.toast'));
            toastElList.forEach(function(toastEl) {
                const toast = new bootstrap.Toast(toastEl);
                toast.show();

                setTimeout(() => {
                    toast.dispose();
                }, 5000);
            });
        });
    </script>
</body>
</html>
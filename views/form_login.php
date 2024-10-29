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
  <link rel="stylesheet" href="../assets/css/Login/style.css">
  <link rel="shortcut icon" href="../assets/img/icone.png" type="image/x-icon">
</head>
<body class="background-image">
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="bg-white rounded col-8 col-lg-4 shadow-lg p-4">
            <div class="">
                <img src="../assets/img/icone.png" alt="Ícone Barbearia" class="img shadow">
                <h1 class="fs-4 text-center py-3">Faça login para agendar seu horário</h1>
            </div>
            <form action="../controllers/login.php" method="post" class="needs-validation pb-3" autocomplete="on" novalidate>
                <div class="input-group mb-4">
                    <input type="text" name="email" id="email" class="form-control" placeholder="E-mail" aria-label="E-mail" required autocomplete="email">
                    <label for="email" class="input-group-text" aria-label="Ícone de Email"><i class="fa-solid fa-envelope fs-4"></i></label>
                    <div class="invalid-feedback">
                        Campo obrigatório.
                    </div>
                    <div class="valid-feedback">
                        Preenchido.
                    </div>
                </div>
                <div class="input-group">
                    <input type="password" name="senha" id="password" class="form-control" placeholder="Senha" autocomplete="current-password" required>
                    <label for="password" class="input-group-text">
                    <i class="fa-solid fa-lock fs-4"></i>
                    </label>
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
                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Lembrar de mim</label>
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-3">Entrar</button>
            </form>
            <hr class="w-75 m-auto">
            <div class="my-2 text-center">
                <p>Ao fazer login você concorda com os termos de uso</p>
                <a href="cadastro.php" class="nav-link text-decoration-none">Não possui login? Registrar-se</a>
            </div>
        </div>
    </div>

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

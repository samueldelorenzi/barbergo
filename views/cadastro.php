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
  <title>Cadastro - BarberGO</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="shortcut icon" href="anexos/icone.png" type="image/x-icon">
</head>
<body class="background-image">
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="bg-white rounded col-8 col-lg-4 shadow-lg p-4">
            <div class="text-center">
                <img src="../assets/img/icone.png" alt="Ícone Barbearia" class="img shadow">
                <h1 class="fs-4">Crie sua conta e comece a usar o BarberGO</h1>
            </div>
            <form method="POST" action="controllers/cadastro.php" class="needs-validation pb-3" novalidate>
                <div class="input-group mb-3">
                    <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                    <label class="input-group-text"><i class="fa-solid fa-user"></i></label>
                    <div class="invalid-feedback">Preencha o teu nome.</div>
                    <div class="valid-feedback">Nome válido!</div>
                </div>

                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                    <label class="input-group-text"><i class="fa-solid fa-envelope"></i></label>
                    <div class="invalid-feedback">Preencha o teu e-mail.</div>
                    <div class="valid-feedback">E-mail válido!</div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="senha" class="form-control" placeholder="Senha" required maxlength="16">
                    <label class="input-group-text"><i class="fa-solid fa-lock"></i></label>
                    <div class="invalid-feedback">Preencha a tua senha.</div>
                    <div class="valid-feedback">Senha válida!</div>
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
                    <a href="./form_login.php" class="nav-link text-decoration-none">Já possui cadastro? Faça login</a>
                </div>
        </div>
    </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/valid.js"></script>
</body>
</html>

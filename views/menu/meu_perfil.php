<?php
// Inicia sessão se não estiver iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Exibe erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../assets/img/icone.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style-menus.css">
</head>
<body>
    <div class="content-wrapper">
        <section class="content">
            <div class="container mx-auto">
                <h1>Editar Perfil</h1>
                <form action="../controllers/perfil.php" method="POST">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $_SESSION['usuario_nome']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo ($_SESSION['usuario_email']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha">
                        <small class="form-text text-muted">Deixe em branco para manter a senha atual.</small>
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
                    <button type="submit" name="gravar" class="btn btn-primary w-100 mt-3">Salvar alterações</button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>
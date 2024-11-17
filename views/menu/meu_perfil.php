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
<html lang="pt-br">
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
    <style>
        .toast-container {
            position: fixed;
            top: 40px;
            right: 0%;
            width:  100vw;
            padding: 15px;
            z-index: 1055;
        }
        .toast {
            width: 100vw;
            margin: 0 auto 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
   
    <div class="toast-container">
        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body text-center w-100">
                        <?php echo $_SESSION['success_message']; ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            <?php unset($_SESSION['success_message']); ?>
        <?php elseif (isset($_SESSION['error_message'])): ?>
            <div class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body text-center w-100">
                        <?php echo $_SESSION['error_message']; ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>
    </div>

   
    <div class="container mt-5">
        <div class="card">
            <h1 class="card-header text-center">Editar Perfil</h1>
            <form action="../controllers/perfil.php" method="POST" class="card-body">
                <div class="mb-3 d-md-6">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $_SESSION['usuario_nome']; ?>" required>
                </div>
                <div class="mb-3 d-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo ($_SESSION['usuario_email']); ?>" required>
                </div>
                <div class="mb-3 d-md-6">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha">
                    <small class="form-text text-muted">Deixe em branco para manter a senha atual.</small>
                </div>
                <div class="text-center">
                    <button type="submit" name="gravar" class="btn btn-primary w-50 mt-3 p-2">Salvar alterações</button>
                </div>
            </form>
        </div>
    </div>

   
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toastElList = [].slice.call(document.querySelectorAll('.toast'));
            toastElList.forEach(function (toastEl) {
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

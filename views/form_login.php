<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1920x1080, initial-scale=1.0">
    <title>BarberGO</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" href="../anexos/icone.png" type="image/x-icon">
</head>
<body>
    <div class="title">
        <h1>BarberGO</h1>
        <h3>Login</h3>
    </div>
    <div class="container">
        <form method="POST" action="../controllers/login.php">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="E-mail" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" placeholder="Senha" required>

            <?php
                    session_start();

                    if (isset($_SESSION['success_message'])) 
                    {
                        echo '<p style="color: green;">' . $_SESSION['success_message'] . '</p>';
                        unset($_SESSION['success_message']);
                    }
                    else
                    {
                        echo '<p style="color: red;">' . $_SESSION['error_message'] . '</p>';
                        unset($_SESSION['error_message']);
                    }
            ?>

            <a href="../index.php" id="link">Ainda não possui cadastro? Clique aqui</a>

            <input type="submit" value="Entrar">
        </form>

    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberGO</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="icon" href="anexos/icone.png" type="image/x-icon">
</head>
<body>
    <div class="title">
        <h1>BarberGO</h1>
        <h3>Cadastro</h3>
    </div>
    <div class="container">
        <form method="POST" action="controllers/cadastro.php">
            <fieldset>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" placeholder="Nome" required>

                <label for="sobrenome">Sobrenome:</label>
                <input type="text" name="sobrenome" placeholder="Sobrenome" required>

                <label for="email">E-mail:</label>
                <input type="email" name="email" placeholder="E-mail" required>

                <label for="senha">Senha:</label>
                <input type="password" name="senha" placeholder="Senha" required maxlength="16">

                <?php
                    session_start();

                    if (isset($_SESSION['success_message'])) {
                        echo '<p style="color: green;">' . $_SESSION['success_message'] . '</p>';
                        unset($_SESSION['success_message']);
                    }
                    else
                    {
                        echo '<p style="color: red;">' . $_SESSION['error_message'] . '</p>';
                        unset($_SESSION['error_message']);
                    }
                ?>

                <a href="views/form_login.php" id="link">Já possui cadastro? Clique aqui</a>
                
                <input type="submit" name="gravar" value="Cadastrar-se">
            </fieldset>
        </f>

    </div>
</body>
</html>

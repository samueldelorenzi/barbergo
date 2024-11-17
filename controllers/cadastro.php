<?php

// Starta a session se não existe
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include
include 'banco.php';
include '../helpers/auxiliares.php';
include '../models/Cliente.php';

// Exibe erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verifica se está tudo preenchido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
    // Cria conexão e testa
    $stmt = $conexao->prepare("SELECT * FROM cliente WHERE email = ?");
    $stmt->bind_param("s", $_POST['email']);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    // Checa se o email já está cadastrado
    if ($resultado->num_rows > 0) {
        $_SESSION['error_message'] = "Ops, este email já está cadastrado. Faça login.";
        header('Location: ../views/form_cadastro.php');
        exit();
    }

    // Cria novo cliente
    $novoCliente = new Cliente(
        mysqli_real_escape_string($conexao, trim($_POST['nome'])),
        mysqli_real_escape_string($conexao, trim($_POST['email'])),
        mysqli_real_escape_string($conexao, trim($_POST['senha']))
    );

    // Cadastra
    if ($novoCliente->cadastrar($conexao)) {
        $_SESSION['success_message'] = "Cadastro realizado com sucesso!";
    } else {
        $_SESSION['error_message'] = "Erro ao cadastrar.";
    }
}
else {
    $_SESSION['error_message'] = "Preencha todos os campos.";
}
// Redireciona para a página de cadastro que exibe a mensagem
header('Location: ../views/form_cadastro.php');
exit();

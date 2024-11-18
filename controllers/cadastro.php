<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'banco.php';
include '../helpers/auxiliares.php';
include '../models/Cliente.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
    $stmt = $conexao->prepare("SELECT * FROM cliente WHERE email = ?");
    $stmt->bind_param("s", $_POST['email']);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $_SESSION['error_message'] = "Ops, este email já está cadastrado. Faça login.";
        header('Location: ../views/form_cadastro.php');
        exit();
    }

    $novoCliente = new Cliente(
        mysqli_real_escape_string($conexao, trim($_POST['nome'])),
        mysqli_real_escape_string($conexao, trim($_POST['email'])),
        mysqli_real_escape_string($conexao, trim($_POST['senha']))
    );

    if ($novoCliente->cadastrar($conexao)) {
        $_SESSION['success_message'] = "Cadastro realizado com sucesso!";
    } else {
        $_SESSION['error_message'] = "Erro ao cadastrar.";
    }
} else {
    $_SESSION['error_message'] = "Preencha todos os campos.";
}
header('Location: ../views/form_cadastro.php');
exit();

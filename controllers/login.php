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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

    $cliente = Cliente::autenticar($conexao, $email, $senha);

    if ($cliente) {
        $_SESSION['usuario_logado'] = true;
        $_SESSION['usuario_id'] = $cliente->id;
        $_SESSION['usuario_nome'] = $cliente->nome;
        $_SESSION['usuario_email'] = $cliente->email;

        if ($cliente->isRoot()) {
            header('Location: ../views/admin/painel_admin.php');
        } else {
            header('Location: ../views/painel_usuario.php');
        }
        exit();
    } else {
        $_SESSION['error_message'] = "Usuário ou senha incorretos.";
        header('Location: ../views/form_login.php');
        exit();
    }
} else {
    $_SESSION['error_message'] = "Preencha todos os campos.";
    header('Location: ../views/form_login.php');
    exit();
}

<?php

// Inicia sessão se não estiver iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Inclui as funções
include 'banco.php';
include '../helpers/auxiliares.php';
include '../models/Cliente.php';

// Exibe todos os erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verifica se o método de requisição é POST e se os campos email e senha foram preenchidos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

    // Verifica se o cliente existe no banco de dados
    $cliente = Cliente::autenticar($conexao, $email, $senha);

    if ($cliente) {
        $_SESSION['usuario_logado'] = true;
        $_SESSION['usuario_id'] = $cliente->$id();
        $_SESSION['usuario_nome'] = $cliente->$nome();
        $_SESSION['usuario_email'] = $cliente->$email();
        
        header('Location: ../views/painel_usuario.php');
        exit();
    } else {
        // Se o cliente não existir, exibe uma mensagem de erro
        $_SESSION['error_message'] = "Usuário ou senha incorretos.";
        header('Location: ../views/form_login.php');
        exit();
    }
}
else {
    // Se os campos não foram preenchidos, exibe uma mensagem de erro
    $_SESSION['error_message'] = "Preencha todos os campos.";
    header('Location: ../views/form_login.php');
    exit();
}

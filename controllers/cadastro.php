<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'banco.php';
include '../helpers/auxiliares.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome']) && !empty($_POST['nome'])) {
    $cadastro = [
        'nome' => mysqli_real_escape_string($conexao, trim($_POST['nome'])),
        'sobrenome' => mysqli_real_escape_string($conexao, trim($_POST['sobrenome'])),
        'email' => mysqli_real_escape_string($conexao, trim($_POST['email'])),
        'senha' => mysqli_real_escape_string($conexao, trim($_POST['senha']))
    ];

    if (adicionar_cliente($conexao, $cadastro)) {
        $_SESSION['success_message'] = "Cadastro realizado com sucesso!";
    } 
    else 
    {
        $_SESSION['error_message'] = "Erro ao cadastrar.";
    }
}
header('Location: ../index.php');
exit();

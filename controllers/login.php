<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'banco.php';
include '../helpers/auxiliares.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
    $login = [
        'email' => mysqli_real_escape_string($conexao, trim($_POST['email'])),
        'senha' => mysqli_real_escape_string($conexao, trim($_POST['senha'])) // Consider hashing this
    ];

    if (verificar_login($conexao, $login)['success']) {
        header('Location: ../views/form_agendamento.php');
        $_SESSION['usuario_logado'] = true;
        $_SESSION['usuario_email'] = $_POST['email'];
    } 
    else 
    {
        $_SESSION['error_message'] = "Usuário ou senha incorretos.";
        header('Location: ../views/form_login.php');
    }
    
} 
exit();

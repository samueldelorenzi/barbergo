<?php

// Inicia sessão
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Configurações de exibição de erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Limpa a sessão
$_SESSION = array();

// Se necessário, remove o cookie de sessão
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finaliza a sessão
session_destroy();

// Redireciona para a página de login
header("Location: ../views/form_login.php");
exit;

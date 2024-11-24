<?php
session_start();
include '../models/Cliente.php';
include "banco.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION['usuario_id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (empty($nome) || empty($email)) {
        $_SESSION['error_message'] = "Campos obrigatórios não preenchidos.";
        header('Location: ../views/painel_usuario.php?pagina=perfil');
        exit;
    }
    $stmt = $conexao->prepare("UPDATE cliente SET nome = ?, email = ? WHERE id = ?");
    $stmt->bind_param("ssi", $nome, $email, $id);
    $stmt->execute();

    if (!empty($senha))
    {
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $cliente = Cliente::definesenhaBanco($conexao, $senha, $id);
    }

    $_SESSION['usuario_nome'] = $nome;
    $_SESSION['usuario_email'] = $email;
    $_SESSION['success_message'] = "Cadastro atualizado com sucesso.";
    header('Location: ../views/painel_usuario.php?pagina=perfil');
    exit;

} else {
    $_SESSION['error_message'] = "Método inválido.";
    header('Location: ../views/painel_usuario.php?pagina=perfil');
    exit;
}

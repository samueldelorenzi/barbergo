<?php
session_start();
include '../models/Cliente.php';
include "banco.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION['id_cliente'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conexao->prepare("SELECT * FROM cliente WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $clienteData = $resultado->fetch_assoc();

    if ($clienteData) {
        $cliente = new Cliente(
            $nome,
            $email,
            $senha ? $senha : $clienteData['senha'],
            $id
        );

        if (!empty($senha)) {
            $cliente->defineSenha($senha);
        }

        if ($cliente->atualizar($conexao)) {
            $_SESSION['usuario_nome'] = $nome;
            $_SESSION['usuario_email'] = $email;
            $_SESSION['success_message'] = "Cadastro atualizado com sucesso.";
            header('Location: ../views/painel_usuario.php?pagina=perfil');
            exit;
        } else {
            $_SESSION['error_message'] = "Erro ao atualizar o perfil.";
        }
    } else {
        $_SESSION['error_message'] = "Usuário não encontrado.";
    }
} else {
    $_SESSION['error_message'] = "Método inválido.";
}

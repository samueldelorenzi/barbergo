<?php
session_start();
include '../models/Cliente.php';
include "banco.php";

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION['id_cliente']; // Certifique-se de que o ID do cliente está na sessão
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Busca os dados do cliente atual no banco
    $stmt = $conexao->prepare("SELECT * FROM cliente WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $clienteData = $resultado->fetch_assoc();

    if ($clienteData) {
        // Atualiza somente os campos modificados
        $cliente = new Cliente(
            $nome,
            $email,
            $senha ? $senha : $clienteData['senha'], // Mantém a senha atual se não for alterada
            $id
        );

        // Verifica se a senha foi alterada e realiza o hash apenas nesse caso
        if (!empty($senha)) {
            $cliente->defineSenha($senha);
        }

        // Atualiza o cliente no banco
        if ($cliente->atualizar($conexao)) {
            $_SESSION['usuario_nome'] = $nome;
            $_SESSION['usuario_email'] = $email;
            $_SESSION['success_message'] = "Cadastro atualizado com sucesso.";
            header('Location: ../views/painel_usuario.php?pagina=perfil');; // Redireciona para uma página de sucesso
            exit;
        } else {
            $_SESSION['error_message'] = "Erro ao atualizar o perfil.";
        }
    } 
    else 
    {
        $_SESSION['error_message'] = "Usuário não encontrado.";
    }
} 
else 
{
    $_SESSION['error_message'] = "Método inválido.";
}
?>

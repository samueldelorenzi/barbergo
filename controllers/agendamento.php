<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'banco.php';
include '../models/Agendamentos.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['data']) && !empty($_POST['data']) && isset($_POST['hora']) && !empty($_POST['hora'])) {
    $id_cliente = $_SESSION['id_cliente'];
    $id_servico = mysqli_real_escape_string($conexao, trim($_POST['servico']));
    $data = mysqli_real_escape_string($conexao, trim($_POST['data']));
    $hora = mysqli_real_escape_string($conexao, trim($_POST['hora']));

    $novoAgendamento = new Agendamento($conexao, $id_cliente, $id_servico, $data, $hora);

    if ($novoAgendamento->verificarDisponibilidade()) {
        if ($novoAgendamento->adicionar()) {
            $_SESSION['success_message'] = "Horário marcado com sucesso!";
        } else {
            $_SESSION['error_message'] = "Erro ao marcar horário. Tente novamente.";
        }
    } else {
        $_SESSION['error_message'] = "Horário indisponível. Tente outro.";
    }

    header('Location: ../views/painel_usuario.php?pagina=inicio');
}
exit();
<?php 
session_start();
include 'banco.php';
include '../helpers/auxiliares.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['data']) && !empty($_POST['data']) && isset($_POST['hora']) && !empty($_POST['hora'])) {
    echo "Entrou";
    $agendamento = [
        'servico' => mysqli_real_escape_string($conexao, trim($_POST['servico'])),
        'data' => mysqli_real_escape_string($conexao, trim($_POST['data'])),
        'hora' => mysqli_real_escape_string($conexao, trim($_POST['hora']))
    ];

    if (verificar_horario($conexao, $agendamento)) {
        $_SESSION['success_message'] = "Horário marcado!";
        header('Location: ../views/form_agendamento.php');
    } 
    else 
    {
        $_SESSION['error_message'] = "Horário indisponível";
        header('Location: ../views/form_agendamento.php');
    }
    
}
exit();
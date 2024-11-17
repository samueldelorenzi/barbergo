<?php

// exibe erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../models/Agendamentos.php';
require_once 'banco.php';

$id_agendamento = $_GET['id'];

$agendamento = Agendamento::cancelar($conexao, $id_agendamento);

header('Location: ../views/painel_usuario.php?pagina=agendamento');
?>

<?php 
// Inicia sessão
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Inclui arquivos
include 'banco.php';
include '../models/Agendamentos.php';


// Configurações de exibição de erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verifica se o método de requisição é POST e se os dados foram enviados
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['data']) && !empty($_POST['data']) && isset($_POST['hora']) && !empty($_POST['hora'])) {
    $id_cliente = $_SESSION['id_cliente']; 
    $id_servico = mysqli_real_escape_string($conexao, trim($_POST['servico']));
    $data = mysqli_real_escape_string($conexao, trim($_POST['data']));
    $hora = mysqli_real_escape_string($conexao, trim($_POST['hora']));
    
    // Cria um novo objeto de agendamento
    $novoAgendamento = new Agendamento($conexao, $id_cliente, $id_servico, $data, $hora);

    // Verifica se o horário está disponível
    if ($novoAgendamento->verificarDisponibilidade()) {
        // Adiciona o agendamento 
        if ($novoAgendamento->adicionar()) {
            $_SESSION['success_message'] = "Horário marcado com sucesso!";
        } else {
            $_SESSION['error_message'] = "Erro ao marcar horário. Tente novamente.";
        }
        // Caso o horário não esteja disponível, retorna erro
    } else {
        $_SESSION['error_message'] = "Horário indisponível. Tente outro.";
    }

    // Redireciona para a página de agendamento
    header('Location: ../views/painel_usuario.php?pagina=inicio');
}
exit();
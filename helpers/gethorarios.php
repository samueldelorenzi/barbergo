<?php

include '../controllers/banco.php';

// Exibe erros para debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verifica se a data foi fornecida via GET
if (!isset($_GET['data'])) {
    echo json_encode(['error' => 'Data não fornecida.']);
    exit();
}

$data = $_GET['data'];

// Valida se a data está no formato correto (YYYY-MM-DD)
if (!DateTime::createFromFormat('Y-m-d', $data)) {
    echo json_encode(['error' => 'Data inválida.']);
    exit();
}

$reservedTimes = [];

// Consulta os horários reservados no banco de dados
$query = "SELECT hora FROM agendamento WHERE dia = ?";
$stmt = $conexao->prepare($query);
$stmt->bind_param("s", $data);
$stmt->execute();
$result = $stmt->get_result();

// Preenche o array de horários reservados
while ($row = $result->fetch_assoc()) {
    // Ajuste para comparar apenas a hora e minuto (ignorando os segundos)
$reservedTimes[] = substr($row['hora'], 0, 5); // Pega os primeiros 5 caracteres (HH:MM)

}

// Gera os horários disponíveis entre 09:00 e 18:00, com intervalo de 30 minutos
$start = new DateTime('09:00');
$end = new DateTime('18:00');
$interval = new DateInterval('PT30M');
$current = clone $start;

$availableTimes = [];
while ($current <= $end) {
    $timeValue = $current->format('H:i');
    // Verifica se o horário está reservado
    $availableTimes[] = [
        'time' => $timeValue,
        'disabled' => in_array($timeValue, $reservedTimes), // Se o horário já estiver reservado, será desabilitado
    ];
    $current->add($interval); // Avança 30 minutos
}

// Retorna os horários como um array JSON
echo json_encode($availableTimes);

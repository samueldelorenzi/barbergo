<?php

include '../controllers/banco.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Sao_Paulo');

if (!isset($_GET['data'])) {
    echo json_encode(['error' => 'Data não fornecida.']);
    exit();
}

$data = $_GET['data'];

if (!DateTime::createFromFormat('Y-m-d', $data)) {
    echo json_encode(['error' => 'Data inválida.']);
    exit();
}

$reservedTimes = [];

$query = "SELECT hora FROM agendamento WHERE dia = ?";
$stmt = $conexao->prepare($query);
$stmt->bind_param("s", $data);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
$reservedTimes[] = substr($row['hora'], 0, 5);

}

$start = new DateTime('09:00');
$end = new DateTime('18:30');
$interval = new DateInterval('PT30M');
$current = clone $start;
$now = new DateTime();

$availableTimes = [];
while ($current <= $end) {
    $timeValue = $current->format('H:i');
    
    if ($data === $now->format('Y-m-d')) 
    {
        $disabled = in_array($timeValue, $reservedTimes) || in_array($timeValue, ['12:00', '12:30']) || $timeValue < $now->format('H:i');
    }
    elseif ($data < $now->format('Y-m-d'))
    {
        $disabled = true;
    }
    else
    {
        $disabled = in_array($timeValue, $reservedTimes) || in_array($timeValue, ['12:00', '12:30']);
    }

    if (date('w', strtotime($data)) == 0) 
    {
        $disabled = true;
    }
    
    $availableTimes[] = [
        'time' => $timeValue,
        'disabled' => $disabled,
    ];
    $current->add($interval);
}

echo json_encode($availableTimes);

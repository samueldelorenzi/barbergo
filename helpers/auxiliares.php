<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function get_servico_by_id($conexao, $id_servico)
{
    $sql = "SELECT nome, descricao, preco FROM servico WHERE id = ?";
    
    $stmt = mysqli_prepare($conexao, $sql);
    
    if ($stmt) 
    {
        mysqli_stmt_bind_param($stmt, "s", $id_servico);
        
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_bind_result($stmt, $nome, $descricao, $preco);
        
        mysqli_stmt_fetch($stmt);
        
        mysqli_stmt_close($stmt);
        
        return [
            'nome' => $nome,
            'descricao' => $descricao,
            'preco' => $preco
        ];
    } 
    else 
    {
        return "";
    }
}

function adicionar_agendamento($conexao, $agendamento, $id_cliente)
{
    $sqlGravar = "INSERT INTO agendamento (id_cliente, id_servico, dia, hora) VALUES (?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conexao, $sqlGravar);
    
    if ($stmt) 
    {
        mysqli_stmt_bind_param($stmt, "ssss", $id_cliente, $agendamento['servico'], $agendamento['data'], $agendamento['hora']);
        
        $result = mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close($stmt);
        
        return $result;
    } 
    else 
    {
        return false;
    }
}
function get_agendamentos($conexao, $id_cliente)
{
    $sql = "SELECT id_servico, dia, hora FROM agendamento WHERE id_cliente = ? AND CONCAT(dia, ' ', hora) > NOW()";
    
    $stmt = mysqli_prepare($conexao, $sql);
    
    if ($stmt) 
    {
        mysqli_stmt_bind_param($stmt, "s", $id_cliente);
        
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_bind_result($stmt, $id_servico, $dia, $hora);
        
        $agendamentos = [];
        
        while (mysqli_stmt_fetch($stmt)) 
        {
            $agendamentos[] = [
                'id_servico' => $id_servico,
                'dia' => $dia,
                'hora' => $hora
            ];
        }
        
        mysqli_stmt_close($stmt);
        
        return $agendamentos;
    } 
    else 
    {
        return false;
    }
}

function converte_data_usuario($data)
{
    $data = explode("-", $data);
    return $data[2] . "/" . $data[1] . "/" . $data[0];
}

function verificar_horario($conexao, $agendamento) 
{
    $sqlVerificar = "SELECT COUNT(*) FROM agendamento WHERE dia = ? AND hora = ?";

    $stmt = mysqli_prepare($conexao, $sqlVerificar);

    if ($stmt) 
    {
        mysqli_stmt_bind_param($stmt, "ss", $agendamento['dia'], $agendamento['hora']);
        
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_bind_result($stmt, $count);
        
        mysqli_stmt_fetch($stmt);
        
        mysqli_stmt_close($stmt);
        
        if ($count == 0) {
            return adicionar_agendamento($conexao, $agendamento, $_SESSION['id_cliente']);
        } else {
            return false;
        }
    } 
    else 
    {
        return false;
    }
}

function exibe_horarios($selectedDate, $currentDateTime)
{
    $startHour = 8;
    $endHour = 18;
    $today = new DateTime();
    $isToday = $selectedDate->format('Y-m-d') == $today->format('Y-m-d');
    
    for ($hour = $startHour; $hour < $endHour; $hour++) 
    {
        for ($minute = 0; $minute < 60; $minute += 30) 
        {
            $slotTime = clone $today;
            $slotTime->setTime($hour, $minute);
            $slotTime->setDate($selectedDate->format('Y'), $selectedDate->format('m'), $selectedDate->format('d'));
            
            if ($isToday) 
            {
                if ($slotTime > $currentDateTime) 
                {
                    echo '<div class="schedule-slot">';
                    echo $slotTime->format('H:i');
                    echo '</div>';
                }
            } 
            else 
            {
                echo '<div class="schedule-slot">';
                echo $slotTime->format('H:i');
                echo '</div>';
            }
        }
    }
}
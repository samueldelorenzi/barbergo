<?php

// Exibe erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inicia sessão
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function get_servicos($conexao)
{
    $sql = "SELECT id, nome, descricao, preco FROM servico";
    $resultado = mysqli_query($conexao, $sql);
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}
function get_servico_by_id($conexao, $id_servico)
{
    $sql = "SELECT nome, descricao, preco FROM servico WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_servico);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $nome, $descricao, $preco);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return [
            'nome' => $nome,
            'descricao' => $descricao,
            'preco' => $preco
        ];
    } else {
        return [
            'nome' => 'vazio',
            'descricao' => 'vazio',
            'preco' => 'vazio'
        ];
    }
}

function converte_data_usuario($data)
{
    $data = explode("-", $data);
    return $data[2] . "/" . $data[1] . "/" . $data[0];
}

function getHorariosDisp($selectedDate)
{
    $abertura = 8;
    $fechamento = 18;
    $hoje = new DateTime();
    $horarios_mostrados = 0;
    $isToday = $selectedDate->format('Y-m-d') === $hoje->format('Y-m-d');
    $currentDateTime = new DateTime();

    for ($hora = $abertura; $hora < $fechamento; $hora++) {
        for ($minuto = 0; $minuto < 60; $minuto += 30) {
            $slotTime = clone $selectedDate;
            $slotTime->setTime($hora, $minuto);

            if ($isToday or $selectedDate < $hoje) {
                if ($slotTime > $currentDateTime) { 
                    $horarios_mostrados++;
                    echo '<div class="horario">';
                    echo $slotTime->format('H:i'); 
                    echo '</div>';
                }
            } else {
                $horarios_mostrados++;
                echo '<div class="horario">';
                echo $slotTime->format('H:i'); 
                echo '</div>';
            }
        }
    }
    if ($horarios_mostrados == 0) {
        echo '</div>';
        echo '<br>';
        echo '<p>Não há horários disponíveis para o dia selecionado.</p>';
    }
}
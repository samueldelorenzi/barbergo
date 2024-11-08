<?php

// Exibe erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inicia sessão
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function get_servico_by_id($conexao, $id_servico)
{
    // Define a consulta SQL
    $sql = "SELECT nome, descricao, preco FROM servico WHERE id = ?";
    
    // Prepara a declaração SQL
    $stmt = mysqli_prepare($conexao, $sql);
    
    if ($stmt) 
    {
        // Vincula o parâmetro id
        mysqli_stmt_bind_param($stmt, "s", $id_servico);
        
        // Executa a declaração SQL
        mysqli_stmt_execute($stmt);
        
        // Vincula as variáveis de resultado
        mysqli_stmt_bind_result($stmt, $nome, $descricao, $preco);
        
        // Busca o resultado
        mysqli_stmt_fetch($stmt);
        
        // Fecha a declaração
        mysqli_stmt_close($stmt);
        
        // Retorna os detalhes do serviço como um array
        return [
            'nome' => $nome,
            'descricao' => $descricao,
            'preco' => $preco
        ];
    } 
    else 
    {
        // Retorna uma string vazia se a preparação da declaração falhar
        return "";
    }
}

function converte_data_usuario($data)
{
    // Separa a data em partes por hífen
    $data = explode("-", $data);

    // Retorna a data no formato dd/mm/aaaa
    return $data[2] . "/" . $data[1] . "/" . $data[0];
}

function getHorariosDisp($selectedDate)
{
    $abertura = 8;
    $fechamento = 18;
    $hoje = new DateTime();
    $horarios_mostrados = 0;

    $isToday = $selectedDate->format('Y-m-d') === $hoje->format('Y-m-d');

    // Define a hora atual para comparação (apenas se for o dia atual)
    $currentDateTime = new DateTime();

    // Loop para gerar horários
    for ($hora = $abertura; $hora < $fechamento; $hora++) {
        for ($minuto = 0; $minuto < 60; $minuto += 30) {
            // Criar um objeto DateTime para o slot
            $slotTime = clone $selectedDate;
            $slotTime->setTime($hora, $minuto); // Definir o horário do slot

            // Mostrar apenas horários futuros se a data for hoje
            if ($isToday or $selectedDate < $hoje) {
                if ($slotTime > $currentDateTime) { // Mostrar apenas horários futuros
                    $horarios_mostrados++;
                    echo '<div class="horario">';
                    echo $slotTime->format('H:i'); // Exibir no formato 24h
                    echo '</div>';
                }
            } else {
                $horarios_mostrados++;
                echo '<div class="horario">';
                echo $slotTime->format('H:i'); // Exibir no formato 24h
                echo '</div>';
            }

        }
    }
    if($horarios_mostrados == 0)
    {
        echo '</div>';
        echo '<br>';
        echo '<p>Não há horários disponíveis para o dia selecionado.</p>';
    }
}
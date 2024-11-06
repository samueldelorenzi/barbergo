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
    // Separa a data em partes por hífen
    $data = explode("-", $data);

    // Retorna a data no formato dd/mm/aaaa
    return $data[2] . "/" . $data[1] . "/" . $data[0];
}
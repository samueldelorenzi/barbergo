<?php
session_start();
function adicionar_cliente($conexao, $cadastro)
{
    $sqlGravar = "INSERT INTO cliente (nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conexao, $sqlGravar);
    
    if ($stmt) 
    {
        $hashed_password = password_hash($cadastro['senha'], PASSWORD_DEFAULT);
        
        mysqli_stmt_bind_param($stmt, "ssss", $cadastro['nome'], $cadastro['sobrenome'], $cadastro['email'], $hashed_password);
        
        $result = mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close($stmt);
        
        return $result;
    } 
    else 
    {
        return false;
    }
}
function verificar_login($conexao, $login)
{
    $sqlVerificar = "SELECT id, nome, sobrenome, email, senha FROM cliente WHERE email = ?";
    
    $stmt = mysqli_prepare($conexao, $sqlVerificar);
    
    if ($stmt) 
    {
        mysqli_stmt_bind_param($stmt, "s", $login['email']);
        
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_store_result($stmt);
        
        if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_bind_result($stmt, $id, $nome, $sobrenome, $email, $senha);
            
            mysqli_stmt_fetch($stmt);
            
            mysqli_stmt_close($stmt);
            
            if (password_verify($login['senha'], $senha)) {
                $_SESSION['id_cliente'] = $id;

                return [
                    'success' => true, 
                    'user' => [
                        'id' => $id,
                        'nome' => $nome,
                        'sobrenome' => $sobrenome,
                        'email' => $email
                    ]
                ];
            } 
            else 
            {
                return ['success' => false, 'message' => 'Senha incorreta'];
            }
        } 
        else 
        {
            mysqli_stmt_close($stmt);
            return ['success' => false, 'message' => 'Usuário não encontrado'];
        }
    }
    else 
    {
        return ['success' => false, 'message' => 'Erro ao preparar a consulta'];
    }
}

/*function get_cliente_byemail($conexao, $email=$_POST['email']) {
    $sql = "SELECT * FROM cliente WHERE email = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $id, $nome, $sobrenome, $email, $senha);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    return [
        'id' => $id,
        'nome' => $nome,
        'sobrenome' => $sobrenome,
        'email' => $email,
        'senha' => $senha
    ];
}*/

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
    $sql = "SELECT id_servico, dia, hora FROM agendamento WHERE id_cliente = ?";
    
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

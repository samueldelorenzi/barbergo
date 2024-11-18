<?php

date_default_timezone_set('America/Sao_Paulo');

class Agendamento {
    public $conexao;
    public $id_cliente;
    public $id_servico;
    public $dia;
    public $hora;

    public function __construct($conexao, $id_cliente, $id_servico = null, $dia = null, $hora = null) {
        $this->conexao = $conexao;
        $this->id_cliente = $id_cliente;
        $this->id_servico = $id_servico;
        $this->dia = $dia;
        $this->hora = $hora;
    }

    // Adicionar agendamento
    public function adicionar() {
        $sql = "INSERT INTO agendamento (id_cliente, id_servico, dia, hora) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("iiss", $this->id_cliente, $this->id_servico, $this->dia, $this->hora);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }
        return false;
    }
    
    // Verificar disponibilidade do horário
    public function verificarDisponibilidade() {
        if ($this-> dia < date('Y-m-d')) {
            return false;
        }
        if ($this->dia == date('Y-m-d') && $this->hora < date('H:i')) {
            return false;
        }
        $sql = "SELECT COUNT(*) FROM agendamento WHERE dia = ? AND hora = ?";
        $stmt = $this->conexao->prepare($sql);
        
        if ($stmt) {
            $count = 0;  // Inicializando a variável
            $stmt->bind_param("ss", $this->dia, $this->hora);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();
            return $count == 0;
        }
        return false;
    }

    public static function listar($conexao) {
        $sql = "SELECT id, id_cliente, id_servico, dia, hora FROM agendamento ORDER BY dia ASC, hora ASC";
        $stmt = $conexao->prepare($sql);
        
        if ($stmt) {
            $stmt->execute();
            $result = $stmt->get_result();
            $agendamentos = [];
            
            while ($row = $result->fetch_assoc()) {
                $agendamentos[] = $row;
            }
            
            $stmt->close();
            return $agendamentos;
        }
        return [];
    }
    // Listar agendamentos futuros de um cliente
    public static function listarPorCliente($conexao, $id_cliente) {
        $sql = "SELECT id, id_servico, dia, hora FROM agendamento WHERE id_cliente = ? AND CONCAT(dia, ' ', hora) > NOW() ORDER BY dia ASC, hora ASC";
        $stmt = $conexao->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("i", $id_cliente);
            $stmt->execute();
            $result = $stmt->get_result();
            $agendamentos = [];
            
            while ($row = $result->fetch_assoc()) {
                $agendamentos[] = $row;
            }
            
            $stmt->close();
            return $agendamentos;
        }
        return [];
    }
    
    // Função para listar agendamento por ID
    public static function listarPorId($conexao, $id_agendamento) {
        $query = "SELECT * FROM agendamento WHERE id = ?";
        $stmt = mysqli_prepare($conexao, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id_agendamento);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        
        return mysqli_fetch_assoc($resultado); // Retorna um único agendamento
    }
    public static function atualizar($conexao, $id_agendamento, $id_servico, $data, $hora) {
        $query = "UPDATE agendamento SET id_servico = ?, dia = ?, hora = ? WHERE id = ?";
        $stmt = mysqli_prepare($conexao, $query);
        mysqli_stmt_bind_param($stmt, 'issi', $id_servico, $data, $hora, $id_agendamento);
        return mysqli_stmt_execute($stmt);
    }
    
    public static function numAgendamentos ($conexao, $id_cliente) {
        $sql = "SELECT COUNT(*) FROM agendamento WHERE id_cliente = ? AND CONCAT(dia, ' ', hora) > NOW()";
        $stmt = $conexao->prepare($sql);
        
        if ($stmt) {
            $count = 0;  // Inicializando a variável
            $stmt->bind_param("i", $id_cliente);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();
            return $count;
        }
        return 0;
    }
    public static function totalAgendamentos ($conexao) {
        $sql = "SELECT COUNT(*) FROM agendamento WHERE CONCAT(dia, ' ', hora) > NOW()";
        $stmt = $conexao->prepare($sql);
        
        if ($stmt) {
            $count = 0;  // Inicializando a variável
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();
            return $count;
        }
        return 0;
    }
    public static function cancelar($conexao, $id) {
        $sql = "DELETE FROM agendamento WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $result = $stmt->execute();
            $stmt->close();
            return true;
        }
        return false;
    }
}

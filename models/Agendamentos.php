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

    // Listar agendamentos futuros de um cliente
    public static function listarPorCliente($conexao, $id_cliente) {
        $sql = "SELECT id, id_servico, dia, hora FROM agendamento WHERE id_cliente = ? AND CONCAT(dia, ' ', hora) > NOW()";
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

<?php

class Agendamento {
    private $conexao;
    private $id_cliente;
    private $id_servico;
    private $dia;
    private $hora;

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
        $sql = "SELECT id_servico, dia, hora FROM agendamento WHERE id_cliente = ? AND CONCAT(dia, ' ', hora) > NOW()";
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
}

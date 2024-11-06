<?php

class Cliente {
    private $id;
    private $nome;
    private $email;
    private $senha;

    public function __construct($nome, $email, $senha, $id = null) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_BCRYPT);
        $this->id = $id;
    }

    public function cadastrar($conexao) {
        $stmt = $conexao->prepare("INSERT INTO cliente (nome, email, senha) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $this->nome, $this->email, $this->senha);
        return $stmt->execute();
    }

    public static function autenticar($conexao, $email, $senha) {
        $stmt = $conexao->prepare("SELECT * FROM cliente WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        if ($resultado->num_rows > 0) {
            $clienteData = $resultado->fetch_assoc();
            if (password_verify($senha, $clienteData['senha'])) {
                $_SESSION['id_cliente'] = $clienteData['id'];
                return new Cliente($clienteData['nome'], $clienteData['email'], $clienteData['senha'], $clienteData['id']);
            }
        }
        
        return false;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }
}

<?php

// Configurações de exibição de erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexão com o banco de dados
$bdServidor = 'localhost';
$bdUsuario = 'root';
$bdSenha = 'root';
$bdBanco = 'barbergo';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

// Verifica se a conexão foi estabelecida
if (!$conexao) {
    die("Connection failed: " . mysqli_connect_error());
}
// Conectar ao banco de dados


<?php

$bdServidor = 'localhost'; // Use 'localhost' in lowercase
$bdUsuario = 'root';
$bdSenha = 'root';
$bdBanco = 'barbergo';

// Create connection
$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

// Check connection
if (!$conexao) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

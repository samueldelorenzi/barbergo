<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$bdServidor = 'localhost';
$bdUsuario = 'root';
$bdSenha = 'root';
$bdBanco = 'barbergo';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

if (!$conexao) {
    die("Connection failed: " . mysqli_connect_error());
}
<?php
date_default_timezone_set("America/Sao_Paulo");

// Configurações de conexão com o MySQL no Docker Compose
$host = 'mysql';  // Nome do serviço MySQL no Docker Compose
$port = '3306';   // Porta padrão do MySQL
$user = 'root';   // Usuário do MySQL
$password = 'Senha@1234';  // Senha do MySQL
$database = 'eadev';  // Nome do banco de dados

// Conexão com o MySQL
$con = mysqli_connect($host, $user, $password, $database, $port);

// Verifica se houve erro na conexão
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Configura o charset para UTF-8
mysqli_set_charset($con, "utf8");
?>

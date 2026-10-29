<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadastro";

// Conectar ao MySQL
$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Falha na Conexão: " . mysqli_connect_error());
}

// Criar o banco de dados caso não exista
$sql = "CREATE DATABASE IF NOT EXISTS cadastro";
mysqli_query($conn, $sql);

mysqli_select_db($conn, $dbname);


mysqli_query($conn, $sql);

?>
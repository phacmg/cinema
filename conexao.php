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

$sql = "CREATE TABLE IF NOT EXISTS filmes (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(350) NOT NULL,
    autor VARCHAR(200) NOT NULL,
    ano INT DEFAULT NULL,
    editora VARCHAR(100) NOT NULL,
    paginas INT NOT NULL,
    isbn VARCHAR(20) NOT NULL,
    genero VARCHAR(150) NOT NULL,
    classificacao_etaria VARCHAR(150) NOT NULL
)";

mysqli_query($conn, $sql);

?>
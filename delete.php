<?php
    $id = $_GET["id"];
    include "conexao.php";

    $sql = "DELETE FROM filmes WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: consulta.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>
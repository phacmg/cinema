<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela com dados</title>
    <style>
        table{
            border-collapse: collapse;
            text-align: center;
            width: 100%;
        }
        td,tr,th{
            border: 2px solid;
        }
    </style>

<?php
    $id  = $_GET["id"] ?? "";
    $titulo = $_GET["filme"] ?? "";
    $duracao = $_GET["duracao"] ?? "";
    $sinopse = $_GET["sinopse"] ?? "";
    $genero = $_GET["genero"] ?? "";
    $classificacao = $_GET["classificacao"] ?? "";
    $opcaudio = $_GET["opcaudio"] ?? "";
    $status = $_GET["statusfilme"] ?? "";
    $diretor = $_GET["diretor"] ?? "";
    $atorprincip = $_GET["atorprincip"] ?? "";
    $estudio = $_GET["estudio"] ?? "";
    $anolanc = $_GET["anolanc"] ?? "";
    $avaliacao = $_GET["avaliacao"] ?? "";

    include "conexao.php";
?>
</head>

<body>
<?php
$sql = "UPDATE filmes SET 
    titulo = '$titulo',
    duracao = '$duracao',
    sinopse = '$sinopse',
    genero = '$genero',
    classificacao_indicativa = '$classificacao',
    opcao_audio = '$opcaudio',
    status_filme = '$status',
    diretor = '$diretor',
    ator_principal = '$atorprincip',
    estudio = '$estudio',
    ano_lancamento = '$anolanc',
    avaliacao = '$avaliacao'
    WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: consulta.php");
  }else{
    echo "Error: " . $sql . "<br>" . $conn->error;
  }


?>

</body>
</html>

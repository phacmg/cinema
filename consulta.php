<?php
include "conexao.php"; 

if (isset($_GET['ok'])) {

    $titulo = mb_strtoupper($_GET['filme'], 'UTF-8');
    $duracao = mb_strtoupper($_GET['duracao'], 'UTF-8');
    $sinopse = $_GET['sinopse'];
    $genero = mb_strtoupper($_GET['genero'], 'UTF-8');
    $classificacao = $_GET['classificacao'];
    $opcaudio = $_GET['opcaudio'];
    $status = $_GET['statusfilme'];
    $diretor = $_GET['diretor'];
    $atorprincip = $_GET['atorprincip'];
    $estudio = $_GET['estudio'];
    $anolanc = $_GET['anolanc'];
    $avaliacao = $_GET['avaliacao'];

    $sql = 'INSERT INTO filmes (titulo, duracao, sinopse, genero, classificacao_indicativa, opcao_audio, status_filme, diretor, ator_principal, estudio, ano_lancamento, avaliacao) 
            VALUES ("'.$titulo.'", "'.$duracao.'", "'.$sinopse.'", "'.$genero.'", "'.$classificacao.'", "'.$opcaudio.'", "'.$status.'", "'.$diretor.'", "'.$atorprincip.'", "'.$estudio.'", "'.$anolanc.'", "'.$avaliacao.'")';

    if (!mysqli_query($conn, $sql)) {
        echo "<script>alert('Erro ao guardar na base de dados: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CineCatalog - Consulta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilização da tabela de livros */
        .tabela-acervo-livros {
            width: 100%;
            border-collapse: collapse;
            background-color: #fffcf5;
            color: #2c1a14;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #d4a373;
        }

        .tabela-acervo-livros td, .tabela-acervo-livros th {
            border: 1px solid #e6ccb2;
            text-align: center;
            padding: 10px;
            font-size: 14px;  
        }

        /* Cabeçalho principal da tabela */
        .cabecalho-terracota {
            background-color: #b0533c !important;
            color: #ffffff !important;
        }

        /* Alternância de cores das linhas */
        .linha-creme-claro {
            background-color: #fdf8ed;
        }

        .linha-creme-escuro {
            background-color: #f7eee1;
        }

        /* Imagem de fundo com efeito blur */
        .imagem-fundo-com-blur {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-image: url('livros.png'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(5px);                  
            transform: scale(1.05);            
            z-index: -2;                        
        }

        /* Overlay escuro */
        .camada-fundo-escuro {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.2);
            z-index: -1;
        }

        /* Cartão com efeito Glassmorphism */
        .cartao-vidro-fosco {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);    
            background: rgba(255, 255, 255, 0.15) !important;
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 24px !important;
        }

        /* Botão para registrar novo formulário */
        .botao-transparente-secundario {
            background: rgba(255, 255, 255, 0.2);              
            border: 1px solid rgba(255, 255, 255, 0.4);         
            color: white;                                        
            font-weight: 600;                                      
            padding: 10px 25px;
            text-decoration: none;
            display: inline-block;
            transition: 0.3s;
        }

        .botao-transparente-secundario:hover {
            background: rgba(255, 255, 255, 0.35);
            color: white;
        }

        .fonte-titulo-sistema {
            font-family: 'Georgia', serif; 
        }

        .fonte-menu-topo {
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-weight: bold;  
        }
    </style>
</head>
<body>

    <div class="imagem-fundo-com-blur"></div> 
    <div class="camada-fundo-escuro"></div> 
    
    <div class="position-relative z-1 min-vh-100 d-flex flex-column justify-content-between text-white"> 

        <header class="d-flex justify-content-between align-items-center p-3 px-md-5">
            <h1 class="fonte-titulo-sistema m-0 fw-bold fs-1 text-white">CineCatalog</h1>
            <nav class="fonte-menu-topo">
                <a href="index.php" class="text-white text-decoration-none me-2">Home |</a>
                <a href="formulario.php" class="text-white text-decoration-none me-2">Formulário |</a>
                <a href="quem_somos.html" class="text-white text-decoration-none">Quem Somos</a>
            </nav>
        </header>

        <main class="container-fluid px-3 px-md-5 my-auto py-3"> 
            <div class="row justify-content-center">
                <div class="col-12 col-xxl-11">

                    <div class="p-4 p-md-4 cartao-vidro-fosco shadow-lg text-center">
                        <h3 class="text-center text-white mb-3 fw-bold">Filmes Catalogados</h3>
                        <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                            <?php
                            $sql = "SELECT id, titulo, duracao, sinopse, genero, classificacao_indicativa, opcao_audio, status_filme, diretor, ator_principal, estudio, ano_lancamento, avaliacao FROM filmes ORDER BY titulo ASC";
                            $result = mysqli_query($conn, $sql);

                            if ($result && mysqli_num_rows($result) > 0) {

                              echo "<table class='tabela-acervo-livros' id='tabelaConsultaLivros'>";
                              echo "<tr class='cabecalho-terracota'>
                                  <td><strong>ID</strong></td>
                                  <td><strong>Título</strong></td>
                                  <td><strong>Autor</strong></td>
                                  <td><strong>Ano</strong></td>
                                  <td><strong>Editora</strong></td>
                                  <td><strong>Paginas</strong></td>
                                  <td><strong>ISBN</strong></td>
                                  <td><strong>Genero</strong></td>
                                  <td><strong>Classificação Etária</strong></td>
                                  <td colspan='2'><strong>Ações</strong></td>
                                </tr>";
                                
                                $indice = 0;
                                while($row = $result->fetch_assoc()) {
                                  $classeDaLinha = ($indice % 2 == 0) ? 'linha-creme-claro' : 'linha-creme-escuro';
                                  
                                  echo "<tr class='{$classeDaLinha}'>".
                                  "<td>" . $row["id"] . "</td>".
                                  "<td>" . $row["titulo"] . "</td>".
                                  "<td>" . $row["autor"] . "</td>".
                                  "<td>" . $row["ano"] . "</td>".
                                  "<td>" . $row["editora"] . "</td>".
                                  "<td>" . $row["paginas"] . "</td>".
                                  "<td>" . $row["isbn"] . "</td>".
                                  "<td>" . $row["genero"] . "</td>".
                                  "<td>" . $row["classificacao_etaria"] . "</td>".
                                  "<td><a href='editar.php?id={$row['id']}' class='btn btn-sm btn-outline-primary fw-bold'>Editar</a></td>".
                                  "<td><a href='deletar.php?id={$row['id']}' class='btn btn-sm btn-outline-danger fw-bold' onclick='return confirm(\"Tem certeza que deseja deletar este livro?\");'>Deletar</a></td>".
                                  "</tr>"; 

                                  $indice++;
                              }
                                
                              echo "</table>";
                              
                            } else {
                              echo "<p class='text-white fs-5 m-0'>Nenhum filme encontrado.</p>";
                            }

                            $conn->close();
                            ?>
                        </div>

                        <div class="mt-3">
                            <a href="formulario.php" class="botao-transparente-secundario rounded-3">Registrar Novo Filme</a>
                        </div>

                    </div>

                </div>
            </div>
        </main>
        <div></div>
    </div>

    <script>
        function filtrarTabela() {
            const input = document.getElementById('campoPesquisa');
            const termoBusca = input.value.toUpperCase();
            const tabela = document.getElementById('tabelaConsultaLivros');
            
            if (!tabela) return;

            const linhas = tabela.getElementsByTagName('tr');

            for (let i = 1; i < linhas.length; i++) {
                let conteudoLinha = linhas[i].textContent || linhas[i].innerText;
                
                if (conteudoLinha.toUpperCase().indexOf(termoBusca) > -1) {
                    linhas[i].style.display = "";
                } else {
                    linhas[i].style.display = "none";
                }
            }
        }
    </script>

</body>
</html>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
    <?php
    include "conexao.php";

    $codigo = $_GET['codigo'];
    $sql = "SELECT codigo, titulo, avaliacao, ator_principal, lancamento, diretor, genero, duracao, classificacao FROM filmes WHERE codigo = $codigo";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<form action='atualiza.php' method='get' onsubmit='return verificar()'>
                ID: <input type='text' id='id' name='id' value='{$row['id']}' readonly><br>
    
                Filme: <input type='text' id='filme' name='filme' value='{$row['titulo']}' onkeyup='this.value = this.value.toUpperCase()'><br>
    
                Duração: <input type='text' id='duracao' name='duracao' value='{$row['duracao']}'><br>
    
                Sinopse:<br>
                <textarea id='sinopse' name='sinopse' rows='4' onkeyup='this.value = this.value.toLowerCase()'>{$row['sinopse']}</textarea><br>
    
                Gênero:
                <select id='genero' name='genero'>
                    <option value='acao' " . ($row['genero'] == 'acao' ? 'selected' : '') . ">Ação</option>
                    <option value='animacao' " . ($row['genero'] == 'animacao' ? 'selected' : '') . ">Animação</option>
                    <option value='aventura' " . ($row['genero'] == 'aventura' ? 'selected' : '') . ">Aventura</option>
                    <option value='biografia' " . ($row['genero'] == 'biografia' ? 'selected' : '') . ">Biografia</option>
                    <option value='comedia' " . ($row['genero'] == 'comedia' ? 'selected' : '') . ">Comédia</option>
                    <option value='crime' " . ($row['genero'] == 'crime' ? 'selected' : '') . ">Crime / Policial</option>
                    <option value='documentario' " . ($row['genero'] == 'documentario' ? 'selected' : '') . ">Documentário</option>
                    <option value='drama' " . ($row['genero'] == 'drama' ? 'selected' : '') . ">Drama</option>
                    <option value='fantasia' " . ($row['genero'] == 'fantasia' ? 'selected' : '') . ">Fantasia</option>
                    <option value='ficcao_cientifica' " . ($row['genero'] == 'ficcao_cientifica' ? 'selected' : '') . ">Ficção Científica</option>
                    <option value='guerra' " . ($row['genero'] == 'guerra' ? 'selected' : '') . ">Guerra</option>
                    <option value='misterio' " . ($row['genero'] == 'misterio' ? 'selected' : '') . ">Mistério</option>
                    <option value='romance' " . ($row['genero'] == 'romance' ? 'selected' : '') . ">Romance</option>
                    <option value='suspense' " . ($row['genero'] == 'suspense' ? 'selected' : '') . ">Suspense (Thriller)</option>
                    <option value='terror' " . ($row['genero'] == 'terror' ? 'selected' : '') . ">Terror</option>
                </select><br>
    
                Classificação Indicativa:
                <select id='classificacao' name='classificacao'>
                    <option value='livre' " . ($row['classificacao_indicativa'] == 'livre' ? 'selected' : '') . ">Livre</option>
                    <option value='10anos' " . ($row['classificacao_indicativa'] == '10anos' ? 'selected' : '') . ">10 anos</option>
                    <option value='12anos' " . ($row['classificacao_indicativa'] == '12anos' ? 'selected' : '') . ">12 anos</option>
                    <option value='14anos' " . ($row['classificacao_indicativa'] == '14anos' ? 'selected' : '') . ">14 anos</option>
                    <option value='16anos' " . ($row['classificacao_indicativa'] == '16anos' ? 'selected' : '') . ">16 anos</option>
                    <option value='maior18' " . ($row['classificacao_indicativa'] == 'maior18' ? 'selected' : '') . ">18+ anos</option>
                </select><br>
    
                Opção de Áudio:
                <select id='opcaudio' name='opcaudio'>
                    <option value='dublado' " . ($row['opcao_audio'] == 'dublado' ? 'selected' : '') . ">Dublado</option>
                    <option value='legendado' " . ($row['opcao_audio'] == 'legendado' ? 'selected' : '') . ">Legendado</option>
                    <option value='nacional' " . ($row['opcao_audio'] == 'nacional' ? 'selected' : '') . ">Nacional</option>
                    <option value='dublado_legendado' " . ($row['opcao_audio'] == 'dublado_legendado' ? 'selected' : '') . ">Dublado / Legendado</option>
                </select><br>
    
                Status do Filme:
                <select id='statusfilme' name='statusfilme'>
                    <option value='breve' " . ($row['status_filme'] == 'breve' ? 'selected' : '') . ">Em Breve</option>
                    <option value='emcartaz' " . ($row['status_filme'] == 'emcartaz' ? 'selected' : '') . ">Em Cartaz</option>
                    <option value='foracartaz' " . ($row['status_filme'] == 'foracartaz' ? 'selected' : '') . ">Fora de Cartaz</option>
                </select><br>
    
                Diretor: <input type='text' id='diretor' name='diretor' value='{$row['diretor']}'><br>
    
                Ator/Atriz Principal: <input type='text' id='atorprincip' name='atorprincip' value='{$row['ator_principal']}'><br>
    
                Estúdio: <input type='text' id='estudio' name='estudio' value='{$row['estudio']}'><br>
    
                Ano de Lançamento: <input type='number' id='anolanc' name='anolanc' value='{$row['ano_lancamento']}'><br>
    
                Avaliação: <input type='text' id='avaliacao' name='avaliacao' value='{$row['avaliacao']}'><br>
    
                <input type='submit' name='OK' value='Atualizar'>
                <input type='reset' name='Limpar' value='Cancelar'>
            </form>";
        }
    } else {
        echo "Nenhum filme encontrado.";
    }

    mysqli_close($conn);
    ?>

    <script>
        function verificar(){
            var ano = document.getElementById('ano');
            var diretor = document.getElementById('diretor');
            var ator = document.getElementById('ator');
            var avaliacao = document.getElementById('avaliacao');
            var duracao = document.getElementById('duracao');

            if (!diretor.value){
                alert("o campo diretor deve estar preenchido");
                return false;
            }
            if (!ator.value){
                alert("o campo ator/atriz principal deve estar preenchido");
                return false;
            }
            if (!avaliacao.value){
                alert("o campo avaliação deve estar preenchido");
                return false;
            }
            if (!duracao.value){
                alert("o campo duração deve estar preenchido");
                return false;
            }
        }
    </script>
</body>
</html>
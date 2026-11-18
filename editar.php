<?php
include "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Filme</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        body {
            background-image: url('cinema.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .card-transparente {
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .glass-input {
            background: rgba(255, 255, 255, 0.2) !important;
            border: none !important;
            border-bottom: 2px solid rgba(255, 255, 255, 0.7) !important;
            border-radius: 4px !important;
            color: #fff !important;
        }

        .glass-input option {
            background-color: #ffffff !important;
            color: #212529 !important;
        }
    </style>
</head>

<body class="min-vh-100 d-flex align-items-center py-5">

    <div class="container my-auto">
        <div class="card shadow-lg bg-white bg-opacity-50 border-0 card-transparente">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3 bg-opacity-90 px-4">
                <h3 class="card-title mb-0 fw-bold">Editar Registro</h3>
                <div>
                    <a href="index.php" class="btn btn-outline-light btn-sm fw-bold me-1">Início</a>
                    <a href="consulta.php" class="btn btn-outline-light btn-sm fw-bold me-1">Consulta</a>
                    <a href="quem_somos.html" class="btn btn-outline-light btn-sm fw-bold">Quem Somos</a>
                </div>
            </div>

            <div class="card-body p-4">
                <?php
                $id = $_GET['id'];
                $sql = "SELECT id, titulo, duracao, sinopse, genero, classificacao_indicativa, opcao_audio, status_filme, diretor, ator_principal, estudio, ano_lancamento, avaliacao FROM filmes WHERE id = $id";
                $result = $conn->query($sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<form action='atualiza.php' method='get' onsubmit='return verificar()'>

                            <div class='row mb-3'>
                                <div class='col-md-2 mb-2'>
                                    <label for='id' class='form-label fw-bold'>ID:</label>
                                    <input id='id' type='text' class='form-control glass-input' name='id' value='{$row['id']}' readonly>
                                </div>
                                <div class='col-md-7 mb-2'>
                                    <label for='filme' class='form-label fw-bold'>Título:</label>
                                    <input id='filme' type='text' class='form-control glass-input' name='filme' value='{$row['titulo']}'
                                        onkeyup='this.value = this.value.toUpperCase()'>
                                </div>
                                <div class='col-md-3 mb-2'>
                                    <label for='duracao' class='form-label fw-bold'>Duração:</label>
                                    <input type='text' id='duracao' class='form-control glass-input' name='duracao' value='{$row['duracao']}'
                                        placeholder='Ex: 120 min'>
                                </div>
                            </div>

                            <div class='mb-3'>
                                <label for='sinopse' class='form-label fw-bold'>Sinopse:</label>
                                <textarea id='sinopse' class='form-control glass-input' name='sinopse' rows='2'
                                    onkeyup='this.value = this.value.toLowerCase()'>{$row['sinopse']}</textarea>
                            </div>

                            <div class='row mb-3'>
                                <div class='col-md-6 mb-2'>
                                    <label for='genero' class='form-label fw-bold'>Gênero:</label>
                                    <select id='genero' name='genero' class='form-control glass-input'>
                                        <option value=''>Selecione um gênero...</option>
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
                                    </select>
                                </div>

                                <div class='col-md-6 mb-2'>
                                    <label for='classificacao' class='form-label fw-bold'>Classificação Indicativa:</label>
                                    <select id='classificacao' name='classificacao' class='form-control glass-input'>
                                        <option value=''>Selecione a classificação...</option>
                                        <option value='livre' " . ($row['classificacao_indicativa'] == 'livre' ? 'selected' : '') . ">Livre</option>
                                        <option value='10anos' " . ($row['classificacao_indicativa'] == '10anos' ? 'selected' : '') . ">10 anos</option>
                                        <option value='12anos' " . ($row['classificacao_indicativa'] == '12anos' ? 'selected' : '') . ">12 anos</option>
                                        <option value='14anos' " . ($row['classificacao_indicativa'] == '14anos' ? 'selected' : '') . ">14 anos</option>
                                        <option value='16anos' " . ($row['classificacao_indicativa'] == '16anos' ? 'selected' : '') . ">16 anos</option>
                                        <option value='maior18' " . ($row['classificacao_indicativa'] == 'maior18' ? 'selected' : '') . ">18+ anos</option>
                                    </select>
                                </div>
                            </div>

                            <div class='row mb-3'>
                                <div class='col-md-6 mb-2'>
                                    <label for='opcaudio' class='form-label fw-bold'>Opção de Áudio:</label>
                                    <select id='opcaudio' name='opcaudio' class='form-control glass-input'>
                                        <option value=''>Selecione o áudio...</option>
                                        <option value='dublado' " . ($row['opcao_audio'] == 'dublado' ? 'selected' : '') . ">Dublado</option>
                                        <option value='legendado' " . ($row['opcao_audio'] == 'legendado' ? 'selected' : '') . ">Legendado</option>
                                        <option value='nacional' " . ($row['opcao_audio'] == 'nacional' ? 'selected' : '') . ">Nacional</option>
                                        <option value='dublado_legendado' " . ($row['opcao_audio'] == 'dublado_legendado' ? 'selected' : '') . ">Dublado / Legendado</option>
                                    </select>
                                </div>

                                <div class='col-md-6 mb-2'>
                                    <label for='statusfilme' class='form-label fw-bold'>Status do Filme:</label>
                                    <select id='statusfilme' name='statusfilme' class='form-select glass-input'>
                                        <option value=''>Selecione o status...</option>
                                        <option value='breve' " . ($row['status_filme'] == 'breve' ? 'selected' : '') . ">Em Breve</option>
                                        <option value='emcartaz' " . ($row['status_filme'] == 'emcartaz' ? 'selected' : '') . ">Em Cartaz</option>
                                        <option value='foracartaz' " . ($row['status_filme'] == 'foracartaz' ? 'selected' : '') . ">Fora de Cartaz</option>
                                    </select>
                                </div>
                            </div>

                            <div class='row mb-3'>
                                <div class='col-md-4 mb-2'>
                                    <label for='diretor' class='form-label fw-bold'>Diretor:</label>
                                    <input type='text' id='diretor' class='form-control glass-input' name='diretor' value='{$row['diretor']}'>
                                </div>
                                <div class='col-md-4 mb-2'>
                                    <label for='atorprincip' class='form-label fw-bold'>Ator/Atriz Principal:</label>
                                    <input type='text' id='atorprincip' class='form-control glass-input' name='atorprincip' value='{$row['ator_principal']}'>
                                </div>
                                <div class='col-md-4 mb-2'>
                                    <label for='estudio' class='form-label fw-bold'>Estúdio:</label>
                                    <input type='text' id='estudio' class='form-control glass-input' name='estudio' value='{$row['estudio']}'>
                                </div>
                            </div>

                            <div class='row mb-4'>
                                <div class='col-md-6 mb-2'>
                                    <label for='anolanc' class='form-label fw-bold'>Ano de Lançamento:</label>
                                    <input type='number' id='anolanc' class='form-control glass-input' name='anolanc' value='{$row['ano_lancamento']}'
                                        placeholder='Ex: 2024'>
                                </div>
                                <div class='col-md-6 mb-2'>
                                    <label for='avaliacao' class='form-label fw-bold'>Avaliação:</label>
                                    <input type='text' id='avaliacao' class='form-control glass-input' name='avaliacao' value='{$row['avaliacao']}'
                                        placeholder='Ex: 8.5'>
                                </div>
                            </div>

                            <div class='d-flex justify-content-end gap-2'>
                                <input type='reset' class='btn btn-secondary px-4' name='Limpar' value='Cancelar'>
                                <input type='submit' class='btn btn-primary px-4 fw-bold' name='OK' value='Atualizar'>
                            </div>

                        </form>";
                    }
                } else {
                    echo "<p class='text-center fw-bold fs-5 mb-0'>Nenhum filme encontrado.</p>";
                }

                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>

    <script>
        function verificar() {
            const filme = document.getElementById('filme').value.trim();
            const duracao = document.getElementById('duracao').value.trim();
            const sinopse = document.getElementById('sinopse').value.trim();
            const genero = document.getElementById('genero').value;
            const classificacao = document.getElementById('classificacao').value;
            const opcaudio = document.getElementById('opcaudio').value;
            const statusfilme = document.getElementById('statusfilme').value;
            const diretor = document.getElementById('diretor').value.trim();
            const atorprinc = document.getElementById('atorprincip').value.trim();
            const estudio = document.getElementById('estudio').value.trim();
            const anolanc = document.getElementById('anolanc').value.trim();
            const avaliacao = document.getElementById('avaliacao').value.trim();

            if (!filme) { alert("O campo Título deve estar preenchido."); document.getElementById('filme').focus(); return false; }
            if (!duracao) { alert("O campo Duração deve estar preenchido."); document.getElementById('duracao').focus(); return false; }
            if (!sinopse) { alert("O campo Sinopse deve estar preenchido."); document.getElementById('sinopse').focus(); return false; }
            if (!genero) { alert("Selecione o Gênero do filme."); document.getElementById('genero').focus(); return false; }
            if (!classificacao) { alert("Selecione a Classificação Indicativa."); document.getElementById('classificacao').focus(); return false; }
            if (!opcaudio) { alert("Selecione a Opção de Áudio."); document.getElementById('opcaudio').focus(); return false; }
            if (!statusfilme) { alert("Selecione o Status do Filme."); document.getElementById('statusfilme').focus(); return false; }
            if (!diretor) { alert("O campo Diretor deve estar preenchido."); document.getElementById('diretor').focus(); return false; }
            if (!atorprinc) { alert("O campo Ator/Atriz Principal deve estar preenchido."); document.getElementById('atorprincip').focus(); return false; }
            if (!estudio) { alert("O campo Estúdio deve estar preenchido."); document.getElementById('estudio').focus(); return false; }
            if (!anolanc) { alert("O campo Ano de Lançamento deve estar preenchido."); document.getElementById('anolanc').focus(); return false; }
            if (!avaliacao) { alert("O campo Avaliação deve estar preenchido."); document.getElementById('avaliacao').focus(); return false; }

            return true;
        }
    </script>

</body>

</html>
<?php
include "conexao.php"
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Filmes</title>

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
                <h3 class="card-title mb-0 fw-bold">Cadastro de Filmes</h3>
                <div>
                    <a href="index.php" class="btn btn-outline-light btn-sm fw-bold me-1">Início</a>
                    <a href="quem_somos.html" class="btn btn-outline-light btn-sm fw-bold">Quem Somos</a>
                </div>
            </div>

            <div class="card-body p-4">
                <form action="consulta.php" method="get" onsubmit="return testar()">

                    <div class="row mb-3">
                        <div class="col-md-8 mb-2">
                            <label for="filme" class="form-label fw-bold">Título:</label>
                            <input id="filme" type="text" class="form-control glass-input" name="filme"
                                onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="duracao" class="form-label fw-bold">Duração:</label>
                            <input type="text" id="duracao" class="form-control glass-input" name="duracao"
                                placeholder="Ex: 120 min">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="sinopse" class="form-label fw-bold">Sinopse:</label>
                        <textarea id="sinopse" class="form-control glass-input" name="sinopse" rows="4"
                            onkeyup="this.value = this.value.toLowerCase()"></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-2">
                            <label for="genero" class="form-label fw-bold">Gênero:</label>
                            <select id="genero" name="genero" class="form-control glass-input">
                                <option value="">Selecione um gênero...</option>
                                <option value="acao">Ação</option>
                                <option value="animacao">Animação</option>
                                <option value="aventura">Aventura</option>
                                <option value="biografia">Biografia</option>
                                <option value="comedia">Comédia</option>
                                <option value="crime">Crime / Policial</option>
                                <option value="documentario">Documentário</option>
                                <option value="drama">Drama</option>
                                <option value="fantasia">Fantasia</option>
                                <option value="ficcao_cientifica">Ficção Científica</option>
                                <option value="guerra">Guerra</option>
                                <option value="misterio">Mistério</option>
                                <option value="romance">Romance</option>
                                <option value="superheroi">Super-herói</option>
                                <option value="suspense">Suspense (Thriller)</option>
                                <option value="terror">Terror</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="classificacao" class="form-label fw-bold">Classificação Indicativa:</label>
                            <select id="classificacao" name="classificacao" class="form-control glass-input">
                                <option value="">Selecione a classificação...</option>
                                <option value="livre">Livre</option>
                                <option value="10anos">10 anos</option>
                                <option value="12anos">12 anos</option>
                                <option value="14anos">14 anos</option>
                                <option value="16anos">16 anos</option>
                                <option value="maior18">18+ anos</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-2">
                            <label for="opcaudio" class="form-label fw-bold">Opção de Áudio:</label>
                            <select id="opcaudio" name="opcaudio" class="form-control glass-input">
                                <option value="">Selecione o áudio...</option>
                                <option value="dublado">Dublado</option>
                                <option value="legendado">Legendado</option>
                                <option value="nacional">Nacional</option>
                                <option value="dublado_legendado">Dublado / Legendado</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="statusfilme" class="form-label fw-bold">Status do Filme:</label>
                            <select id="statusfilme" name="statusfilme" class="form-select glass-input">
                                <option value="">Selecione o status...</option>
                                <option value="breve">Em Breve</option>
                                <option value="emcartaz">Em Cartaz</option>
                                <option value="foracartaz">Fora de Cartaz</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 mb-2">
                            <label for="diretor" class="form-label fw-bold">Diretor:</label>
                            <input type="text" id="diretor" class="form-control glass-input" name="diretor">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="atorprincip" class="form-label fw-bold">Ator/Atriz Principal:</label>
                            <input type="text" id="atorprincip" class="form-control glass-input" name="atorprincip">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="estudio" class="form-label fw-bold">Estúdio:</label>
                            <input type="text" id="estudio" class="form-control glass-input" name="estudio">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-2">
                            <label for="anolanc" class="form-label fw-bold">Ano de Lançamento:</label>
                            <input type="number" id="anolanc" class="form-control glass-input" name="anolanc"
                                placeholder="Ex: 2024">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="avaliacao" class="form-label fw-bold">Avaliação:</label>
                            <input type="text" id="avaliacao" class="form-control glass-input" name="avaliacao"
                                placeholder="Ex: 8.5">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <input type="reset" class="btn btn-secondary px-4" name="Limpar" value="Cancelar">
                        <input type="submit" class="btn btn-primary px-4 fw-bold" name="OK" value="Confirmar">
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        function testar() {
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

            if (!filme) {alert("O campo Título deve estar preenchido."); document.getElementById('filme').focus(); return false;}
            if (!duracao) {alert("O campo Duração deve estar preenchido."); document.getElementById('duracao').focus(); return false;}
            if (!sinopse) {alert("O campo Sinopse deve estar preenchido."); document.getElementById('sinopse').focus(); return false;}
            if (!genero) {alert("Selecione o Gênero do filme."); document.getElementById('genero').focus(); return false;}
            if (!classificacao) {alert("Selecione a Classificação Indicativa."); document.getElementById('classificacao').focus(); return false;}
            if (!opcaudio) {alert("Selecione a Opção de Áudio."); document.getElementById('opcaudio').focus(); return false;}
            if (!statusfilme) {alert("Selecione o Status do Filme."); document.getElementById('statusfilme').focus(); return false;}
            if (!diretor) {alert("O campo Diretor deve estar preenchido."); document.getElementById('diretor').focus(); return false;}
            if (!atorprinc) {alert("O campo Ator/Atriz Principal deve estar preenchido."); document.getElementById('atorprincip').focus(); return false;}
            if (!estudio) {alert("O campo Estúdio deve estar preenchido."); document.getElementById('estudio').focus(); return false;}
            if (!anolanc) {alert("O campo Ano de Lançamento deve estar preenchido."); document.getElementById('anolanc').focus(); return false;}
            if (!avaliacao) {alert("O campo Avaliação deve estar preenchido."); document.getElementById('avaliacao').focus(); return false;}

            return true;
        }
    </script>

</body>

</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Início - Sistema de Catalogação de Filmes</title>

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

        .feature-card {
            background: rgba(255, 255, 255, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2) !important;
        }
    </style>
</head>

<body class="min-vh-100 d-flex align-items-center py-5">

    <div class="container my-auto">
        <div class="card shadow-lg bg-white bg-opacity-50 border-0 card-transparente">
            
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3 bg-opacity-90 px-4">
                <h3 class="card-title mb-0 fw-bold">🎬 CineCatalog</h3>
                <div class="d-flex gap-2">
                    <a href="formulario.php" class="btn btn-outline-light btn-sm fw-bold">Cadastrar Filme</a>
                    <a href="quem_somos.html" class="btn btn-outline-light btn-sm fw-bold">Quem Somos</a>
                </div>
            </div>

            <div class="card-body p-4 text-dark">
                
                <div class="text-center my-3">
                    <h1 class="display-5 fw-bold mb-3">Bem-vindo ao CineCatalog</h1>
                    <p class="lead col-md-10 mx-auto fw-semibold">
                        Sua plataforma completa para gerenciamento e organização do seu cinema. Aqui você encontra tudo sobre os lançamentos, diretores, gêneros e avaliações dos seus filmes preferidos.
                    </p>
                </div>

                <div class="row g-4 mt-2 mb-4">
                    
                    <div class="col-md-6">
                        <div class="feature-card p-4 h-100 d-flex flex-column justify-content-between shadow-sm">
                            <div>
                                <div class="fs-1 text-primary mb-2">📝</div>
                                <h4 class="fw-bold">Cadastro de Filmes</h4>
                                <p class="mb-3">
                                    Adicione novos filmes ao catálogo, podendo ser incluídos com vários atributos diferentes trazendo uma experiência mais completa para você!
                                </p>
                            </div>
                            <div>
                                <a href="formulario.php" class="btn btn-primary w-100 fw-bold">Ir para Cadastro</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="feature-card p-4 h-100 d-flex flex-column justify-content-between shadow-sm">
                            <div>
                                <div class="fs-1 text-primary mb-2">👥</div>
                                <h4 class="fw-bold">Nossa Equipe</h4>
                                <p class="mb-3">
                                    Conheça os programadores responsáveis pelo desenvolvimento e manutenção deste projeto.
                            </div>
                            <div>
                                <a href="quem_somos.html" class="btn btn-outline-primary w-100 fw-bold">Ver Desenvolvedores</a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Rodapé -->
                <div class="mt-4 pt-3 border-top border-secondary text-center">
                    <p class="mb-0 small fw-bold">Projeto desenvolvido para a disciplina de Desenvolvimento Web - 2026</p>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
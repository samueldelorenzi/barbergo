<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback e Avaliação - BarberGO</title>

    <!-- Bootstrap CSS --><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark px-4 sticky-top top-0">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center flex-grow-1 w-50">
                <img src="../assets/img/icone.png" class="img" alt="Logo BarberGO">
                <p class="text-white fw-bold my-auto fs-3 ms-2">BarberGO</p>
            </div>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 fs-6 remove-outline-lg" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 fs-6 remove-outline-lg" href="../index.php#services">Serviços</a></li>
                    <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 fs-6 remove-outline-lg" href="../index.php#barbers">Clientes</a></li>
                    <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 fs-6 remove-outline-lg" href="form_cadastro.php">Cadastro</a></li>
                </ul>
            </div>
            <div class="d-flex justify-content-end flex-grow-1 w-50">
                <a href="form_login.php" class="btn btn-warning login">Login</a>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="text-center">Feedback e Avaliação</h1>
        <p class="text-center">Sua opinião é muito importante para nós! Por favor, avalie nossos serviços e nos diga o que podemos melhorar.</p>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Deixe sua Avaliação</h3>
                    </div>
                    <div class="card-body">
                        <form action="submit_feedback.php" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Seu Nome</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Seu E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="rating" class="form-label">Avaliação (1 a 5 estrelas)</label>
                                <select class="form-select" id="rating" name="rating" required>
                                    <option value="1">1 Estrela</option>
                                    <option value="2">2 Estrelas</option>
                                    <option value="3">3 Estrelas</option>
                                    <option value="4">4 Estrelas</option>
                                    <option value="5">5 Estrelas</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="feedback" class="form-label">Seu Feedback</label>
                                <textarea class="form-control" id="feedback" name="feedback" rows="4" required></textarea>
                            </div>

                            <div class="text-center">
                    <button type="submit" name="gravar" class="btn btn-warning w-50 mt-3 p-2">Salvar alterações</button>
                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

    <footer class="container-fluid text-light bg-dark ">
        <div class="row py-3">
            <div class="col-md-3 mb-3 text-center text-md-left">
                <h3 class="fs-5">Termo de Responsabilidade</h3>
                <a href="./views/privacy.php" class="nav-link">Privacidade</a><br>
                <a href="./views/term.php" class="nav-link">Termos de Uso</a>
            </div>
            <hr class="w-75 mx-auto d-md-none">
            <div class="col-md-3 mb-3 text-center text-md-left">
                <h3 class="fs-5">Equipe</h3>
                <a href="views/sobre.php" class="nav-link">Sobre Nós</a>
            </div>
            <hr class="w-75 mx-auto d-md-none">
            <div class="col-md-3 mb-3 text-center text-md-left">
                <h3 class="fs-5">Feedback e Suporte</h3>
                <a href="views/feedback.php" class="nav-link">Feedback e Avaliações</a><br>
                <a href="views/suport.php" class="nav-link">Suporte e Contato</a>
            </div>
            <hr class="w-75 mx-auto d-md-none">
            <div class="col-md-3 mb-3 text-center text-md-left">
                <h3 class="fs-5">Siga-nos nas Redes Sociais</h3>
                <div class="btn-group border">
                    <a href="https://instagram.com" target="_blank" class="btn btn-warning fs-4 p-2 border"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://facebook.com" target="_blank" class="btn btn-warning fs-4 p-2 border"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://linkedin.com" target="_blank" class="btn btn-warning fs-4 p-2 border"><i class="fa-brands fa-linkedin"></i></a>
                </div>
                <p>&copy; BarberGO 2024</p>
            </div>
        </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

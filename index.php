<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberGO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/icone.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="assets/css/style-home.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark px-4 sticky-top top-0">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center flex-grow-1 w-50">
                <img src="assets/img/icone.png" class="img" alt="Logo BarberGO">
                <p class="text-white fw-bold my-auto fs-3 ms-2">BarberGO</p>
            </div>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="btn btn btn-warning mx-md-1 fs-6" href="#home">Home</a></li>
                    <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 fs-6 remove-outline-lg" href="#services">Serviços</a></li>
                    <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 fs-6 remove-outline-lg" href="#barbers">Clientes</a></li>
                    <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 fs-6 remove-outline-lg" href="views/form_cadastro.php">Cadastro</a></li>
                </ul>
            </div>
            <div class="d-flex justify-content-end flex-grow-1 w-50">
                <a href="views/form_login.php" class="btn btn-outline-warning mx-md-1 fs-6 remove-outline-lg">Login</a>
            </div>
        </div>
    </nav>
    <section class="carousel slide" id="barberCarousel" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#barberCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#barberCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#barberCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/image1.jpg" class="d-block w-100 img-fluid" alt="Barbearia 1">
            </div>
            <div class="carousel-item">
                <img src="assets/img/image2.jpg" class="d-block w-100 img-fluid" alt="Barbearia 2">
            </div>
            <div class="carousel-item">
                <img src="assets/img/image3.jpg" class="d-block w-100 img-fluid" alt="Barbearia 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#barberCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#barberCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </section>
    <section id="home">
        <div class="container text-center">
            <h1 class="">Agende seus horários pelo <span class="text-warning">BarberGO</span> e descubra a <span class="text-warning">praticidade</span></h1>
            <p class="description">Com o BarberGO, você pode agendar seus horários com facilidade e rapidez, garantindo que seu visual esteja sempre impecável.<br>Descubra a praticidade e a conveniência de escolher seus serviços e barbeiros favoritos, tudo em um único lugar.<br>Experimente agora e veja a diferença em sua rotina!</p>
        </div>
    </section>
    <h2 id="services" class="text-center my-md-4">Serviços para escolher</h2>
    <h3 class="text-center">Decida seu atendimento já na hora de marcar horários</h3>
    <section id="services" class="my-5 services">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4  h100 ">
                        <img src="assets/img/client-doing-hair-cut-barber-shop-salon.jpg" class="card-img-top img-thumbnail" alt="Corte de Cabelo">
                        <div class="card-body">
                            <h5 class="card-title">Corte de cabelo</h5>
                            <p class="card-text">A melhor maneira de agendar a régua para o final de semana.</p>
                            <a href="views/form_login.php" class="btn btn-warning w-100">Agende agora mesmo!</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 h100">
                        <img src="assets/img/handsome-man-shaving-beard-barbershop copy.jpg" class="card-img-top img-thumbnail" alt="Barba">
                        <div class="card-body">
                            <h5 class="card-title">Barba</h5>
                            <p class="card-text">Serviços de barbearia da melhor qualidade!</p>
                            <a href="views/form_login.php" class="btn btn-warning w-100">Agende agora mesmo!</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4  h100 ">
                        <img src="assets/img/image2.png" class="card-img-top img-thumbnail" alt="Coloração">
                        <div class="card-body">
                            <h5 class="card-title">Coloração</h5>
                            <p class="card-text">O top 1 quando o assunto é agendamento de mudança visual.</p>
                            <a href="views/form_login.php" class="btn btn-warning w-100">Agende agora mesmo!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <h2 class="mb-4 text-center">Nossos clientes</h2>
    <h3 class="text-center my-md-3">Alguns relatos de quem já usa o BarberGO</h3>
    <section id="barbers" class="my-5">
        <div class="container text-center barbers">
            <div class="row">
                <div class="col-md-4 barbers services">
                    <div id="1" class="card mb-4">
                        <img class="card-img-top" src="" alt="Imagem do cliente">
                        <div class="card-body">
                            <h5 class="card-author"></h5>
                            <p class="card-quote"></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 barbers services">
                    <div id="2" class="card mb-4">
                        <img class="card-img-top" src="" alt="Imagem do cliente">
                        <div class="card-body">
                            <h5 class="card-author"></h5>
                            <p class="card-quote"></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 barbers services">
                    <div id="3" class="card mb-4">
                        <img class="card-img-top" src="" alt="Imagem do cliente">
                        <div class="card-body">
                            <h5 class="card-author"></h5>
                            <p class="card-quote"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/barberChange.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberGO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <link rel="shortcut icon" href="anexos/icone.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/scrollreveal"></script>
    <style>
        * {
    margin: 0;
    padding: 0;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    box-sizing: border-box;
}

:root {
    --cor1: chocolate;
    --cor2: #613a29;
    --cor3: rgba(255, 255, 0, 0.253);
}

/* Estilos gerais */
h1 {
    font-size: 30px;
    margin-top: 10px;
}

p {
    font-size: 19px;
    padding: 10px;
    text-align: center;
    margin-bottom: 5px;
}

.img {
    height: 60px;
    color: chocolate;
    background: #613a29;
    border-radius: 50%;
    box-shadow: 2px 1px 3px black;
}

.testimonial {
    background-color: white;
    padding: 10px;
    border-radius: 10px;
}

.img-fluid {
    height: 400px;
    object-fit: cover;
}

.dish-rate {
    color: var(--cor2);
    margin-bottom: 10px;
}

.navbar {
    background-color: #343a40;
    align-items: center;
}

.navbar-brand,
.nav-link {
    color: white;
}

body {
    background-color: #e0e0e0;
}

/* Ajustes gerais nos cards */
.card {
    display: flex;
    flex-direction: column;
    text-align: center;
    justify-content: space-between;
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
    margin: 20px;
    padding: 15px;
    position: relative;
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.312);
    transition: transform 0.3s ease-in-out;
}

/* Efeito hover nos cards */
.card:hover {
    transform: scale(1.03);
    box-shadow: 8px 8px 20px rgba(0, 0, 0, 0.3);
}

.card-img-top {
    height: 200px;
    object-fit: cover;
}

.card-title {
    font-size: 1.5rem;
    margin-bottom: 10px;
}

.card-text {
    font-size: 1rem;
    line-height: 1.5;
    margin-bottom: 15px;
}

.carousel-item img {
    height: 400px;
    object-fit: cover;
}

.testimonials {
    background-color: #f8f9fa;
    padding: 50px 0;
}


.services {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    gap: 15px;
    padding: 20px 0;
}


@media (min-width: 992px) {
    .card {
        flex: 1 1 calc(100% / 4 - 20px);
        margin: 15px;
    }
    .btn-outline-warning:hover{
        border-bottom: 2px solid white;
    }
}

@media (min-width: 768px) {
    .card {
        flex: 1 1 calc(100% / 2 - 20px); 
        margin: 15px;
    }
    .remove-outline-lg {
        border: none !important;
    }
}


@media (max-width: 767px) {
    .card {
        flex: 1 1 100%; 
        margin: 10px;
    }
}


@media (min-width: 768px) {
    .remove-outline-lg {
        border: none !important;
    }

    .login {
        animation: pulse 1s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.2);
        }

        100% {
            transform: scale(1);
        }
    }
}
h2{
    background-image: linear-gradient(to right ,var(--cor1), transparent);
}
.btn-warning, .btn-header>.btn {
    background-color: chocolate;
    border: none;
    font-weight: 600;
} 
.btn-warning:hover{
    background-color:chocolate;; ;
}
.btn-outline-warning{
    color: chocolate;
    border-top: 2px solid chocolate;
   
}
.btn-outline-warning:hover{
    background-color: chocolate
}
.row .nav-link{
    color: chocolate;
    text-decoration: underline;
}
    
    </style>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark d-flex justify-content-center align-content-center p-3">
    <div class="container">
        <img src="assets/img/icone.png" class="img" alt="Logo BarberGO">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class=" navbar-toggler-icon"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mx-md-auto pt-5">
                <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 w-100 fs-6 remove-outline-lg " href="#home">Home</a></li>
                <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 w-100 fs-6  remove-outline-lg" href="#services">Serviços</a></li>
                <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 w-100 fs-6  remove-outline-lg" href="#barbers">Barbeiros</a></li>
                <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 w-100 fs-6 remove-outline-lg" href="#">Cadastro</a></li>
            </ul>
            <div class="btn-header">
                <a href="#" class="btn btn-warning active login w-100">Login</a>
            </div>
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
            <img src="assets/img/image.png" class="d-block w-100 img-fluid" alt="Barbearia 1">
        </div>
        <div class="carousel-item">
            <img src="assets/img/background.jpg" class="d-block w-100 img-fluid" alt="Barbearia 2">
        </div>
        <div class="carousel-item">
            <img src="assets/img/image1.png" class="d-block w-100 img-fluid" alt="Barbearia 3">
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
        <h1 class="">Desfrute da <span class="text-warning">BarberGO</span> e os <span class="text-warning">Serviços</span> que ela oferece</h1>
        <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet</p>
    </div>
</section>
<h2 class="text-center">Nossos Serviços</h2>
<section id="services " class="my-5 services">
    <div class="container text-center">
       
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="assets/img/client-doing-hair-cut-barber-shop-salon.jpg" class="card-img-top" alt="Corte de Cabelo">
                    <div class="card-body">
                        <h5 class="card-title">Corte de Cabelo</h5>
                        <p class="card-text">Experiência de corte personalizada com os melhores profissionais.</p>
                        <button class="btn btn-warning w-100">Agende Agora</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="assets/img/handsome-man-shaving-beard-barbershop copy.jpg" class="card-img-top" alt="Barba">
                    <div class="card-body">
                        <h5 class="card-title">Barba</h5>
                        <p class="card-text">Deixe sua barba impecável com nossos serviços de barbearia.</p>
                        <button class="btn btn-warning w-100">Agende Agora</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="assets/img//image2.png" class="card-img-top" alt="Coloração">
                    <div class="card-body">
                        <h5 class="card-title">Coloração</h5>
                        <p class="card-text">Transforme seu visual com nossas opções de coloração.</p>
                        <button class="btn btn-warning w-100">Agende Agora</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<h2 class="mb-4 text-center">Nossos Barbeiros</h2>
<section id="barbers" class="my-5 ">
    <div class="container text-center barbers">
        
        <div class="row">
           
            <div class="col-md-4 barbers services ">
                <div id="1"class="card mb-4">
                    <img class="card-img-top" src="https://i.pravatar.cc/150?img=7" alt="Barbeiro 1">
                    <div class="card-body">
                        <h5 class="card-title">João Almeida</h5>
                        <p class="card-text">Especialista em cortes modernos e barbeiros experientes.</p>
                    </div>
                </div>
            </div>
           
            <div class="col-md-4 barbers services">
                <div id="2" class="card mb-4">
                    <img class="card-img-top" src="https://i.pravatar.cc/150?img=12" alt="Barbeiro 2">
                    <div class="card-body">
                        <h5 class="card-title">Fábio Santos</h5>
                        <p class="card-text">Famoso por seu atendimento e cortes impecáveis.</p>
                    </div>
                </div>
            </div>
     
            <div class="col-md-4 barbers services">
                <div id="3" class="card mb-4">
                    <img class="card-img-top" src="https://i.pravatar.cc/150?img=17" alt="Barbeiro 3">
                    <div class="card-body">
                        <h5 class="card-title">Carlos Eduardo</h5>
                        <p class="card-text">Barbeiro reconhecido pela qualidade e eficiência nos serviços.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<footer class="container-fluid text-light bg-dark">
    <div class="row py-3">
        <div class="col-md-3 mb-3 text-center text-md-left">
            <h3 class="fs-5">Termo de Responsabilidade</h3>
            <a href="#" class="nav-link">Privacidade</a><br>
            <a href="#" class="nav-link">Termos de Uso</a>
        </div>
        <div class="col-md-3 mb-3 text-center text-md-left">
            <h3 class="fs-5">Equipe</h3>
            <a href="#" class="nav-link">Sobre Nós</a>
        </div>
        <div class="col-md-3 mb-3 text-center text-md-left">
            <h3 class="fs-5">Feedback e Suporte</h3>
            <a href="#" class="nav-link">Feedback e Avaliações</a><br>
            <a href="#" class="nav-link">Suporte e Contato</a>
        </div>
        <div class="col-md-3 mb-3 text-center text-md-left">
            <h3 class="fs-5">Siga-nos nas Redes Sociais</h3>
            <div class="btn-group">
                <a href="https://instagram.com" target="_blank" class="btn btn-warning fs-4"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://facebook.com" target="_blank" class="btn btn-warning fs-4"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://linkedin.com" target="_blank" class="btn btn-warning fs-4"><i class="fa-brands fa-linkedin"></i></a>
            </div>
            <p>&copy; BarberGO 2024</p>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
     const testimonials_barber_1 = [
            {
                img: "https://i.pravatar.cc/150?img=7",
                quote: "Serviço impecável! O atendimento da BarberGO é excelente e o corte ficou perfeito.",
                author: "João Almeida"
            },
            {
                img: "https://i.pravatar.cc/150?img=8",
                quote: "A BarberGO superou minhas expectativas. Ambiente agradável e profissionais capacitados.",
                author: "Marcelo Costa"
            },
            {
                img: "https://i.pravatar.cc/150?img=9",
                quote: "Muito satisfeito com o corte e a barba. Com certeza voltarei.",
                author: "Pedro Oliveira"
            },
            {
                img: "https://i.pravatar.cc/150?img=10",
                quote: "Ótima experiência! A BarberGO é a melhor barbearia que já frequentei.",
                author: "Gustavo Lima"
            },
            {
                img: "https://i.pravatar.cc/150?img=11",
                quote: "Atendimento excelente e resultado melhor ainda. Recomendo muito.",
                author: "Lucas Moreira"
            }
        ];

        const testimonials_barber_2 = [
            {
                img: "https://i.pravatar.cc/150?img=12",
                quote: "Adorei o ambiente e o serviço. Fui muito bem atendido!",
                author: "Fábio Santos"
            },
            {
                img: "https://i.pravatar.cc/150?img=13",
                quote: "A BarberGO sempre me atende com perfeição. Altamente recomendada!",
                author: "Rafael Souza"
            },
            {
                img: "https://i.pravatar.cc/150?img=14",
                quote: "Cortes modernos e barbeiros muito profissionais. Experiência incrível.",
                author: "Mateus Dias"
            },
            {
                img: "https://i.pravatar.cc/150?img=15",
                quote: "Ambiente acolhedor e resultado perfeito no corte e barba.",
                author: "Leonardo Alves"
            },
            {
                img: "https://i.pravatar.cc/150?img=16",
                quote: "Recomendo para todos! Atendimento e serviço impecáveis.",
                author: "Thiago Ramos"
            }
        ];

        const testimonials_barber_3 = [
            {
                img: "https://i.pravatar.cc/150?img=17",
                quote: "Melhor barbearia da cidade! Muito atenciosos e serviço de qualidade.",
                author: "Carlos Eduardo"
            },
            {
                img: "https://i.pravatar.cc/150?img=18",
                quote: "Ótimo atendimento, profissionais qualificados. Voltarei com certeza.",
                author: "André Oliveira"
            },
            {
                img: "https://i.pravatar.cc/150?img=19",
                quote: "Corte rápido e bem feito. Serviço excelente.",
                author: "José Roberto"
            },
            {
                img: "https://i.pravatar.cc/150?img=20",
                quote: "Gostei muito do corte e da barba. Vale cada centavo.",
                author: "Bruno Lima"
            },
            {
                img: "https://i.pravatar.cc/150?img=21",
                quote: "Ambiente confortável e profissionais experientes. Recomendo!",
                author: "Henrique Cardoso"
            }
        ];

        let currentTestimonialIndex1 = 0;
        let currentTestimonialIndex2 = 0;
        let currentTestimonialIndex3 = 0;

        function updateTestimonials() {
            const testimonial1 = testimonials_barber_1[currentTestimonialIndex1];
            $('#1 .feedback-avatar').attr('src', testimonial1.img);
            $('#1 .feedback-text').text(testimonial1.quote);
            $('#1 .feedback-author').text(testimonial1.author);

            const testimonial2 = testimonials_barber_2[currentTestimonialIndex2];
            $('#2 .feedback-avatar').attr('src', testimonial2.img);
            $('#2 .feedback-text').text(testimonial2.quote);
            $('#2 .feedback-author').text(testimonial2.author);

            const testimonial3 = testimonials_barber_3[currentTestimonialIndex3];
            $('#3 .feedback-avatar').attr('src', testimonial3.img);
            $('#3 .feedback-text').text(testimonial3.quote);
            $('#3 .feedback-author').text(testimonial3.author);

            currentTestimonialIndex1 = (currentTestimonialIndex1 + 1) % testimonials_barber_1.length;
            currentTestimonialIndex2 = (currentTestimonialIndex2 + 1) % testimonials_barber_2.length;
            currentTestimonialIndex3 = (currentTestimonialIndex3 + 1) % testimonials_barber_3.length;
        }

        $(document).ready(function() {
            updateTestimonials();
            setInterval(updateTestimonials, 5000);
        });
    </script>

</script>
<script src="assets/js/animation.js"></script>
</body>
</html>

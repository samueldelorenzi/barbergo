<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberGO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="anexos/icone.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/scrollreveal"></script>
    <style>
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand, .nav-link {
            color: white;
        }
        
       
        .card-img-top {
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s;
        }
        .card:hover .card-img-top {
            transform: scale(1.02);
        }
        .testimonials {
            background-color: #f8f9fa;
            padding: 50px 0;
        }
        @media (min-width: 992px) {
            .remove-outline-lg {
                border: none !important;
            }
        }
        .carousel-item img {
    height: 400px; 
    object-fit: cover; 
}

    </style>
</head>
<body>

    
<nav class="navbar navbar-expand-md navbar-dark bg-dark d-flex justify-content-center align-content-center p-3">
    <div class="container-fluid">
        <img src="assets/img/ico" alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           
            <i class="bi bi-list navbar-toggler-icon-custom"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mx-md-auto pt-5">
                <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 w-100 remove-outline-lg" href="#">Home</a></li>
                <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 w-100 remove-outline-lg" href="#">Serviços</a></li>
                <li class="nav-item"><a class="btn btn-outline-warning mx-md-1 w-100 remove-outline-lg" href="#">Avaliações</a></li>
            </ul>
            <div>
                <a href="#" class="btn btn-warning active w-100">Login</a>
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
                <img src="background.jpg" class="d-block w-100 img-fluid" alt="Barbearia 1">
            </div>
            <div class="carousel-item">
                <img src="background.jpg" class="d-block w-100 img-fluid" alt="Barbearia 2">
            </div>
            <div class="carousel-item">
                <img src="background.jpg" class="d-block w-100 img-fluid" alt="Barbearia 3">
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
        <div class="container"></div>
        <div class="text-center">
            <h1 class="">Desfrute da <span>sua</span> Barbearia <span></span></h1>
            <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet</p>
            
            
        </div>
        
    </section>
    <section class="services my-5">
        <div class="container text-center">
            <h2 class="text-center">Nossos Serviços</h2>
            <div class="row">
                <div class="col-md-4 services">
                    <div class="card mb-4">
                        <img src="handsome-man-shaving-beard-barbershop.jpg" class="card-img-top" alt="Corte de Cabelo">
                        <div class="card-body">
                            <h5 class="card-title">Corte de Cabelo</h5>
                            <p class="card-text">Experiência de corte personalizada com os melhores profissionais.</p>
                            <div class="dish-rate">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <span>(500+)</span>
                            </div>
                            <button class="btn btn-primary w-100">Agende Agora</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 services" >
                    <div class="card mb-4">
                        <img src="client-doing-hair-cut-barber-shop-salon.jpg" class="card-img-top" alt="Barba">
                        <div class="card-body">
                            <h5 class="card-title">Barba</h5>
                            <p class="card-text">Deixe sua barba impecável com nossos serviços de barbearia.</p>
                            <div class="dish-rate">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <span>(500+)</span>
                            </div>
                            <button class="btn btn-primary w-100">Agende Agora</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 services" >
                    <div class="card mb-4">
                        <img src="handsome-man-shaving-beard-barbershop.jpg" class="card-img-top" alt="Coloração">
                        <div class="card-body">
                            <h5 class="card-title">Coloração</h5>
                            <p class="card-text">Transforme seu visual com nossas opções de coloração.</p>
                            <div class="dish-rate">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <span>(500+)</span>
                            </div>
                            <button class="btn btn-primary w-100 ">Agende Agora</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-6 testimonial border" id="1">
                <img class="feedback-avatar img rounded-circle" src="https://i.pravatar.cc/150?img=1"  alt="Avatar 1">
                <p class="feedback-text">A plataforma Zampz é incrível! Facilitou muito a organização dos nossos jogos universitários.</p>
                <p class="feedback-author"><strong>Ana Silva</strong></p>
            </div>
            <div class="col-md-6 testimonial border  " id="2">
                <div class="">
                    <img class="feedback-avatar img rounded-circle" src="https://i.pravatar.cc/150?img=4" alt="Avatar 2">
                    <p class="feedback-text">A Zampz revolucionou a forma como organizamos nossos campeonatos. É uma ferramenta essencial.</p>
                    <p class="feedback-author"><strong>Lucas Fernandes</strong></p>
                </div>
            </div>
        </div>
    </div>

    <footer class="container ">
        <div class="row py-3">
           
            <div class="col-sm-12 col-md-3 mb-3 text-center text-md-left">
                <h3 class="my-2 fs-5 ">Termo de Responsabilidade</h3>
                <a href="#">Privacidade</a><br>
                <a href="#">Termos de Uso</a>
            </div>
    
           
            <div class="col-sm-12 col-md-3 mb-3 text-center text-md-left">
                <h3 class="my-2 fs-5">Equipe</h3>
                <a href="#">Sobre Nós</a>
            </div>
    
           
            <div class="col-sm-12 col-md-3 mb-3 text-center text-md-left">
                <h3 class="my-2 fs-5">Feedback e Suporte</h3>
                <a href="#">Feedback e Avaliações</a><br>
                <a href="#">Suporte e Contato</a>
            </div>
    
           
            <div class="col-sm-12 col-md-3 mb-3 text-center text-md-left">
                <h3 class="my-2 fs-5">Siga-nos nas Redes Sociais</h3>
                <div class="btn btn-group ">
                    <a href="https://instagram.com" target="_blank" class="btn btn-primary bg-opacity-100 fs-4 border" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://facebook.com" target="_blank"  class="btn btn-primary bg-opacity-100 fs-4 border" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://linkedin.com" target="_blank"  class="btn btn-primary bg-opacity-100 fs-4 border " aria-label="LinkedIn"><i class="fa-brands fa-linkedin"></i></a>
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

let currentTestimonialIndex1 = 0;
let currentTestimonialIndex2 = 0;

function updateTestimonials() {
    
    const testimonial1 = testimonials_barber_1[currentTestimonialIndex1];
    $('#1 .feedback-avatar').attr('src', testimonial1.img);
    $('#1 .feedback-text').text(testimonial1.quote);
    $('#1 .feedback-author').text(testimonial1.author);

  
    const testimonial2 = testimonials_barber_2[currentTestimonialIndex2];
    $('#2 .feedback-avatar').attr('src', testimonial2.img);
    $('#2 .feedback-text').text(testimonial2.quote);
    $('#2 .feedback-author').text(testimonial2.author);

   
    currentTestimonialIndex1 = (currentTestimonialIndex1 + 1) % testimonials_barber_1.length;
    currentTestimonialIndex2 = (currentTestimonialIndex2 + 1) % testimonials_barber_2.length;
}


$(document).ready(function() {
    updateTestimonials();
    setInterval(updateTestimonials, 5000);
});

    </script>
    <script src="assets/js/animation.js"></script>
</body>
</html>

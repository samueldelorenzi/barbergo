<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre - BarberGO</title>

    <!-- Bootstrap CSS --> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/your/styles.css">
    <link rel="shortcut icon" href="../assets/img/icone.png" type="image/x-icon">
</head>
<body>

<nav class="navbar bg-danger navbar-dark  bg-dark  d-flex justify-content-center align-items-center p-4 sticky-top top-0"> 
        <div class="container">
        <img src="../assets/img/icone.png" class="img" alt="Logo BarberGO" style="height: 60px;">
        <button class="btn text-white" data-bs-toggle="offcanvas" data-bs-target="#painel">
        <i class="fa-solid fa-bars fs-3 border p-2 rounded" id="burger"></i>
</button>
</button>
        </div>
    </nav>
    <div class="offcanvas offcanvas-end fade" id="painel" tabindex="-1" data-bs-backdrop="static">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">
                Painel
            </h5>
            <button class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
                <p>Bem-vindo ao BarberGO!</p>
        <ul class="list-group accordion">
            <li class="list-group-item"><i class="fa-solid fa-cut"></i> Corte de Cabelo</li>
            <li class="list-group-item"><i class="fa-solid fa-beard"></i> Barba</li>
            <li class="list-group-item"><i class="fa-solid fa-calendar-check"></i> Agendar Horário</li>
            <li class="list-group-item"><i class="fa-solid fa-images"></i> Galeria</li>
            <li class="list-group-item"><i class="fa-solid fa-phone"></i> Contato</li>
            <li class="list-group-item"><i class="fa-solid fa-info-circle"></i> Sobre Nós</li>
        </ul>

            
           
            </ul>
        </div>
    </div>
    <div class="text-center">
        
            <h1>BarberGO - A Plataforma para Gestão de Barbearias</h1>
            <p>O <strong>BarberGO</strong> é uma plataforma completa para gestão de barbearias, facilitando o agendamento de clientes, gerenciamento de barbeiros e o controle de serviços oferecidos.</p>
        
    </div>

    <section class="container my-5">
        <h2 class="text-center">Funcionalidades Principais</h2>
        <table class="table table-striped mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Funcionalidade</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Agendamento Online</strong></td>
                    <td>Permite que os clientes agendem seus horários com facilidade, com confirmação em tempo real e lembretes automáticos.</td>
                </tr>
                <tr>
                    <td><strong>Gerenciamento de Barbeiros</strong></td>
                    <td>Administra a agenda e os serviços de cada barbeiro, permitindo que os clientes escolham seu profissional preferido.</td>
                </tr>
                <tr>
                    <td><strong>Relatórios e Estatísticas</strong></td>
                    <td>Exibe relatórios visuais sobre o fluxo de clientes, serviços mais solicitados e feedbacks.</td>
                </tr>
                <tr>
                    <td><strong>Feedback e Avaliações</strong></td>
                    <td>Coleta avaliações dos clientes para melhorar a experiência e destacar os barbeiros mais bem avaliados.</td>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- Equipe do Projeto -->
    <section class="container my-5">
        <h2 class="text-center">Equipe do Projeto</h2>
        <table class="table table-bordered mt-4">
            <thead class="table-secondary">
                <tr>
                    <th>Membro</th>
                    <th>Papel</th>
                    <th>Descrição</th>
                    <th>Imagem</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Paulo Mário Valente Bumba</strong></td>
                    <td>Desenvolvedor Frontend</td>
                    <td>Responsável pela criação de interfaces de usuário interativas e responsivas, aplicando princípios de design moderno e boas práticas de desenvolvimento.</td>
                    <td><img src="assets/img/paulo.jpg" alt="Foto de Paulo Bumba" class="img-fluid" style="max-width: 150px;"></td>
                </tr>
                <!-- Adicione outras linhas da equipe conforme necessário -->
            </tbody>
        </table>
    </section>

    <!-- Tecnologias Usadas -->
    <section class="container my-5">
        <h2 class="text-center">Tecnologias Usadas</h2>
        <div class="row text-center mt-4">
            <div class="col-6 col-md-3">
                <img src="https://img.icons8.com/color/48/000000/html-5.png" alt="HTML5">
                <p>HTML5</p>
            </div>
            <div class="col-6 col-md-3">
                <img src="https://img.icons8.com/color/48/000000/css3.png" alt="CSS3">
                <p>CSS3</p>
            </div>
            <div class="col-6 col-md-3">
                <img src="https://img.icons8.com/color/48/000000/javascript.png" alt="JavaScript">
                <p>JavaScript</p>
            </div>
            <div class="col-6 col-md-3">
                <img src="https://img.icons8.com/ios-filled/50/000000/jquery.png" alt="jQuery">
                <p>jQuery</p>
            </div>
            <div class="col-6 col-md-3">
                <img src="https://img.icons8.com/color/48/000000/mysql-logo.png" alt="MySQL">
                <p>MySQL</p>
            </div>
            <div class="col-6 col-md-3">
                <img src="https://img.icons8.com/color/48/000000/php.png" alt=".NET">
                <p>.NET</p>
            </div>
            <div class="col-6 col-md-3">
                <img src="https://img.icons8.com/color/48/000000/c-sharp-logo.png" alt="C#">
                <p>C#</p>
            </div>
            <div class="col-6 col-md-3">
                <img src="https://img.icons8.com/color/48/000000/bootstrap.png" alt="Bootstrap">
                <p>Bootstrap</p>
            </div>
        </div>
    </section>
    <footer class="container-fluid text-light bg-dark ">
    <div class="row py-3">
        <div class="col-md-3 mb-3 text-center text-md-left">
            <h3 class="fs-5">Termo de Responsabilidade</h3>
            <a href="#" class="nav-link">Privacidade</a><br>
            <a href="#" class="nav-link">Termos de Uso</a>
        </div>
        <hr class="w-75 mx-auto d-md-none">
        <div class="col-md-3 mb-3 text-center text-md-left">
            <h3 class="fs-5">Equipe</h3>
            <a href="#" class="nav-link">Sobre Nós</a>
        </div>
        <hr class="w-75 mx-auto d-md-none">
        <div class="col-md-3 mb-3 text-center text-md-left">
            <h3 class="fs-5">Feedback e Suporte</h3>
            <a href="#" class="nav-link">Feedback e Avaliações</a><br>
            <a href="#" class="nav-link">Suporte e Contato</a>
        </div>
        <hr class="w-75 mx-auto d-md-none">
        <div class="col-md-3 mb-3 text-center text-md-left">
            <h3 class="fs-5">Siga-nos nas Redes Sociais</h3>
            <div class="btn-group border ">
                <a href="https://instagram.com" target="_blank" class="btn btn-warning fs-3 p-2 border"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://facebook.com" target="_blank" class="btn btn-warning fs-4 p-2 border"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://linkedin.com" target="_blank" class="btn btn-warning fs-4 p-2 border"><i class="fa-brands fa-linkedin"></i></a>
            </div>

            <p>&copy; BarberGO 2024</p>
        </div>
    </div>
</footer>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

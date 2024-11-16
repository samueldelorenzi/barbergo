<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberGO - Início</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../assets/img/icone.png" type="image/x-icon">
    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .form-card {
            background-color: #fff;
            border: 1px solid #d9d9d9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-card-header {
            background-color: #d2691e; /* chocolate */
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .form-card-body {
            padding: 20px;
        }
        .btn-custom {
            background-color: #ff8c00; /* laranja */
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: #cc7000; /* marrom */
        }
        .form-group label {
            color: #5a3e2b; /* chocolate escuro */
            font-weight: bold;
        }
        .form-control {
            border: 1px solid #b5651d; /* chocolate */
        }
        .form-control:focus {
            border-color: #ff8c00; /* laranja */
            box-shadow: none;
        }
        .form-card {
            background-color: #fff;
            border: 1px solid #ccc; /* Cinza neutro */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border: 1px solid #ccc; /* Borda cinza neutro nos campos */
        }

        .form-control:focus {
            border-color: #ff8c00; /* Laranja ao focar */
            box-shadow: none;
        }
        .btn-primary {
            background-color: chocolate;
            border: none;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: rgba(76, 52, 19, 0.877);
            border: none;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row pt-3">
            <div class="col-lg-6 col-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>3</h3>
                        <p>Próximos Agendamentos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <a href="?pagina=agendamento" class="small-box-footer">Ver Agendamentos <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>Perfil</h3>
                        <p>Atualize suas informações</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <a href="?pagina=perfil" class="small-box-footer">Ver Perfil <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Formulário de Agendamento -->
        <div class="container-fluid d-flex align-items-center justify-content-center bg-opacity-75">
            <div class="rounded col-12 col-lg-8 shadow-lg p-4 bg-white glass shadow-darker border border-opacity-75">
                <h1 class="fs-5 my-4 text-center">Agendar seu Horário no BarberGO</h1>
                
                <form method="POST" action="../controllers/agendamento.php" class="needs-validation pb-3" novalidate autocomplete="on">
                    <!-- Campo para a data com ícone -->
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-calendar-day"></i></span>
                        <input type="date" class="form-control" id="data" name="data" required>
                    </div>

                    <!-- Campo para a hora com ícone -->
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-clock"></i></span>
                        <input type="time" class="form-control" id="hora" name="hora" required>
                    </div>

                    <!-- Campo para o serviço com ícone -->
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-cut"></i></span>
                        <select class="form-control" id="servico" name="servico" required>
                            <option value="1">Corte de Cabelo</option>
                            <option value="2">Barba</option>
                            <option value="3">Corte + Barba</option>
                        </select>
                    </div>

                    <?php
                        if (isset($_SESSION['success_message'])) {
                            echo '<p class="text-success text-center">' . $_SESSION['success_message'] . '</p>';
                            unset($_SESSION['success_message']);
                        } elseif (isset($_SESSION['error_message'])) {
                            echo '<p class="text-danger text-center">' . $_SESSION['error_message'] . '</p>';
                            unset($_SESSION['error_message']);
                        }
                    ?>

                    <!-- Botão de envio -->
                    <button type="submit" name="gravar" class="btn btn-primary w-100 mt-3">Agendar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

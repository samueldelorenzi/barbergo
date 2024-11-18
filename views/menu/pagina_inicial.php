<?php
require_once '../models/Agendamentos.php';
require_once '../controllers/banco.php';

// exibe erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Flag para abrir o modal
$abrirModal = false;

// Verifica se existe uma mensagem de erro ou sucesso
if (isset($_SESSION['success_message']) || isset($_SESSION['error_message'])) {
    $abrirModal = true;
}
?>

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
    <link rel="stylesheet" href="../assets/css/style-menus.css">
</head>
<body>
<div class="container">
    <div class="row pt-3">
        <!-- Primeira small-box ocupando 100% da largura -->
        <div class="col-12">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>Agendar</h3>
                    <p>Agende seu horário agora</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <a href="#" class="small-box-footer" data-toggle="modal" data-target="#agendamentoModal">
                    Agendar Horário <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Segunda e terceira small-box ocupando 50% cada uma -->
        <div class="col-lg-6 col-12">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?php echo Agendamento::numAgendamentos($conexao, $_SESSION['id_cliente']) ?></h3>
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
</div>

<!-- Modal -->
<div class="modal fade container-fluid mx-auto needs-validation" id="agendamentoModal" tabindex="-1" 
     aria-labelledby="agendamentoModalLabel" aria-hidden="true" 
     data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center fs-2" id="agendamentoModalLabel">Agende seu horário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="../controllers/agendamento.php" class="needs-validation" novalidate autocomplete="on">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-calendar-day"></i></span>
                        <input type="date" class="form-control" id="data" name="data" required>
                        <div class="invalid-feedback">Por favor, selecione uma data.</div>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-clock"></i></span>
                        <input type="time" class="form-control" id="hora" name="hora" required>
                        <div class="invalid-feedback">Por favor, selecione um horário.</div>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-cut"></i></span>
                        <select class="form-control" id="servico" name="servico" required>
                            <option value="1">Corte de Cabelo</option>
                            <option value="2">Barba</option>
                            <option value="3">Corte + Barba</option>
                        </select>
                        <div class="invalid-feedback">Por favor, selecione um serviço.</div>
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

                    <div class="text-center">
                        <button type="submit" name="gravar" class="btn btn-primary w-50 mt-3 p-2">Salvar alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            var forms = document.getElementsByClassName('needs-validation');
            Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);

        // Força abertura do modal se houver mensagem de erro ou sucesso
        $(document).ready(function () {
            <?php if ($abrirModal): ?>
                $('#agendamentoModal').modal('show');
            <?php endif; ?>
        });
    })();
</script>
</body>
</html>

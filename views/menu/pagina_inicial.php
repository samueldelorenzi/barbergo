<?php
require_once '../models/Agendamentos.php';
require_once '../controllers/banco.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$abrirModal = false;

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
    <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="toast text-center bg-green fw-bold justify-content-center align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body text-center w-100">
                        <?php echo $_SESSION['success_message']; ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-3 my-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            <?php unset($_SESSION['success_message']); ?>
        <?php elseif (isset($_SESSION['error_message'])): ?>
            <div class="toast text-center text-bg-danger fw-bold justify-content-center align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body text-center w-100">
                        <?php echo $_SESSION['error_message']; ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-3 my-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>
    </div>
    <div class="container">
        <div class="row pt-3">
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
            <div class="col-lg-6 col-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo Agendamento::numAgendamentos($conexao, $_SESSION['id_cliente']) ?></h3>
                        <p>Próximos Agendamentos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <a href="?pagina=agendamento" class="small-box-footer">Ver Agendamentos <i
                            class="fas fa-arrow-circle-right"></i></a>
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
                    <a href="?pagina=perfil" class="small-box-footer">Ver Perfil <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade container-fluid mx-auto needs-validation" id="agendamentoModal" tabindex="-1"
        aria-labelledby="agendamentoModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-chocolate text-white">
                    <h5 class="modal-title text-center fs-2 w-100" id="agendamentoModalLabel">Agende seu horário</h5>
                    <button type="button" class="btn-close btn-close-white" data-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form method="POST" action="../controllers/agendamento.php" class="needs-validation" novalidate
                        autocomplete="on">
                        <div class="mb-3">
                            <label for="data" class="form-label fw-bold">Escolha a data:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fa-solid fa-calendar-day"></i></span>
                                <input type="date" class="form-control" id="data" name="data" 
                                    min="<?php echo date('Y-m-d'); ?>"
                                    max="<?php echo date('Y-m-d', strtotime('+1 month')); ?>"
                                required>
                                <div class="invalid-feedback">Por favor, selecione uma data.</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold d-block">Escolha um horário:</label>
                            <div id="horarios-container" class="d-flex flex-wrap gap-2">
                                <p class="text-muted">Selecione uma data para ver os horários disponíveis.</p>
                            </div>
                            <div class="invalid-feedback">Por favor, selecione um horário.</div>
                        </div>
                        <div class="mb-3">
                            <label for="servico" class="form-label fw-bold">Selecione o serviço:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fa-solid fa-cut"></i></span>
                                <select class="form-select" id="servico" name="servico" required>
                                    <option value="">Escolha...</option>
                                    <option value="1">Corte de Cabelo</option>
                                    <option value="2">Barba</option>
                                    <option value="3">Corte + Barba</option>
                                </select>
                                <div class="invalid-feedback">Por favor, selecione um serviço.</div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="gravar" class="btn btn-primary w-50 mt-3 p-2 shadow-sm">
                                <i class="fa-solid fa-check"></i> Salvar alterações
                            </button>
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
        })();

        document.getElementById('data').addEventListener('change', function () {
            const selectedDate = this.value;
            console.log('Data selecionada:', selectedDate);  // Verifique o valor aqui
            const horariosContainer = document.getElementById('horarios-container');

            horariosContainer.innerHTML = '<p class="text-muted">Carregando horários...</p>';

            fetch(`../helpers/gethorarios.php?data=${selectedDate}`)
                .then(response => response.json())
                .then(data => {
                    horariosContainer.innerHTML = '';
                    if (data.error) {
                        horariosContainer.innerHTML = `<p class="text-danger">${data.error}</p>`;
                        return;
                    }
                    data.forEach(item => {
                        const radioWrapper = document.createElement('div');
                        radioWrapper.className = 'form-check form-check-inline';

                        const radioInput = document.createElement('input');
                        radioInput.type = 'radio';
                        radioInput.name = 'hora';
                        radioInput.id = `hora-${item.time}`;
                        radioInput.value = item.time;
                        radioInput.required = true;
                        radioInput.className = 'form-check-input';
                        if (item.disabled) {
                            radioInput.disabled = true;
                        }

                        const radioLabel = document.createElement('label');
                        radioLabel.htmlFor = `hora-${item.time}`;
                        radioLabel.className = `form-check-label badge ${item.disabled ? 'bg-dark text-muted' : 'bg-chocolate text-white'} p-2`;
                        radioLabel.textContent = item.time;

                        radioWrapper.appendChild(radioInput);
                        radioWrapper.appendChild(radioLabel);
                        horariosContainer.appendChild(radioWrapper);
                    });
                })
                .catch(err => {
                    horariosContainer.innerHTML = `<p class="text-danger">Erro ao carregar horários. Tente novamente mais tarde.</p>`;
                    console.error(err);
                });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const toastElList = [].slice.call(document.querySelectorAll('.toast'));
            toastElList.forEach(function(toastEl) {
                const toast = new bootstrap.Toast(toastEl);
                toast.show();

                setTimeout(() => {
                    toast.dispose();
                }, 5000);
            });
        });

        document.querySelector('form').addEventListener('submit', function (event) {
        const horarioSelecionado = document.querySelector('input[name="hora"]:checked');

        if (!horarioSelecionado) {
            event.preventDefault(); // Impede o envio do formulário
            event.stopPropagation(); // Impede a propagação do evento
            alert('Por favor, selecione um horário disponível.');
            return false;
        }

        if (this.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }

        this.classList.add('was-validated');
    });

    </script>
</body>

</html>
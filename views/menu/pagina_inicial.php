<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel com Gráfico Dinâmico</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../assets/img/icone.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container ">
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

        <!-- Gráfico de Barras -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Agendamentos Mensais</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart" style="height: 400px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para o Gráfico com Atualização Automática -->
    <script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
                datasets: [{
                    label: 'Agendamentos',
                    data: [15, 25, 30, 20, 40, 35],
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            }
        });

        // Função para gerar novos dados aleatórios
        function generateRandomData() {
            return Array.from({ length: 6 }, () => Math.floor(Math.random() * 50) + 10);
        }

        // Atualizar o gráfico a cada 3 segundos
        setInterval(() => {
            barChart.data.datasets[0].data = generateRandomData(); // Gera novos dados aleatórios
            barChart.update(); // Atualiza o gráfico
        }, 3000);
    </script>
</body>
</html>

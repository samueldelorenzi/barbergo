<?php
    session_start();
    if (!isset($_SESSION['id_cliente'])) {
        header("Location: login.php");
        exit();
    }

    // Conectar ao banco de dados
    $conn = new mysqli('localhost', 'root', 'root', 'barbergo');
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $userEmail = $_SESSION['usuario_email']; // Obtém o email do usuário da sessão

    // Consulta para buscar os agendamentos do usuário
    // Aqui estamos realizando o JOIN e usando a variável correta
    $query = "SELECT agendamento.*, cliente.email 
              FROM agendamento 
              JOIN cliente ON agendamento.id_cliente= cliente.id 
              WHERE cliente.email = '$userEmail'";  // Alterei para usar $userEmail

    $result = $conn->query($query);

    // Cabeçalho da página
    echo '<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Meus Agendamentos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <h3>Meus Agendamentos</h3>';

    if ($result->num_rows > 0) {
        echo '<table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Tipo</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>';

        // Exibindo os agendamentos
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['data'] . '</td>
                    <td>' . $row['hora'] . '</td>
                    <td>' . $row['tipo'] . '</td>
                    <td>' . $row['status'] . '</td>
                    <td>
                        <a href="ver_agendamento.php?id=' . $row['id'] . '" class="btn btn-info btn-sm">Ver</a>
                        <a href="editar_agendamento.php?id=' . $row['id'] . '" class="btn btn-warning btn-sm">Editar</a>
                        <a href="excluir_agendamento.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Tem certeza que deseja excluir?\')">Excluir</a>
                    </td>
                  </tr>';
        }

        echo '</tbody></table>';
    } else {
        echo '<p>Você ainda não tem agendamentos.</p>';
    }

    echo '</div>';

    $conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

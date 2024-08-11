<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Gestão Financeira</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>CRUD GESTÃO FINANCEIRA</h1>
        </header>
        <nav>
            <button onclick="window.location.href='../CREATE/create.html'">Novo Item</button>
            <button onclick="window.location.href='../UPDATE/update.html'">Editar</button>
            <button onclick="window.location.href='../READ/read.html'">Buscar</button>
            <button onclick="window.location.href='../DELETE/delete.html'">Deletar</button>
        </nav>
        <section class= "table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Valor</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require '../db_connect.php';

                    $sql = "SELECT * FROM valores";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $data_formatada = date('Y-m-d' , strtotime($row["data_criacao"]));
                            echo "<tr>
                                    <td>" . $row["id"] . "</td>
                                    <td>" . $row["valor"] . "</td>
                                    <td>" . $data_formatada . "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Nenhum registro encontrado</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
<?php
require '../db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "SELECT * FROM valores WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='container'>
                <header>
                    <h1>Resultado da Busca</h1>
                </header>
                <div class='table-container'>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Valor</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>";
        while($row = $result->fetch_assoc()) {
            $data_formatada = date('Y-m-d', strtotime($row["data_criacao"]));
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["valor"] . "</td>
                    <td>" . $data_formatada . "</td>
                </tr>";
        }
        echo "</tbody>
            </table>
            </div>
            </div>";
    } else {
        echo "<div class='container'>
                <header>
                    <h1>Resultado da Busca</h1>
                </header>
                <div class='message'>Nenhum registro encontrado para o ID: $id</div>
            </div>";
    }

    $conn->close();
} else {
    echo "Por favor, envie um ID válido para buscar.";
}
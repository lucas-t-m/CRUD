<?php
require '../db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valor = $_POST['valor'];
    $data_criacao = $_POST['data_criacao'];

    $sql = "INSERT INTO valores (valor, data_criacao) VALUES ('$valor', '$data_criacao')";
    if ($conn->query($sql) === TRUE) {
        $message = "Novo registro criado com sucesso";
    } else {
        $message = "Erro: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();

    header("Location: ../HTML/index.php?message=" . urlencode($message));

    exit();
}
?>
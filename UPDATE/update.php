<?php
require '../db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $valor = $_POST['valor'];
    $data_criacao = $_POST['data'];

    $sql = "UPDATE valores SET valor='$valor', data_criacao='$data_criacao' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso";
    } else {
        echo "Erro ao atualizar o registro: " . $conn->error;
    }

    $conn->close();
    
    header("Location: ../HTML/index.php?message=" . urlencode($message));

    exit();
}
?>
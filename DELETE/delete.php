<?php
require '../db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM valores WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro deletado com sucesso";
    } else {
        echo "Erro ao deletar o registro: " . $conn->error;
    }

    $conn->close();

    header("Location: delete.html?message=" . urlencode($message));
    exit();
}
?>
<?php
include('includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $estado = $_POST['estado'];

    $stmt = $conn->prepare("UPDATE reservas SET estado = ? WHERE id = ?");
    $stmt->bind_param("si", $estado, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: reservas.php");
    exit;
}
?>

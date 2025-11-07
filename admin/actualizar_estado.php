<?php
include("../includes/db.php");
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

$id = $_POST['id'];
$estado = $_POST['estado'];

$conexion->query("UPDATE reservas SET estado='$estado' WHERE id=$id");
header("Location: reservas.php");
exit;
?>

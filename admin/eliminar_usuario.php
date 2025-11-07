<?php
include("../includes/db.php");
session_start();
if ($_SESSION['rol'] != 'admin') {
    header("Location: ../login.php");
    exit;
}
$id = $_GET['id'];
$conexion->query("DELETE FROM usuarios WHERE id=$id");
header("Location: usuarios.php");
?>
<?php include 'includes/footer.php'; ?>

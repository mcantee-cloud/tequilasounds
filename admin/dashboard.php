<?php
include("../includes/db.php");
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: ../login.php");
    exit;
}
?>
<link rel="stylesheet" href="../css/estilo.css">
<?php include("../includes/header.php"); ?>

<h2 class="admin-title">Panel de Administración</h2>
<div class="admin-links">
    <a href="usuarios.php">Administrar Usuarios</a>
    <a href="reservas.php">Ver Reservas</a>
</div>


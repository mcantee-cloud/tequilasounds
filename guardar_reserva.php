<?php
session_start();
require_once(__DIR__ . '/includes/db.php'); // incluye tu conexión mysqli

// Recibir datos del formulario
$producto = $_POST['producto'] ?? '';
$tipo_evento = $_POST['tipo_evento'] ?? '';
$fecha = $_POST['fecha'] ?? '';
$hora = $_POST['hora'] ?? '';
$contacto = $_POST['contacto'] ?? '';
$celular = $_POST['celular'] ?? '';

// Validar campos requeridos
if (empty($producto) || empty($tipo_evento) || empty($fecha) || empty($hora) || empty($contacto) || empty($celular)) {
    die("Faltan datos obligatorios.");
}

// Preparar y ejecutar el INSERT usando MySQLi
$stmt = $conexion->prepare("INSERT INTO reservas (servicio, tipo_evento, dia, hora, contacto, celular, estado) VALUES (?, ?, ?, ?, ?, ?, 'pendiente')");
$stmt->bind_param("ssssss", $producto, $tipo_evento, $fecha, $hora, $contacto, $celular);

if ($stmt->execute()) {
    echo "<script>alert('✅ Reserva guardada correctamente.'); window.location.href='reserva.php';</script>";
} else {
    echo "Error al guardar la reserva: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>

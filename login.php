<?php
session_start();
include("includes/db.php");

$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo']);
    $password = trim($_POST['password']);

    // Evita inyección SQL
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE correo = ? AND password = ?");
    $stmt->bind_param("ss", $correo, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        // Guardar sesión
        $_SESSION['correo'] = $user['correo'];
        $_SESSION['rol'] = $user['rol'];
        $_SESSION['nombre'] = $user['nombre']; // 👈 agrega esta línea

        // Redirigir según rol
        if ($user['rol'] === 'admin') {
            header("Location: /tequilasounds/admin/dashboard.php");
        } else {
            header("Location: /tequilasounds/index.php");
        }
        exit;
    } else {
        $msg = "❌ Credenciales incorrectas";
    }
}
?>

<?php include("includes/header.php"); ?>
<link rel="stylesheet" href="/tequilasounds/css/estilo.css">

<div class="form-container">
    <h2>Iniciar Sesión</h2>
    <form method="POST">
        <input type="email" name="correo" placeholder="Correo" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Ingresar</button>
    </form>
    <p class="msg"><?= $msg ?></p>
</div>

<?php include 'includes/footer.php'; ?>

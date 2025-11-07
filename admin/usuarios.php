<?php
include("../includes/db.php");
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];
    $conexion->query("INSERT INTO usuarios(nombre, correo, password, rol)
                      VALUES('$nombre', '$correo', '$password', '$rol')");
}

$usuarios = $conexion->query("SELECT * FROM usuarios");
?>
<link rel="stylesheet" href="../css/estilo.css">
<?php include("../includes/header.php"); ?>

<div class="form-container">
    <h2>Agregar Usuario</h2>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="email" name="correo" placeholder="Correo" required>
        <input type="text" name="password" placeholder="Contraseña" required>
        <select name="rol">
            <option value="cliente">Cliente</option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit">Agregar</button>
    </form>
</div>

<h3 style="text-align:center;">Lista de Usuarios</h3>
<table border="1" align="center" cellpadding="10">
    <tr style="background-color: #7a00b3; color:white;">
        <th>ID</th><th>Nombre</th><th>Correo</th><th>Rol</th><th>Acción</th>
    </tr>
    <?php while($u = $usuarios->fetch_assoc()): ?>
    <tr>
        <td><?= $u['id'] ?></td>
        <td><?= $u['nombre'] ?></td>
        <td><?= $u['correo'] ?></td>
        <td><?= $u['rol'] ?></td>
        <td><a href="eliminar_usuario.php?id=<?= $u['id'] ?>" style="color:red;">Eliminar</a></td>
    </tr>
    <?php endwhile; ?>
</table>
<?php include '../includes/footer.php'; ?>


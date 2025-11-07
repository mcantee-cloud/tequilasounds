<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
    <div class="logo">
        <img src="/tequilasounds/img/logo.jpg" alt="Tequila Sounds" class="logo">
        <h1>Tequila Sounds</h1>
    </div>
    <nav>
        <a href="/tequilasounds/index.php">Inicio</a>
        <a href="/tequilasounds/reserva.php">Reservar</a>
        <a href="https://www.instagram.com" target="_blank">Instagram</a>
        <a href="https://www.facebook.com" target="_blank">Facebook</a>

        <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin'): ?>
            <a href="/tequilasounds/admin/dashboard.php">Admin</a>
        <?php endif; ?>

        <?php if (isset($_SESSION['correo'])): ?>
            <span class="usuario-logeado">👤 <?= htmlspecialchars($_SESSION['nombre']); ?></span>
            <a href="/tequilasounds/logout.php">Salir</a>
        <?php else: ?>
            <a href="/tequilasounds/login.php">Login</a>
        <?php endif; ?>
    </nav>
</header>

<style>

.usuario-logeado {
    color: #00ff66;
    font-weight: bold;
    margin-right: 12px;
}
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #111;
    color: white;
}
nav a {
    color: white;
    text-decoration: none;
    margin-left: 15px;
    transition: color 0.3s;
}
nav a:hover {
    color: #00ff66;
}
.logo img {
    width: 60px;
    border-radius: 50%;
    vertical-align: middle;
}
</style>

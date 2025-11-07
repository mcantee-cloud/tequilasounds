<?php
// Inicia la sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Elimina todas las variables de sesión
session_unset();

// Destruye completamente la sesión
session_destroy();

// Redirige al index principal del sitio, fuera del directorio admin
header("Location: /tequilasounds/index.php");
exit;
?>

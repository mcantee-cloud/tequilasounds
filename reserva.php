<?php
session_start();
//print_r($_SESSION);
?>


<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="/tequilasounds/css/estilo.css">

<div class="reserva-container">
    <h2>Reserva tu Servicio</h2>
    <form action="guardar_reserva.php" method="POST" id="formReserva" class="form-reserva">

        <label for="producto">Servicio:</label>
        <select name="producto" id="producto" required>
            <option value="">Seleccione un servicio</option>
            <option value="Renta de audio">Renta de audio</option>
            <option value="Cantante solista">Cantante solista</option>
            <option value="DJ">DJ</option>
        </select>

        <label for="tipo_evento">Tipo de Evento:</label>
        <input type="text" name="tipo_evento" id="tipo_evento" placeholder="Ejemplo: Boda, Fiesta, Corporativo..." required>

        <label for="fecha">Fecha del Evento:</label>
        <input type="date" name="fecha" id="fecha" required>

        <label for="hora">Hora del Evento:</label>
        <input type="time" name="hora" id="hora" required>

        <label for="contacto">Nombre de Contacto:</label>
        <input type="text" name="contacto" id="contacto" required>

        <label for="celular">Celular:</label>
        <input type="text" name="celular" id="celular" pattern="[0-9]{8,15}" placeholder="Solo números" required>

        <button type="submit" class="btn-reservar">Reservar</button>
    </form>
</div>

<script>
// --- Validación en el cliente ---
document.getElementById("formReserva").addEventListener("submit", function(e) {
    const fecha = document.getElementById("fecha").value;
    const hora = document.getElementById("hora").value;

    if (!fecha || !hora) return;

    const ahora = new Date();
    const seleccionada = new Date(`${fecha}T${hora}`);

    if (seleccionada < ahora) {
        e.preventDefault();
        alert("⚠️ No puedes seleccionar una fecha u hora pasada.");
    }
});
</script>


<?php include 'includes/footer.php'; ?>

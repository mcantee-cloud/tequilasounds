<?php
include("../includes/db.php");
session_start();
if ($_SESSION['rol'] != 'admin') {
    header("Location: ../login.php");
    exit;
}
$reservas = $conexion->query("SELECT * FROM reservas ORDER BY id DESC");
?>
<link rel="stylesheet" href="../css/estilo.css">
<?php include("../includes/header.php"); ?>

<h2 style="text-align:center;">Reservas Recibidas</h2>

<table border="1" align="center" cellpadding="10">
    <tr style="background-color: #7a00b3; color:white;">
        <th>ID</th>
        <th>Servicio</th>
        <th>Día</th>
        <th>Hora</th>
        <th>Tipo Evento</th>
        <th>Contacto</th>
        <th>Celular</th>
        <th>Estado</th>
        <th>Actualizar</th>
    </tr>

    <?php while($r = $reservas->fetch_assoc()): ?>
    <tr>
        <td><?= $r['id'] ?></td>
        <td><?= ucfirst($r['servicio']) ?></td>
        <td><?= $r['dia'] ?></td>
        <td><?= $r['hora'] ?></td>
        <td><?= $r['tipo_evento'] ?></td>
        <td><?= $r['contacto'] ?></td>
        <td><?= $r['celular'] ?></td>
        <td>
            <form method="POST" action="actualizar_estado.php">
                <input type="hidden" name="id" value="<?= $r['id'] ?>">
                <select name="estado" onchange="this.form.submit()">
                    <option value="pendiente" <?= $r['estado']=='pendiente'?'selected':'' ?>>Pendiente</option>
                    <option value="pagado" <?= $r['estado']=='pagado'?'selected':'' ?>>Pagado</option>
                    <option value="atendido" <?= $r['estado']=='atendido'?'selected':'' ?>>Atendido</option>
                </select>
            </form>
        </td>
        <td>
            <?php if ($r['estado'] == 'pendiente'): ?>
                <span style="color:orange;">🕒 En espera</span>
            <?php elseif ($r['estado'] == 'pagado'): ?>
                <span style="color:lime;">💲 Pagado</span>
            <?php else: ?>
                <span style="color:cyan;">✅ Atendido</span>
            <?php endif; ?>
        </td>
    </tr>


    <?php endwhile; ?>


</table>
<?php include '../includes/footer.php'; ?>

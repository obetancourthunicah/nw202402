<?php
session_start();
require_once 'vendor/autoload.php';

use Uch\Hotel\Reservaciones;

$reservaciones = Reservaciones::obtenerReservaciones();

if (isset($_POST["btnLimpiar"])) {
    Reservaciones::limpiarReservaciones();
    $reservaciones = Reservaciones::obtenerReservaciones();
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservaciones</title>
</head>

<body>
    <h1>Reservaciones Guardadas</h1>
    <table>
        <tr>
            <th>Código</th>
            <th>Nombre del Cliente</th>
            <th>Fecha de Entrada</th>
            <th>Fecha de Salida</th>
            <th>Días</th>
            <th>Número de Personas</th>
            <th>Incluye Desayuno</th>
            <th>Habitaciones</th>
            <th>Total</th>
        </tr>
        <?php foreach ($reservaciones as $reservacion) { ?>
            <tr>
                <td><?php echo $reservacion->getCodigo(); ?></td>
                <td><?php echo $reservacion->getNombreCliente(); ?></td>
                <td><?php echo $reservacion->getFechaEntrada()->format("Y-m-d"); ?></td>
                <td><?php echo $reservacion->getFechaSalida()->format("Y-m-d"); ?></td>
                <td><?php echo $reservacion->getDiasReserva(); ?></td>
                <td><?php echo $reservacion->getNumeroPersonas(); ?></td>
                <td><?php echo $reservacion->getIncluyeDesayuno() ? "Sí" : "No"; ?></td>
                <td>
                    <ul>
                        <?php foreach ($reservacion->getHabitaciones() as $habitacion) { ?>
                            <li><?php echo $habitacion->getCodigo() . " - " .  $habitacion->getTipo() . " " . $habitacion->getDescripcion(); ?></li>
                        <?php } ?>
                    </ul>
                </td>
                <td>
                    <?php echo $reservacion->getPrecioTotal(); ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <hr />
    <form action="reservaciones.php" method="post">
        <input type="submit" name="btnLimpiar" value="Limpiar Reservaciones">
    </form>
</body>

</html>
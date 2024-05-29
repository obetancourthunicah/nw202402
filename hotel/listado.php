<?php

require_once 'libreria.php';


$reservaciones = obtenerReservaciones();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservaciones</title>
</head>

<body>
    <h1>Reservaciones</h1>
    <a href="formulario.php">Nueva Reservación</a>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Tipo de Habitación</th>
                <th>Fecha de Entrada</th>
                <th>Fecha de Salida</th>
                <th>Número de Personas</th>
                <th>Incluye Desayuno</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $totalReservado = 0;
            $numeroReservas = 0;
            foreach ($reservaciones as $index => $reservacion) { ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo $reservacion['nombre']; ?></td>
                    <td><?php echo $reservacion['telefono']; ?></td>
                    <td><?php echo $reservacion['correo']; ?></td>
                    <td>
                        <?php echo $reservacion['tipoHabitacion']["nombre"]; ?><br />
                        <?php echo $reservacion['tipoHabitacion']["precio"]; ?><br />
                        <?php echo $reservacion['tipoHabitacion']["vista"]; ?><br />
                    </td>
                    <td><?php echo $reservacion['fechaEntrada']; ?></td>
                    <td><?php echo $reservacion['fechaSalida']; ?></td>
                    <td><?php echo $reservacion['numPersonas']; ?></td>
                    <td><?php echo $reservacion['incluyeDesayuno'] ? 'Si' : 'No'; ?></td>
                    <?php
                    $total = $reservacion['tipoHabitacion']["precio"] * $reservacion['numPersonas'];
                    $totalReservado += $total;
                    $numeroReservas++;
                    ?>
                    <td><?php echo $total; ?></td>
                </tr>
            <?php }; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="9">Total Reservado</td>
                <td><?php echo $totalReservado; ?></td>
            </tr>
            <tr>
                <td colspan="9">Número de Reservas</td>
                <td><?php echo $numeroReservas; ?></td>
            </tr>
    </table>

</body>

</html>
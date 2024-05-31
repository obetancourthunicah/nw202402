<?php
session_start();
require_once "vendor/autoload.php";

use Uch\Hotel\Reservaciones;
use Uch\Hotel\Reservacion;
use Uch\Hotel\CatalogoHabitaciones;

$habitaciones = CatalogoHabitaciones::getHabitacionesAssoc();

if (isset($_POST["btnReservar"])) {
    $reservacion = new Reservacion();
    $reservacion->setNombreCliente($_POST["nombreCliente"]);
    $reservacion->setFechaEntrada(new \DateTime($_POST["fechaEntrada"]));
    $reservacion->setFechaSalida(new \DateTime($_POST["fechaSalida"]));
    $reservacion->setNumeroPersonas(intval($_POST["numeroPersonas"]));
    $reservacion->addHabitacion(CatalogoHabitaciones::getHabitacionPorCodigo(intval($_POST["habitacion"])));
    $reservacion->setIncluyeDesayuno(isset($_POST["incluyeDesayuno"]));
    $reservacion->setCodigo(uniqid());
    Reservaciones::guardarReservacion($reservacion);
    header("Location: reservaciones.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Hotel</title>
</head>

<body>
    <h1>Reserva de Hotel</h1>
    <form action="index.php" method="post">

        <label for="nombreCliente">Nombre del Cliente:</label>
        <input type="text" name="nombreCliente" id="nombreCliente" required>
        <br>
        <label for="fechaEntrada">Fecha de Entrada:</label>
        <input type="date" name="fechaEntrada" id="fechaEntrada" required>
        <br>
        <label for="fechaSalida">Fecha de Salida:</label>
        <input type="date" name="fechaSalida" id="fechaSalida" required>
        <br>
        <label for="numeroPersonas">Número de Personas:</label>
        <select name="numeroPersonas" id="numeroPersonas" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
        <br>
        <label for="habitacion">Habitación:</label>
        <select name="habitacion" id="habitacion" required>
            <?php foreach ($habitaciones as $habitacion) { ?>
                <option value="<?php echo $habitacion["codigo"]; ?>">
                    <?php echo $habitacion["descripcion"] . " " . $habitacion["price"]; ?>
                </option>
            <?php } ?>
        </select>
        <br>
        <label for="incluyeDesayuno">Incluye Desayuno:</label>
        <input type="checkbox" name="incluyeDesayuno" id="incluyeDesayuno">
        <br>
        <input type="submit" value="Reservar" name="btnReservar">
    </form>
</body>

</html>
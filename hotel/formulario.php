<?php

require_once 'libreria.php';

$nombre = '';
$telefono = '';
$correo = '';
$tipoHabitacion = 1;
$fechaEntrada = date('Y-m-d');
$fechaSalida = date('Y-m-d');
$numPersonas = 1;
$incluyeDesayuno = false;


if (isset($_POST["btnReservar"])) {
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $tipoHabitacion = $_POST["tipoHabitacion"];
    $fechaEntrada = $_POST["fechaEntrada"];
    $fechaSalida = $_POST["fechaSalida"];
    $numPersonas = $_POST["numPersonas"];
    $incluyeDesayuno = isset($_POST["incluyeDesayuno"]);

    $reservacion = crearReservacion($nombre, $telefono, $correo, $tipoHabitacion, $fechaEntrada, $fechaSalida, $numPersonas, $incluyeDesayuno);

    echo '<script> alert("Reservación Existosa"); window.location.assign("listado.php"); </script>';
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservación de Habitacion de Hotel</title>
</head>

<body>
    <h1>Reservación de Habitacion de Hotel</h1>
    <form action="formulario.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>" placeholder="Nombre Completo" />
        <br />
        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" id="telefono" value="<?php echo $telefono; ?>" placeholder="Telefono" />
        <br />
        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" value="<?php echo $correo; ?>" placeholder="Correo Electrónico" />
        <br />
        <label for="tipoHabitacion">Tipo de Habitación:</label>
        <?php echo generarSelectFromArray(obtenerTiposDeHabitacion(), 'id', 'nombre', 'tipoHabitacion', $tipoHabitacion); ?>
        <br />
        <label for="fechaEntrada">Fecha de Entrada:</label>
        <input type="date" name="fechaEntrada" id="fechaEntrada" value="<?php echo $fechaEntrada; ?>" />
        <br />
        <label for="fechaSalida">Fecha de Salida:</label>
        <input type="date" name="fechaSalida" id="fechaSalida" value="<?php echo $fechaSalida; ?>" />
        <br />
        <label for="numPersonas">Número de Personas:</label>
        <input type="number" name="numPersonas" id="numPersonas" value="<?php echo $numPersonas; ?>" />
        <br />
        <label for="incluyeDesayuno">Incluye Desayuno:</label>
        <input type="checkbox" name="incluyeDesayuno" id="incluyeDesayuno" <?php echo ($incluyeDesayuno ? 'checked' : '') ?> />
        <br />
        <button type="submit" name="btnReservar">Reservar</button>
    </form>
    <!-- 
/**
    nombre
    telefono
    correo
    tipoHabitacion
    fechaEntrada
    fechaSalida
    numPersonas
    incluyeDesayuno
 */

-->
</body>

</html>
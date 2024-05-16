<?php
$nombre = "Juan";

if (isset($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intro a PHP</title>
</head>

<body>
    <h1>Introducción a PHP</h1>
    <p> Hola <?php echo $nombre; ?> </p>
    <form action="intro.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" placeholder="Escribe tu nombre">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>
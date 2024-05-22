<?php
/*
include
include_once
require
reqiure_once
*/
require_once 'generadorLib.php';

$numeroCuenta = "";
$txtSubstituciones = "";
$invertido = false;
$resultado = "";

if (isset($_POST["btnGenerar"])) {
    $numeroCuenta = $_POST["numeroCuenta"];
    $txtSubstituciones = $_POST["txtSubstituciones"];
    if (isset($_POST["invertido"])) {
        $invertido = $_POST["invertido"] == "1";
    }
    $resultado = generarCuenta(
        $numeroCuenta,
        $txtSubstituciones,
        $invertido
    );
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Cuenta</title>
</head>

<body>
    <h1>Generado de Cuenta</h1>
    <form action="generadorDeCuenta.php" method="post">
        <label>Número de Cuenta</label>
        <input type="text" name="numeroCuenta" required placeholder="Número de cuenta sin guiones ni espacios" value="<?php echo $numeroCuenta; ?>" />
        <br />
        <label>Substituciones</label>
        <textarea name="txtSubstituciones" placeholder="Escriba la sustituciones con flecha gorda separados por coma ej. 3=>E, 4=>A"><?php echo $txtSubstituciones; ?></textarea>
        <br />
        <label>Invertido</label>
        <input type="checkbox" name="invertido" value="1" <?php echo $invertido ? 'checked' : ''; ?> />
        <br />
        <input type="submit" name="btnGenerar" value="Generar" />
    </form>
    <hr />
    <?php if ($resultado != "") { ?>
        <h2>Resultado</h2>
        <p><?php echo $resultado; ?></p>
    <?php } ?>
</body>

</html>
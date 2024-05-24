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

$cuentasHistoricas = obtenerCuentasGeneradas();

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
    <hr />
    <?php if (count($cuentasHistoricas) > 0) { ?>
        <h2>Cuentas Generadas</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Número de Cuenta</th>
                    <th>Substituciones</th>
                    <th>Invertido</th>
                    <th>Resultado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cuentasHistoricas as $cuenta) { ?>
                    <tr>
                        <td><?php echo $cuenta["fecha"]; ?></td>
                        <td><?php echo $cuenta["numeroCuenta"]; ?></td>
                        <td><?php echo $cuenta["txtSubstituciones"]; ?></td>
                        <td><?php echo $cuenta["invertido"] ? "Si" : "No"; ?></td>
                        <td><?php echo $cuenta["resultado"]; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</body>

</html>
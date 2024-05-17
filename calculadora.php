<?php
$numero1 = 0;
$numero2 = 0;
$resultado = 0;
$operacion = "";

if (isset($_POST["btnEnviar"])) {

    // print_r($_POST);
    // die();
    $operacion = $_POST["btnEnviar"];

    $numero1 = floatval($_POST["numero1"]);
    $numero2 = floatval($_POST["numero2"]);

    switch ($operacion) {
        case "Sumar":
            $resultado = $numero1 + $numero2;
            break;
        case "Restar":
            $resultado = $numero1 - $numero2;
            break;
        case "Potencia":
            $resultado = $numero1;
            for ($i = 1; $i < $numero2; $i++) {
                $resultado = $resultado * $numero1;
            }
        case "Factorial":
            $resultado = 1;
            for ($i = 1; $i <= $numero1; $i++) {
                $resultado = $resultado * $i;
            }
            break;
        case "Dividir":
            $resultado = ($numero2 !== 0.0) ? ($numero1 / $numero2) : "No se puede dividir entre 0";
            break;
    }
}

/*
 ==   evalua el valor comun  1 == "1"  verdadero
 ===  evalua el valor y el tipo de dato  1 === "1" falso

 !=   diferente de por valor 1 != "1" falso
 !==  diferente de por valor y tipo de dato 1 !== "1" verdadero

*/

/*
$control = 1000;
while ( $control < 100) {
    //...expresiones
    $control++;
}
$control = 1000;
do {
    //expresiones
    $control++;
} while ($control < 100);
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>

<body>
    <h1>Calculadora</h1>
    <hr />
    <form action="calculadora.php" method="post">
        <label for="numero1">Número 1:</label>
        <input type="number" name="numero1" id="numero1" placeholder="Escribe un número" value="<?php echo $numero1; ?>">
        <br />
        <label for="numero2">Número 2:</label>
        <input type="number" name="numero2" id="numero2" placeholder="Escribe un número" value="<?php echo $numero2; ?>">
        <br />
        <input name="btnEnviar" type="submit" value="Sumar">
        <input name="btnEnviar" type="submit" value="Restar">
        <input name="btnEnviar" type="submit" value="Multiplicar">
        <input name="btnEnviar" type="submit" value="Dividir">
        <input name="btnEnviar" type="submit" value="Potencia">
        <input name="btnEnviar" type="submit" value="Factorial">
    </form>
    <?php
    if ($operacion !== "") {
        echo "<h2>El resultado de la operación: " . $operacion . " es: " . $resultado . " </h2> ";
    }
    ?>
</body>

</html>
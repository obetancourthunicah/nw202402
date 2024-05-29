<?php
$txtTexto = "";
$palabras = [];
$frecuenciaPalabras = [];
if (isset($_POST["btnContar"])) {
    $txtTexto = $_POST["txtTexto"] . " ";
    $txtTextoAProcesar = strtolower($txtTexto);
    $txtTextoAProcesar = str_replace([":", ";", "!", "¡", "?", "¿", "(", ")", "{", "}", "[", "]"], "", $txtTextoAProcesar);
    $txtTextoAProcesar = str_replace([". ", ", "], " ", $txtTextoAProcesar);
    $txtTextoAProcesar = preg_replace('/\s{2,}/', ' ', $txtTextoAProcesar);
    $txtTextoAProcesar = str_replace(["\n", "\r", "\t"], " ", $txtTextoAProcesar);
    $palabras = explode(" ", $txtTextoAProcesar);

    foreach ($palabras as $palabra) {
        if (array_key_exists($palabra, $frecuenciaPalabras)) {
            $frecuenciaPalabras[$palabra]++;
        } else {
            $frecuenciaPalabras[$palabra] = 1;
        }
    }

    arsort($frecuenciaPalabras);
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador Palabras</title>
</head>

<body>
    <h1>Contador de Palabras</h1>
    <form action="contadorPalabras.php" method="post">
        <label>Texto</label><br />
        <textarea name="txtTexto" placeholder="Escriba el texto a contar palabras"></textarea>
        <br />
        <input type="submit" name="btnContar" value="Contar" />
    </form>
    <hr />
    <?php
    if (count($frecuenciaPalabras) > 0) {
        foreach ($frecuenciaPalabras as $palabra => $freq) {
            echo $palabra . ' (' . $freq . ')<br/>';
        }
    }
    ?>
</body>

</html>
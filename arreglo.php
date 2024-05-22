<?php

$arrNombres = [
    "Orlando",
    "Miguel",
    "Astrid",
    "Isabel",
    "Nilba",
    "Yulissa",
    "Carlos",
    "Gabriel"
];

$arrNombreAssoc = [
    "0801198412349" => "Orlando",
    "0801198412348" => "Miguel",
    "0801198612347" => "Astrid",
    "0801198812346" => "Isabel",
    "0801198312345" => "Nilba",
    "0801198212344" => "Yulissa",
];

$arrNombreAssoc[] = "Carlos";
$arrNombreAssoc[] = "Gabriel";

$arrNombreAssoc["0801198413784"] = "Fulanito";

$arrNombreAssoc[] = "Lya";

$arrNombreAssoc[10] = "Megan";

$arrNombreAssoc[] = "Camila";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arreglos en PHP</title>
</head>

<body>
    <div style="display:flex;width:100%;justify-content:space-between;">
        <div>
            <?php
            echo "<h1>Lista de nombres</h1>";
            foreach ($arrNombres as $nombre) {
                echo "<p>$nombre</p>";
            }

            echo "<h1>Lista de Nombre Asociativo</h1>";
            foreach ($arrNombreAssoc as $nombre) {
                echo "<p>$nombre</p>";
            }
            ?>
        </div>
        <div>
            <?php
            echo "<h1>Lista de nombres con Llave</h1>";
            foreach ($arrNombres as $llave => $nombre) {
                echo "<p>$llave: $nombre</p>";
            }

            echo "<h1>Lista de Nombre Asociativo</h1>";
            foreach ($arrNombreAssoc as $llave => $nombre) {
                echo "<p>$llave : $nombre</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>
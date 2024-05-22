<?php
/*
--------------------------------------
nombre | telefono | correo | carrera |
--------------------------------------
Orlando | 0999999999 | obetancourthunicah@gmail.com | Ingenieria en Sistemas
Miguel | 0999999999 | miguel@testemail.com | Psiocologia
Astrid | 0999999999 | astrid@testemail.com | Medicina y Cirgía
Isabel | 0999999999 | isabel@testemail.com | Derecho

*/

$contactos = [
    [
        "nombre" => "Orlando",
        "telefono" => "0999999999",
        "correo" => "obetancourthunicah@gmail.com",
        "carrera" => "Ingenieria en Sistemas"
    ],
    [
        "nombre" => "Miguel",
        "telefono" => "0999999999",
        "correo" => "miguel@testemail.com",
        "carrera" => "Psiocologia"
    ],
    [
        "nombre" => "Astrid",
        "telefono" => "0999999999",
        "correo" => "astrid@testemail.com",
        "carrera" => "Medicina y Cirgía"
    ],
    [
        "nombre" => "Isabel",
        "telefono" => "0999999999",
        "correo" => "isabel@testemail.com",
        "carrera" => "Derecho"
    ]
];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contactos</title>
</head>

<body>
    <h1> Lista de Contactos </h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Carrera</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactos as $contacto) { ?>
                <tr>
                    <td><?php echo $contacto["nombre"]; ?></td>
                    <td><?php echo $contacto["telefono"]; ?></td>
                    <td><?php echo $contacto["correo"]; ?></td>
                    <td><?php echo $contacto["carrera"]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
<?php

$tipoHabitaciones = [
    [
        "id" => 1,
        "nombre" => "Sencilla",
        "descripcion" => "Habitación sencilla con cama individual",
        "precio" => 500.00
    ],
    [
        "id" => 2,
        "nombre" => "Doble",
        "descripcion" => "Habitación doble con cama matrimonial",
        "precio" => 800.00
    ],
    [
        "id" => 3,
        "nombre" => "Suite",
        "descripcion" => "Habitación suite con cama king size",
        "precio" => 1200.00
    ]
];


function generarSelect($arreglo, $name, $textField, $valueField, $selectedValue = null)
{
    $select = "<select name='$name'>";
    foreach ($arreglo as $elemento) {
        $selected = "";
        if ($selectedValue != null && $elemento[$valueField] == $selectedValue) {
            $selected = "selected";
        }
        $select .= "<option value='" . $elemento[$valueField] . "' $selected>" . $elemento[$textField] . "</option>";
    }
    $select .= "</select>";
    return $select;
}

echo generarSelect($tipoHabitaciones, "cmbTipoHabitacion", "nombre", "id", 3);

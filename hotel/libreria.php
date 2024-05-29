<?php

session_start();

function obtenerTiposDeHabitacion()
{
    return [
        [
            "id" => 1,
            "nombre" => 'Sencilla',
            "precio" => 1000,
            "vista" => 'Vista al mar'
        ],
        [
            "id" => 2,
            "nombre" => 'Sencilla',
            "precio" => 900,
            "vista" => 'Ninguna'
        ],
        [
            "id" => 3,
            "nombre" => 'Doble',
            "precio" => 1800,
            "vista" => 'Vista al mar'
        ],
        [
            "id" => 4,
            "nombre" => 'Doble',
            "precio" => 1500,
            "vista" => 'Ninguna'
        ]
    ];
}

function obtenerTipoDeHabitacionPorId($id)
{
    $tiposDeHabitacion = obtenerTiposDeHabitacion();
    foreach ($tiposDeHabitacion as $tipoDeHabitacion) {
        if ($tipoDeHabitacion['id'] == $id) {
            return $tipoDeHabitacion;
        }
    }
    return null;
}

function generarSelectFromArray($arreglo, $valueField, $textField, $fieldName, $selectedValue = null)
{
    $htmlBuffer = [];
    $htmlBuffer[] = '<select name="' . $fieldName . '">';
    foreach ($arreglo as $option) {
        $selected = '';
        if ($selectedValue != null && $selectedValue == $option[$valueField]) {
            $selected = ' selected';
        }
        $htmlBuffer[] = '<option value="' . $option[$valueField] . '"' . $selected . '>' . $option[$textField] . '</option>';
    }
    $htmlBuffer[] = '</select>';
    return implode('', $htmlBuffer);
}

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

function obtenerReservaciones()
{
    if (isset($_SESSION['reservaciones'])) {
        return $_SESSION['reservaciones'];
    }
    return [];
}
function guardarReservacion($reservacion)
{
    $reservaciones = obtenerReservaciones();
    $reservaciones[] = $reservacion;
    $_SESSION['reservaciones'] = $reservaciones;
}

function crearReservacion(
    string $nombreCliente,
    string $telefonoCliente,
    string $correoCliente,
    int $tipoHabitacion,
    string $fechaEntrada,
    string $fechaSalida,
    int $numPersonas,
    bool $incluyeDesayuno
) {
    $reservacion = [
        'nombre' => $nombreCliente,
        'telefono' => $telefonoCliente,
        'correo' => $correoCliente,
        'tipoHabitacion' => obtenerTipoDeHabitacionPorId($tipoHabitacion),
        'fechaEntrada' => $fechaEntrada,
        'fechaSalida' => $fechaSalida,
        'numPersonas' => $numPersonas,
        'incluyeDesayuno' => $incluyeDesayuno
    ];
    guardarReservacion($reservacion);
}

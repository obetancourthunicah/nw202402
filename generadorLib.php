<?php
session_start();

$templateCuentaGenerada = [
    "fecha" => date("Y-m-d H:i:s"),
    "numeroCuenta" => "",
    "txtSubstituciones" => "",
    "invertido" => false,
    "resultado" => "",
];

function generarCuenta(
    string $numeroCuenta,
    string $strSubstituciones,
    bool $esInvertido
): string {
    $substituciones = [];
    $substituciones = explode(",", $strSubstituciones);
    $cuentaGenerada = $numeroCuenta;
    foreach ($substituciones as $substitucion) {
        $substitucion = explode("=>", trim($substitucion));
        $cuentaGenerada = str_replace($substitucion[0], strtoupper($substitucion[1]), $cuentaGenerada);
    }
    if ($esInvertido) {
        $cuentaGenerada = strrev($cuentaGenerada);
    }
    $estructuraCuenta = generarEstructuraCuenta(
        $numeroCuenta,
        $strSubstituciones,
        $esInvertido,
        $cuentaGenerada
    );
    guardarCuentaGenerada($estructuraCuenta);
    return $cuentaGenerada;
}

function guardarCuentaGenerada(array $registroCuentaGenerada): void
{
    if (!isset($_SESSION["cuentasGeneradas"])) {
        $_SESSION["cuentasGeneradas"] = [];
    }
    $_SESSION["cuentasGeneradas"][] = $registroCuentaGenerada;
    // array_push($_SESSION["cuentasGeneradas"], $registroCuentaGenerada);
}

function obtenerCuentasGeneradas(): array
{
    if (!isset($_SESSION["cuentasGeneradas"])) {
        $_SESSION["cuentasGeneradas"] = [];
    }
    return $_SESSION["cuentasGeneradas"];
}

function generarEstructuraCuenta(
    string $numeroCuenta,
    string $strSubstituciones,
    bool $esInvertido,
    string $resultado
): array {
    global $templateCuentaGenerada;
    $nuevoRegistroDeCuenta = $templateCuentaGenerada;
    $nuevoRegistroDeCuenta["fecha"] = date("Y-m-d H:i:s");
    $nuevoRegistroDeCuenta["numeroCuenta"] = $numeroCuenta;
    $nuevoRegistroDeCuenta["txtSubstituciones"] = $strSubstituciones;
    $nuevoRegistroDeCuenta["invertido"] = $esInvertido;
    $nuevoRegistroDeCuenta["resultado"] = $resultado;
    return $nuevoRegistroDeCuenta;
}

// .3=>E..,.4=>A.
// .3=>E..    .4=>A.
// 3=>E     4=>A

// asort - ordena por valor
// rasort - ordena por valor en reversa

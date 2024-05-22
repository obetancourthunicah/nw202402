<?php

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
    return $cuentaGenerada;
}

//  .3=>E..,.4=>A.
// .3=>E..    .4=>A.
// 3=>E     4=>A

// asort - ordena por valor
// rasort - ordena por valor en reversa

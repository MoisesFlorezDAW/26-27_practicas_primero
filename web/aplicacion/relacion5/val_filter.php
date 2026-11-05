<?php

namespace VAL_FILTER;

function validaEntero(mixed &$var, int $min, int $max, int $defecto): bool
{
    $resultado = filter_var(
        $var,
        FILTER_VALIDATE_INT,
        [
            'options' => [
                'min_range' => $min,
                'max_range' => $max
            ]
        ]
    );

    if ($resultado !== false) {
        $var = $resultado;
        return true;
    }

    $var = $defecto;
    return false;
}

function validaReal(float &$var, float $min, float $max, float $defecto): bool
{
    $resultado = filter_var(
        $var,
        FILTER_VALIDATE_FLOAT,
        [
            'options' => [
                'min_range' => $min,
                'max_range' => $max
            ]
        ]
    );
    $var = FILTER_SANITIZE_NUMBER_FLOAT;
    if ($resultado !== false) {
        $var = $resultado;
        return true;
    }

    $var = $defecto;
    return false;
}

function validaEmail(string &$var, string $defecto){
    $resultado = filter_var(
        $var, FILTER_VALIDATE_EMAIL
    );

    if($resultado!=false){
        $var = $resultado;
        $var = FILTER_SANITIZE_EMAIL;
        return true;
    }
    $var = $defecto;
    return false;
}
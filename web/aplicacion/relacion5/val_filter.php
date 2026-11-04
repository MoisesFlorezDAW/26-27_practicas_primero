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
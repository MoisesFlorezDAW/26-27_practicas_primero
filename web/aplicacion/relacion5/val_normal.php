<?php
    namespace VAL_NORMAL;

function validaEntero(&$var, int $min, int $max, int $defecto): bool
{
    if (is_numeric($var) && (int)$var == $var) {
        $var = (int)$var;

        if ($var >= $min && $var <= $max) {
            return true;
        }
    }

    $var = $defecto;
    return false;
}

    function validaReal(float &$var, int $min, int $max, int $defecto): bool{
        if((!is_float($var)) || $var<$min && $var>$max){
            return false;
        }
        $var = $defecto;
        return true;
    }

    function validaFecha(string &$var, string $defecto): bool{
        $var = $defecto;
        return true;
    }

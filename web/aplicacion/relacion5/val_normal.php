<?php
    namespace VAL_NORMAL;

use DateTime;

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
    
    $d = DateTime::createFromFormat('d/m/Y', $var);
    
    if($d->format('d/m/Y')==$var){
        return true;
    }
    $var = $defecto;

    return false;
    }

    function validaHora(string &$var, string $defecto){
    $h = DateTime::createFromFormat('H:i:s', $var);

    if($h->format('H:i:s')==$var){
        return true;
    }
    $var = $defecto;

    return false;
    }

    function validaEmail(string &$var, int $longitud, string $defecto){

    }

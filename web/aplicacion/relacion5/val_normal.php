<?php
declare(strict_types=1);
namespace VAL_NORMAL;

function validaEntero(int &$var, int $min, int $max, int $defecto): bool {
    if ($var >= $min && $var <= $max) {
        return true;
    }
    $var = $defecto;
    return false;
}

function validaReal(float &$var, float $min, float $max, float $defecto): bool {
    if ($var >= $min && $var <= $max) {
        return true;
    }
    $var = $defecto;
    return false;
}

function validaFecha(string &$var, string $defecto): bool {
    $var = trim($var);
    if (preg_match('/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/', $var, $m)
        && checkdate((int)$m[2], (int)$m[1], (int)$m[3])) {
        $var = sprintf('%02d/%02d/%04d', $m[1], $m[2], $m[3]);
        return true;
    }
    $var = $defecto;
    return false;
}

function validaHora(string &$var, string $defecto): bool {
    $var = trim($var);
    if (preg_match('/^(\d{1,2}):(\d{1,2}):(\d{1,2})$/', $var, $m)
        && $m[1] <= 23 && $m[2] <= 59 && $m[3] <= 59) {
        $var = sprintf('%02d:%02d:%02d', $m[1], $m[2], $m[3]);
        return true;
    }
    $var = $defecto;
    return false;
}

function validaEmail(string &$var, string $defecto): bool {
    $var = trim($var);
    if (preg_match('/^[A-Za-z0-9._%+\-]+@[A-Za-z0-9\-]+(\.[A-Za-z0-9\-]+)*\.[A-Za-z]{2,}$/', $var)) {
        return true;
    }
    $var = $defecto;
    return false;
}

function validaCadena(string &$var, int $longitud, string $defecto): bool {
    $var = trim($var);
    if (mb_strlen($var) <= $longitud) {
        return true;
    }
    $var = $defecto;
    return false;
}

function validaExpresion(string &$var, string $expresion, string $defecto): bool {
    if (preg_match($expresion, $var) === 1) {
        return true;
    }
    $var = $defecto;
    return false;
}

function validaRango(mixed $var, array $posibles, int $tipo = 1): bool {
    if ($tipo === 1) {
        return in_array($var, $posibles, true);
    }
    if ($tipo === 2) {
        return (is_int($var) || is_string($var)) && array_key_exists($var, $posibles);
    }
    return false;
}
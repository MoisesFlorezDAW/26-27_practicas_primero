<?php

include_once(dirname(__FILE__) . "../../../cabecera.php");
$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion 5",
        "LINK" => "index.php"
    ],
    [
        "TEXTO" => "Prueba Librerias",
        "LINK" => "pruebaLibrerias.php"
    ]
];

require_once 'val_normal.php';
require_once 'val_filter.php';

//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion 5 - Primer Trimestre", $barraUbi);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
//vista
function cuerpo()
{
$edad = "25";
$edadError = "130";
/**
 * Validacion de entero en VAL_NORMAL
 */
echo "<p style='color: blue'>PRUEBA VAL_NORMAL (Saber si es un entero y esta dentro del rango)" . 
"<br>Valida si la edad es entera, y esta dentro de 0 a 120 años <br><p>" . PHP_EOL;
if(\VAL_NORMAL\validaEntero($edad, 0, 120, 18)){
    echo "Edad valida: " . $edad . "<br>" . PHP_EOL;
}else {
    echo "Edad incorrecta. Valor asignado: " . $edad . "<br>" . PHP_EOL; 
}

if(\VAL_NORMAL\validaEntero($edadError, 0, 120, 18)){
    echo "Edad valida: " . $edadError . "<br>" . PHP_EOL;
}else {
    echo "Edad incorrecta. (edad = 130) edad por defecto: " .$edadError. "<br>" . PHP_EOL; 
}
echo "<p style='color: blue'>PRUEBA VAL_FILTER<br><p>" . PHP_EOL;
if(!\VAL_FILTER\validaEntero($edadError, 0, 120, 18)){
    echo "Edad valida: " . $edadError . "<br>" . PHP_EOL;
}else{ echo "Edad incorrecta. (edad = 130) edad por defecto: " .$edadError. "<br>" . PHP_EOL;}

/**
 * Validacion de entero en VAL_FILTER
 */
if(\VAL_FILTER\validaEntero($edad, 0, 120, 18)){
    echo "Edad valida: " . $edad . "<br>" . PHP_EOL;
}else {
    echo "Edad incorrecta. Valor asignado: " . $edad . "<br>" . PHP_EOL;
}

/**
 * Validacion de real en VAL_NORMAL
 */
echo "<p style='color: blue'>PRUEBA VAL_NORMAL (Saber si es un entero y esta dentro del rango)" . 
"<br>Valida si la edad es entera, y esta dentro de 0 a 120 años <br><p>" . PHP_EOL;
}
<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
// Controlador

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera()
{}

function cuerpo(){
    $cadena = "Está la niña en casa";
    $longitud = mb_strlen($cadena, "UTF-8");
    for ($i = 0; $i < $longitud; $i++) {
    // Obtenemos el carácter actual respetando la codificación UTF-8
    $caracter = mb_substr($cadena, $i, 1, 'UTF-8');
    
    // Generamos $i espacios en blanco antes del carácter
    echo str_repeat(" ", $i) . $caracter . "\t";
}

}
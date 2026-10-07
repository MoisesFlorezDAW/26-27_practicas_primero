<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");

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
    date_default_timezone_set('Europe/Madrid');

    $fechaActual = date("d/m/Y");
    $fechaActual2 = date("d/m/Y/D");
    $horaActual = date("H:i:s");

    echo $fechaActual . "<br>";
    echo $fechaActual2 . "<br>";
    echo $horaActual . "<br>";
        
}

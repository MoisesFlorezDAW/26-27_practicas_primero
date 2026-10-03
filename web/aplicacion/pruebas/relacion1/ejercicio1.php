<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//Variables Math pow
$num = 2;
$expo = 4;

$numRound = 399.999;


//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
cuerpo($num, $expo, $numRound); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera()
{}

function cuerpo($num, $expo, $numRound){   
    echo "La potencia de $num elevado a $expo es: " . pow($num, $expo) . PHP_EOL;
    echo "$numRound redondeado es: " . round($numRound, 2) . PHP_EOL;
        
}


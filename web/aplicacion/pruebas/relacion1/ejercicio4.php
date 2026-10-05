<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador
$arrayX = array();

for ($i = 1; $i < 5; $i++) {
    $arrayX[$i] = 0;
}
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
cuerpo($arrayX); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera()
{}

function cuerpo($arrayX){   
}
<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Controlador
$cadena2 = "Moises Florez";
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
    $cadena = <<<EOT
    <h1> ESTO ES UN H1 DENTRO DE EOT </h1>
    ahora un br <br>
    <h2> ESTO ES UN H2 DENTRO DE EOT </h2>
    ahora un br <br>
    ' """"""" á, é, ñ. 
    EOT;

    echo $cadena;
}
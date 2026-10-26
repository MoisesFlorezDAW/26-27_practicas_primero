<?php
include_once(dirname(__FILE__) . "../../../cabecera.php");
$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 4",
        "LINK" =>"index.php"
    ]
];
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion 4 - Primer Trimestre", $barraUbi);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo()
{
    
    $i1 = new InstrumentoBase("guitarra");
    echo "i1 -> descripción: '" . $i1->getDescripcion() . "', edad: " . $i1->getEdad() . "\n";
}
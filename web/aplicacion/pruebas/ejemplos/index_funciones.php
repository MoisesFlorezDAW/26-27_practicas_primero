<?php
include_once(dirname(__FILE__) . "/../../cabecera.php"); 

include("mis_funciones.php");

$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK"  => "/index.php"
    ],
    [
        "TEXTO" => "Pruebas",
        "LINK"  => "index_funciones.php"
    ],
    
];

// Controlador
$nombre = "Moises Florez";
$curso  = "2DAW";

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 1");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 1 - Rel 2", $barraUbi);
cuerpo($nombre, $curso); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera()
{
}


function cuerpo($nombre, $curso)
{
}
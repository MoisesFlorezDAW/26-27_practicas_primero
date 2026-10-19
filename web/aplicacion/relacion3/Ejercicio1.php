<?php
/*
1.-  Escribe distintas cadenas usando  “, ‘, HEREDOC  y  NOWDOC incluyendo variables, 
etiquetas html y caracteres especiales como ‘, “, á, é, ñ. Muestra las cadenas y comprueba que 
el código fuente es legible (no se tiene una sola línea con todo seguido). Haz que se muestren 
las etiquetas html (no se ejecuten)*/
include_once(dirname(__FILE__) . "/../../cabecera.php"); 
$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK"  => "/index.php"
    ],
    [
        "TEXTO" => "Relacion 3",
        "LINK"  => "index.php"
    ],
    [
        "TEXTO" => "Ejercicio 1",
        "LINK"  => "Ejercicio1.php"
    ]
];

// Controlador

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 1");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 1 - Rel 3", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera()
{
}


function cuerpo()
{
    
}
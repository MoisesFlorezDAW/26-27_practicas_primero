<?php
/*
1.-  Escribe distintas cadenas usando  “, ‘, HEREDOC  y  NOWDOC incluyendo variables, 
etiquetas html y caracteres especiales como ‘, “, á, é, ñ. Muestra las cadenas y comprueba que 
el código fuente es legible (no se tiene una sola línea con todo seguido). Haz que se muestren 
las etiquetas html (no se ejecuten)*/
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once "libreria.php";
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
function cabecera() {}


function cuerpo()
{
    $vector = array(); //el vector vacio 
    $numero = 0;

    if (cuentaVeces($vector, "1osición", 7, $numero)) {
        echo "Llamada numero: " . $numero . "<br>";
    } else {
        echo "Llamada incorrecta <br>";
    }

    if (cuentaVeces($vector, "otra", 2, $numero)) {
        echo "Llamada numero: " . $numero . "<br>";
    } else {
        echo "Llamada incorrecta <br>";
    }
    if (cuentaVeces($vector, "2daw", 5, $numero)) { // Prueba incorrecta
        echo "Llamada numero: " . $numero . "<br>";
    } else {
        echo "Llamada incorrecta <br>";
    }
}

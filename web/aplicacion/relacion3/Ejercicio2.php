<?php
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
        "TEXTO" => "Ejercicio 2",
        "LINK"  => "Ejercicio2.php"
    ]
];

// Controlador

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 2");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 2 - Rel 3", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}


function cuerpo()
{
    // Caso usando el valor por defecto
    $cadena = generarCadena();

    echo ($cadena !== false)
        ? "Cadena generada: $cadena<br>"
        : "No se puede generar una cadena con un número menor o igual a 0<br>";

    // Caso de error 
    $cadena = generarCadena(-1);

    echo ($cadena !== false)
        ? "Cadena generada: $cadena<br>"
        : "No se puede generar una cadena con un número menor o igual a 0<br>";

    // Caso con valor diferente al por defecto    
    $cadena = generarCadena(14);

    echo ($cadena !== false)
        ? "Cadena generada: $cadena<br>"
        : "No se puede generar una cadena con un número menor o igual a 0<br>";        

}
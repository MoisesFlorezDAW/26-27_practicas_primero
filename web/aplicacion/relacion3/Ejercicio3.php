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
        "TEXTO" => "Ejercicio 3",
        "LINK"  => "Ejercicio3.php"
    ]
];

// Controlador

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 3");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 3 - Rel 3", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}


function cuerpo()
{
    echo "Suma: " . operaciones(1, 4,4) . "<br>"; 
    echo "Resta: " . operaciones(2,10,5) . "<br>";
    echo "Multiplicacion: " . operaciones(3, 9,9) . "<br>";

    echo "Caso fuera de los tres tipos de operaciones definidos: " . 
                    Operaciones(5,2,5,7,3,4) . "<br>"; //Sumaria suma las posiciones pares (5+3), las posiciones impares 
                                                       // (2+7+4),  y se restan los dos
}
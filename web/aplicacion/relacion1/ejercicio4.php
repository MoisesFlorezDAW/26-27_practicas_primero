<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 1",
        "LINK" =>"index.php"
    ],
    [
        "TEXTO"=>"Ejercicio 4",
        "LINK" =>"ejercicio4.php"
    ]
];

// Controlador 

$array = array();

for ($i = 1; $i <= 5; $i++) {
    $fila = array();

    for ($j = 1; $j <= $i; $j++) {
        $fila[] = $i;
    }

    $array[] = $fila;
}

define("FILAS", 5);

$arrayFilas = array();

for ($i = 1; $i <= FILAS; $i++) {
    $fila = array();

    for ($j = 1; $j <= $i; $j++) {
        $fila[] = $i;
    }

    $arrayFilas[] = $fila;
}

// Después se dibuja la plantilla
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 4", $barraUbi);
cuerpo($array, $arrayFilas); // llamo a la vista pasando los datos
finCuerpo();

// **********************************************************
// Vista
function cabecera()
{
}

function cuerpo($array, $arrayFilas)
{
    echo "<h2>Array con 5 filas</h2>";

    foreach ($array as $fila) {
        foreach ($fila as $numero) {
            echo $numero . " ";
        }

        echo "<br>";
    }

    echo "<h2>Array usando la constante FILAS</h2>";

    foreach ($arrayFilas as $fila) {
        foreach ($fila as $numero) {
            echo $numero . " ";
        }

        echo "<br>";
    }
}
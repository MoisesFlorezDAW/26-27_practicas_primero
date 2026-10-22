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
        "TEXTO" => "Ejercicio 5",
        "LINK"  => "Ejercicio5.php"
    ]
];

// Controlador

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 5");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 5 - Rel 3", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}


function cuerpo()
{
    $pruebas = [
    ['suma', 3, 1],
    ['resta', 3, 1],
    ['multiplicacion', 3, 1],
    ['division', 3, 1],   // operación no válida
    ['', 3, 1],           // operación no válida
];
 
foreach ($pruebas as [$operacion, $a, $b]) {
    $resultado = hacerOperacion($operacion, $a, $b);
 
    echo "<p>hacerOperacion(\"$operacion\", $a, $b) = ";
    if ($resultado === false) {
        echo "false (operación no válida)";
    } else {
        echo $resultado;
    }
    echo "</p>";
}
}


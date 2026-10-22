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
        "TEXTO" => "Ejercicio 4",
        "LINK"  => "Ejercicio4.php"
    ]
];

// Controlador

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 4");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 4 - Rel 3", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}


function cuerpo()
{
    $valor = 7;
    $resultado = devuelve($valor, 4, 10);
    echo "<p><strong>1) Tres parámetros:</strong> devuelve(\$valor, 4, 10)<br>";
    echo "\$valor (suma) = $valor<br>";
    echo "Resultado (producto) = $resultado</p>";

    // 2) Solo el primer parámetro (segundo y tercero toman su valor por defecto)
    $valor = 7;
    $resultado = devuelve($valor);
    echo "<p><strong>2) Solo el primero:</strong> devuelve(\$valor)<br>";
    echo "\$valor (suma) = $valor<br>";
    echo "Resultado (producto) = $resultado</p>";

    // 3) Primer y segundo parámetro (el tercero toma su valor por defecto)
    $valor = 7;
    $resultado = devuelve($valor, 4);
    echo "<p><strong>3) Primero y segundo:</strong> devuelve(\$valor, 4)<br>";
    echo "\$valor (suma) = $valor<br>";
    echo "Resultado (producto) = $resultado</p>";

    // 4) Primer y tercer parámetro (el segundo no se indica) -> argumentos con nombre (PHP 8+)
    $valor = 7;
    $resultado = devuelve($valor, valor3: 10);
    echo "<p><strong>4) Primero y tercero:</strong> devuelve(\$valor, valor3: 10)<br>";
    echo "\$valor (suma) = $valor<br>";
    echo "Resultado (producto) = $resultado</p>";
}


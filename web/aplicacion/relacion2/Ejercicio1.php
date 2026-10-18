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
        "TEXTO" => "Relacion 2",
        "LINK"  => "index.php"
    ],
    [
        "TEXTO" => "Ejercicio 1",
        "LINK"  => "Ejercicio1.php"
    ]
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
    // 1. Comillas dobles: interpreta variables y secuencias como \n
    $dobles = "<h1>Hola $nombre</h1>\n"
            . "<p>Curso: {$curso}</p>\n"
            . "Comillas: \" y ' , acentos: á é ñ\n";

    // 2. Comillas simples nn interpreta variables ni \n.
    //    Solo se escapa \' (y \\). Los saltos de línea son los reales.
    $simples = '<h1>Hola $nombre</h1>
<p>Curso: {$curso}</p>
Comillas: " y \' , acentos: á é ñ
Aquí \n no hace nada';

    // 3. HEREDOC es como las comillas dobles interpreta variables
    //    pero no hace falta escapar las comillas.
    $heredoc = <<<EOT
    <h1>Hola $nombre</h1>
    <p>Curso: {$curso}</p>
    Comillas: " y ' , acentos: á é ñ
    <br>
    EOT;

    // 4. NOWDOC es como las comillas simples (NO interpreta variables).
    //    Se distingue por las comillas simples en el identificador.
    $nowdoc = <<<'EOT'
    <h1>Hola $nombre</h1>
    <p>Curso: {$curso}</p>
    Comillas: " y ' , acentos: á é ñ
    <br>
    EOT;

    echo "<h3>Comillas dobles</h3>\n";
    echo "<pre>" . htmlspecialchars($dobles) . "</pre>\n";

    echo "<h3>Comillas simples</h3>\n";
    echo "<pre>" . htmlspecialchars($simples) . "</pre>\n";

    echo "<h3>HEREDOC</h3>\n";
    echo "<pre>" . htmlspecialchars($heredoc) . "</pre>\n";

    echo "<h3>NOWDOC</h3>\n";
    echo "<pre>" . htmlspecialchars($nowdoc) . "</pre>\n";
}
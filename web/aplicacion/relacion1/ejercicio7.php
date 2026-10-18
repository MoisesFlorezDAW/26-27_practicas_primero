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
        "TEXTO"=>"Ejercicio 7",
        "LINK" =>"ejercicio7.php"
    ]
];

// Dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 7", $barraUbi);
cuerpo();
finCuerpo();

// **********************************************************
// Vista
function cabecera()
{
}

function cuerpo()
{
    date_default_timezone_set('Europe/Madrid');

    echo "<h2>1. Usando funciones de fecha</h2>";

    // 1. Fecha actual en formato d/m/Y
    echo "<h3>Fecha actual</h3>";

    echo date("d/m/Y") . "<br>";

    // 2. Fecha actual: dia, mes, año y dia de la semana
    echo "<h3>Fecha actual completa</h3>";

    echo date("d") . ", ";
    echo date("F") . ", ";
    echo date("Y") . ", ";
    echo date("l") . "<br>";

    // 3. Hora actual
    echo "<h3>Hora actual</h3>";

    echo date("H:i:s") . "<br>";

    // 4. Fecha 29/03/2024 a las 12:45
    echo "<h3>Fecha 29/03/2024 a las 12:45</h3>";

    $fechaFija = strtotime("2024-03-29 12:45:00");

    echo date("d/m/Y", $fechaFija) . "<br>";

    echo date("d", $fechaFija) . ", ";
    echo date("F", $fechaFija) . ", ";
    echo date("Y", $fechaFija) . ", ";
    echo date("l", $fechaFija) . "<br>";

    echo date("H:i:s", $fechaFija) . "<br>";

    // 5. Fecha actual menos 12 dias y 4 horas
    echo "<h3>Fecha actual menos 12 dias y 4 horas</h3>";

    $fechaRestada = strtotime("-12 days -4 hours");

    echo date("d/m/Y", $fechaRestada) . "<br>";

    echo date("d", $fechaRestada) . ", ";
    echo date("F", $fechaRestada) . ", ";
    echo date("Y", $fechaRestada) . ", ";
    echo date("l", $fechaRestada) . "<br>";

    echo date("H:i:s", $fechaRestada) . "<br>";


    echo "<hr>";
    echo "<h2>2. Usando la clase DateTime</h2>";

    // 1. Fecha actual
    echo "<h3>Fecha actual</h3>";

    $actual = new DateTime();

    echo $actual->format("d/m/Y") . "<br>";

    // 2. Fecha actual completa
    echo "<h3>Fecha actual completa</h3>";

    echo $actual->format("d") . ", ";
    echo $actual->format("F") . ", ";
    echo $actual->format("Y") . ", ";
    echo $actual->format("l") . "<br>";

    // 3. Hora actual
    echo "<h3>Hora actual</h3>";

    echo $actual->format("H:i:s") . "<br>";

    // 4. Fecha fija 29/03/2024 a las 12:45
    echo "<h3>Fecha 29/03/2024 a las 12:45</h3>";

    $fija = new DateTime("2024-03-29 12:45:00");

    echo $fija->format("d/m/Y") . "<br>";

    echo $fija->format("d") . ", ";
    echo $fija->format("F") . ", ";
    echo $fija->format("Y") . ", ";
    echo $fija->format("l") . "<br>";

    echo $fija->format("H:i:s") . "<br>";

    // 5. Fecha actual menos 12 dias y 4 horas
    echo "<h3>Fecha actual menos 12 dias y 4 horas</h3>";

    $restada = new DateTime();
    $restada->modify("-12 days -4 hours");

    echo $restada->format("d/m/Y") . "<br>";

    echo $restada->format("d") . ", ";
    echo $restada->format("F") . ", ";
    echo $restada->format("Y") . ", ";
    echo $restada->format("l") . "<br>";

    echo $restada->format("H:i:s") . "<br>";
}

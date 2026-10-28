<?php
include_once(dirname(__FILE__) . "../../../cabecera.php");
$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion 4",
        "LINK" => "index.php"
    ]
];
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion 4 - Primer Trimestre", $barraUbi);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo()
{
    /**
     * Prueba de Ejercicio 1
     */
    echo "<h2>Prueba ejercicio 5 (Abs InstrumentoBase, Interface IFabricable, InstrumentoViento, Flauta)</h2>";
    $flauta1 = Flauta::CrearDesdeArray([
        "material" => "metal",
        "edad" => 8
    ]);

    echo $flauta1 . "<br>";
    echo $flauta1->sonido() . "<br>";
    echo $flauta1->afinar() . "<br>";

    $flauta2 = clone $flauta1;
    echo "<hr>". $flauta2 . "<br>";

    // Creacion y prueba de los objetos del ejercicio 5
    $persona1 = new Persona();
    $persona2 = new Persona("Juan perez", "16/08/2003", "Calle Toronjo", "Sevilla", EstadoCivil::PAREJA);
    echo "<h2>Prueba ejercicio 5 (Enum EstadoCivil, Clase Persona)</h2>";
    echo $persona1;
    echo "<hr><br>" . $persona2;
}

<?php

include_once(dirname(__FILE__) . "../../../cabecera.php");
$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion 5",
        "LINK" => "index.php"
    ]
];

require_once 'val_normal.php';
require_once 'val_filter.php';

//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion 5 - Primer Trimestre", $barraUbi);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
//vista
function cuerpo()
{
    // Enlace a pruebas de metodos de la librerias
    echo "<a href='pruebaLibrerias.php'  style='color: Red; font-weight: bold;
    position: relative; left: 75%;'>Prueba de librerias</a>";
}
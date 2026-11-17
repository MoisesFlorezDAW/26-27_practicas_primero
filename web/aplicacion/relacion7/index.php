<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 7",
        "LINK" =>"index.php"
    ]
];

//dibuja la plantilla de vista
inicioCabecera("Relacion 7");
cabecera();
finCabecera();  

inicioCuerpo("Relacion 7 - Primer Trimestre",$barraUbi);
cuerpo(); // llamo a la vista
finCuerpo();
// vista
function cabecera() {}

//vista
function cuerpo()
{
    
}
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
        "TEXTO"=>"Ejercicio 6",
        "LINK" =>"ejercicio6.php"
    ]
];
//controlador
 $vector=array("primera" =>12.56, 24=>true, 67 =>23.76);

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 6", $barraUbi);
cuerpo($vector); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera()
{}

function cuerpo($vector){   
    foreach($vector as $key => $value){
        echo current($vector) ."";
        next($vector);
    }
        
}

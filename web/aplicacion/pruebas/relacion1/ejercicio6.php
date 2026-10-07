<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador
 $vector=array("primera" =>12.56, 24=>true, 67 =>23.76);

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
cuerpo($vector); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera()
{}

function cuerpo($vector){   
    foreach($vector as $key => $value){
        
    }
        
}

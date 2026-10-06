<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("ARRAYS");
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera()
{}

function cuerpo(){      
        
    $miArray[3] = "valor";
    $miArray [7] = 1234;
    $miArray['nueva']= 24;
    $miArray[] = 'nueva';
    $miArray[] = 54;

    $total = 0;

    $final = count($miArray);
    for($i=0; $i<$final; $i++){
        if(isset($miArray[$i]))
        $total+= $miArray[$i];
        else
            $total+= $miArray[$i];
    
    }

    $total=0;
    $total1 = 0;

    foreach($miArray as $i=>$valor){
      $total+=$miArray[$i];
      $total1+=$valor;
    }

}
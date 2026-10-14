<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador
$vector=array();
$vector[1]="esto es una cadena";
$vector["posi1"]=25.67;
$vector[]=false;
$vector["ultima"]=array(2,5,96);
$vector[56]=23;

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
    if(is_array($value)){
        $array1 = $value;
        foreach($array1 as $key2 => $value2){
            echo $key2 ."". $value2 ."";
        }
    } else if(is_integer($value)){
        echo "<br>Entero con valor: " . $value. "<br>"; 
    } else if(is_string($value)){        
        echo "-" . $value. "<br>";
    }else if(is_bool($value)){
        echo "-". $value." Opuesto:";
        if($value==true){
            echo "false <br>";
        }else if($value==false){
            echo "true <br>";
        }
    }else if(is_float($value)){
        $realCua = pow($value, 2);
        echo "- ".$value. " que al cuadrado es: ". $realCua. "<br>";
    }
}

}
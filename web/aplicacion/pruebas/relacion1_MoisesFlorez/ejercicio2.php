<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//Variables Math pow
const numLanzamientos = 1000;  
$dado = mt_rand(1, 6);

$arrayUno = array();
$arrayDos = array();
$arrayTres = array();
$arrayCuatro = array();
$arrayCinco = array();  
$arraySeis = array();

//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
cuerpo(numLanzamientos, $dado, $arrayUno, $arrayDos, 
        $arrayTres, $arrayCuatro, $arrayCinco, $arraySeis); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera()
{}
function cuerpo($numLanzamientos, $dado, $arrayUno, $arrayDos, $arrayTres, $arrayCuatro, $arrayCinco, $arraySeis){
  for($i = 0; $i < 6; $i++){
        echo "Lanzamiento $i del dado: " . $dado . PHP_EOL. "<br>";
    }
    
    echo "Lanzado el dado $numLanzamientos veces." . PHP_EOL . "<br>";
    $cont = 0;
    while($cont < $numLanzamientos){
        $dado = mt_rand(1, 6);
        switch($dado){
            case 1:
                $arrayUno[] = $dado;
                break;
            case 2:
                $arrayDos[] = $dado;
                break;
            case 3:
                $arrayTres[] = $dado;
                break;
            case 4:
                $arrayCuatro[] = $dado;
                break;
            case 5:
                $arrayCinco[] = $dado;
                break;
            case 6:
                $arraySeis[] = $dado;
                break;
        }
        $cont++;
        
    }
    echo "El 1 ha salido " . count($arrayUno) . " veces. Con un porcentaje de " . (count($arrayUno) / $numLanzamientos * 100) . "%." . PHP_EOL. "<br>";
    echo "El 2 ha salido " . count($arrayDos) . " veces. Con un porcentaje de " . (count($arrayDos) / $numLanzamientos * 100) . "%." . PHP_EOL. "<br>";
    echo "El 3 ha salido " . count($arrayTres) . " veces. Con un porcentaje de " . (count($arrayTres) / $numLanzamientos * 100) . "%." . PHP_EOL. "<br>";
    echo "El 4 ha salido " . count($arrayCuatro) . " veces . Con un porcentaje de " . (count($arrayCuatro) / $numLanzamientos * 100) . "%." . PHP_EOL. "<br>";
    echo "El 5 ha salido " . count($arrayCinco) . " veces. Con un porcentaje de " . (count($arrayCinco) / $numLanzamientos * 100) . "%." . PHP_EOL. "<br>";
    echo "El 6 ha salido " . count($arraySeis) . " veces. Con un porcentaje de " . (count($arraySeis) / $numLanzamientos * 100) . "%." . PHP_EOL. "<br>";
}


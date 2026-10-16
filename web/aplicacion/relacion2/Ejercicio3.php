<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
// Controlador
$array1 = [
    'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 
    'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 
    'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 
    'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 
    '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
cuerpo($array1); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera()
{}

function cuerpo($array1){
    $cadena = "";
    for($i=0; $i<20; $i++){
        $indiceR = array_rand($array1);
        $cadena .= $array1[$indiceR];

        
    }

    echo "Cadena hecha con arrray: " . $cadena. "<br>";

     $cadena = "";
    
    for($i = 0; $i < 20; $i++){
        // 1. Decidimos al azar qué tipo de carácter poner: 
        // 1 = Número, 2 = Mayúscula, 3 = Minúscula
        $tipo = rand(1, 3);
        
        if ($tipo === 1) {
            $ascii = rand(48, 57);  // Rangos de '0' a '9'
        } elseif ($tipo === 2) {
            $ascii = rand(65, 90);  // Rangos de 'A' a 'Z'
        } else {
            $ascii = rand(97, 122); // Rangos de 'a' a 'z'
        }
        
        // 2. Convertimos el número ASCII en carácter y lo acumulamos
        $cadena .= chr($ascii);
    }
    
    // Mostramos la clave final de 20 caracteres
    echo "Cadena con el codigo ASCII: " . $cadena; 
}
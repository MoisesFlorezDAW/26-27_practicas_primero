<?php
/*
3.-  Genera  una  cadena  aleatoria  de  20  caracteres (los  caracteres  permitidos  son  letras 
minúsculas, letras mayúsculas y números)  a)  A  partir  de  un  array  en  el  que  están  todos  los  caracteres  posibles  que  cumplen  la 
condición. (tienes que rellenar el array con todos los caracteres validos)  b)  A  partir  del  código  ASCII  (se  puede  indicar  un  rango  mayor  y  eliminar  aquellos 
caracteres que no lo cumplan). */
include_once(dirname(__FILE__) . "/../../cabecera.php");
$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 2",
        "LINK" =>"index.php"
    ],
    [
        "TEXTO"=>"Ejercicio 3",
        "LINK" =>"Ejercicio3.php"
    ]
];

// Controlador
$array1 = [
    'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 
    'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 
    'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 
    'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 
    '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
];

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 3");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 3 - Rel 2", $barraUbi);
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
        // Dependiendo del valor que nos salga usaremos un rango u otro
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
    
    echo "Cadena con el codigo ASCII: " . $cadena; 
}
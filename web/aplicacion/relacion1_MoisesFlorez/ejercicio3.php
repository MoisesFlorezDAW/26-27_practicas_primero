<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador
$array1 = [];            // a) Crear array
$array1[1]  = "valor1";  // b) Rellenar posiciones
$array1[16] = "valor16";
$array1[54] = "valor54";
$array1[]   = 34;        // c) Añadir al final
$array1["uno"]   = "cadena"; // d)
$array1["dos"]   = true;
$array1["tres"]  = 1.345;
$array1["ultima"] = [1, 34, "nueva"]; // e)


// ------------------------------------------------------
// 2) Crear y rellenar el array usando UNA sola sentencia con array()
// ------------------------------------------------------
$array2 = array(
    1 => "valor1",
    16 => "valor16",
    54 => "valor54",
    // c) añadir 34 al final → se pone sin clave
    34,
    // d) claves tipo string
    "uno"   => "cadena",
    "dos"   => true,
    "tres"  => 1.345,
    // e) array dentro de otra clave
    "ultima" => array(1, 34, "nueva")
);


// ------------------------------------------------------
// 3) Crear y rellenar el array usando UNA sola sentencia con []
// ------------------------------------------------------
$array3 = [
    1   => "valor1",
    16  => "valor16",
    54  => "valor54",
    34,                 // c) valor al final
    "uno"   => "cadena",
    "dos"   => true,
    "tres"  => 1.345,
    "ultima" => [1, 34, "nueva"]
];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
cuerpo($array1, $array2, $array3); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera()
{}

function cuerpo($array1, $array2, $array3){   

    echo "Array 1: <br>";
    foreach($array1 as $key => $value){
        echo "Clave: $key, Valor: ";
        echo is_array($value) ? print_r($value, true) : $value;
        echo "<br>";
    }

    echo "<br>Array 2: <br>";
    foreach($array2 as $key => $value){
        echo "Clave: $key, Valor: ";
        echo is_array($value) ? print_r($value, true) : $value;
        echo "<br>";
    }

    echo "<br>Array 3: <br>";
    foreach($array3 as $key => $value){
        echo "Clave: $key, Valor: ";
        echo is_array($value) ? print_r($value, true) : $value;
        echo "<br>";
    }
}



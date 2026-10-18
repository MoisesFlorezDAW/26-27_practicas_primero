<!-- 4.- Tengo unas variables con valores 17.5 (float), 379987.24 (float)  Mostrarlas  
 de  forma  que  resulte  "el  primer  valor  -0000000000017,5-,  el  segundo  valor  -      
379.987,24-"  (usar  number  format  para  obtener  el  formateo  de  los  números,  los  números  se 
muestran con 15 caracteres en total, el primero relleno con 0 y el segundo con espacios-debe 
aparecer el espacio))  -->
<?php
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
        "TEXTO"=>"Ejercicio 4",
        "LINK" =>"Ejercicio4.php"
    ]
];

// Controlador
$var1 = (Float) 17.5;
$var2 = (Float)379987.24;

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 4");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 4 - Rel 2", $barraUbi);
cuerpo($var1, $var2); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera()
{}

function cuerpo($var1, $var2){
    // Formateamos los números con number_format:
    // El primer número tiene 1 decimal (17,5) y el segundo tiene 2 decimales (379.987,24)
    // El tercer parámetro es el separador decimal (,) y el cuarto es el de miles (.)
    $num1_formateado = number_format($var1, 1, ",", ".");
    $num2_formateado = number_format($var2, 2, ",", ".");

    // Rellenamos hasta alcanzar los 15 caracteres de longitud total usando STR_PAD_LEFT:
    // El primero se rellena con el carácter "0"
    $num1_relleno = str_pad($num1_formateado, 15, "0", STR_PAD_LEFT);
    // El segundo se rellena con un espacio en blanco " "
    $num2_relleno = str_pad($num2_formateado, 15, " ", STR_PAD_LEFT);

    echo "<pre>";
    echo "el primer valor -$num1_relleno-, el segundo valor -$num2_relleno-";
    echo "</pre>";

}
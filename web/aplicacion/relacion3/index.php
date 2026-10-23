<?php
include_once(dirname(__FILE__) . "../../../cabecera.php");
include_once "libreria.php";
$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 3",
        "LINK" =>"index.php"
    ]
];
//controlador

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion 3 - Primer Trimestre", $barraUbi);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo()
{
    /**
     * Ejercicio 1
     */
    echo "<h2>Ejercicio 1</h2>";
    $vector = array(); //el vector vacio 
    $numero = 0;

    if (cuentaVeces($vector, "1osición", 7, $numero)) {
        echo "Llamada numero: " . $numero . "<br>";
    } else {
        echo "Llamada incorrecta <br>";
    }

    if (cuentaVeces($vector, "otra", 2, $numero)) {
        echo "Llamada numero: " . $numero . "<br>";
    } else {
        echo "Llamada incorrecta <br>";
    }
    if (cuentaVeces($vector, "2daw", 5, $numero)) { // Prueba incorrecta
        echo "Llamada numero: " . $numero . "<br>";
    } else {
        echo "Llamada incorrecta <br>";
    }
    //---------------Fin ejercicio 1---------------\\

    /**
     * Ejercicio 2
     */
        // Caso usando el valor por defecto
    echo "<h2>Ejercicio 2</h2>";
    $cadena = generarCadena();

    echo ($cadena !== false)
        ? "Cadena generada: $cadena<br>"
        : "No se puede generar una cadena con un número menor o igual a 0<br>";

    // Caso de error 
    $cadena = generarCadena(-1);

    echo ($cadena !== false)
        ? "Cadena generada: $cadena<br>"
        : "No se puede generar una cadena con un número menor o igual a 0<br>";

    // Caso con valor diferente al por defecto    
    $cadena = generarCadena(14);

    echo ($cadena !== false)
        ? "Cadena generada: $cadena<br>"
        : "No se puede generar una cadena con un número menor o igual a 0<br>";        
    //---------------Fin ejercicio 2---------------\\

    /**
     * Ejercicio 3
     */    
    echo "<h2>Ejercicio 3</h2>";
    echo "Suma: " . operaciones(1, 4,4) . "<br>"; 
    echo "Resta: " . operaciones(2,10,5) . "<br>";
    echo "Multiplicacion: " . operaciones(3, 9,9) . "<br>";

    echo "Caso fuera de los tres tipos de operaciones definidos: " . 
                    Operaciones(5,2,5,7,3,4) . "<br>"; //Sumaria suma las posiciones pares (5+3), las posiciones impares 
                                                       // (2+7+4),  y se restan los dos
    //---------------Fin ejercicio 3---------------\\

    /**
     * Ejercicio 4
     */
    echo "<h2>Ejercicio 4</h2>";
    $valor = 7;
    $resultado = devuelve($valor, 4, 10);
    echo "<p><strong>1) Tres parámetros:</strong> devuelve(\$valor, 4, 10)<br>";
    echo "\$valor (suma) = $valor<br>";
    echo "Resultado (producto) = $resultado</p>";

    // 2. Solo el primer parámetro (segundo y tercero toman su valor por defecto)
    $valor = 7;
    $resultado = devuelve($valor);
    echo "<p><strong>2) Solo el primero:</strong> devuelve(\$valor)<br>";
    echo "\$valor (suma) = $valor<br>";
    echo "Resultado (producto) = $resultado</p>";

    // 3. Primer y segundo parámetro (el tercero toma su valor por defecto)
    $valor = 7;
    $resultado = devuelve($valor, 4);
    echo "<p><strong>3) Primero y segundo:</strong> devuelve(\$valor, 4)<br>";
    echo "\$valor (suma) = $valor<br>";
    echo "Resultado (producto) = $resultado</p>";

    // 4. Primer y tercer parámetro (el segundo no se indica) -> argumentos con nombre (PHP 8+)
    $valor = 7;
    $resultado = devuelve($valor, valor3: 10);
    echo "<p><strong>4) Primero y tercero:</strong> devuelve(\$valor, valor3: 10)<br>";
    echo "\$valor (suma) = $valor<br>";
    echo "Resultado (producto) = $resultado</p>";
    //---------------Fin ejercicio 4---------------\\

    /**
     * Ejercicio 5
     */
    echo "<h2>Ejercicio 5</h2>";
    $pruebas = [
    ['suma', 3, 1],
    ['resta', 3, 1],
    ['multiplicacion', 3, 1],
    ['division', 3, 1],   // operación no válida
    ['', 3, 1],           // operación no válida
];
 
foreach ($pruebas as [$operacion, $a, $b]) {
    $resultado = hacerOperacion($operacion, $a, $b);
 
    echo "<p>hacerOperacion(\"$operacion\", $a, $b) = ";
    if ($resultado === false) {
        echo "false (operación no válida)";
    } else {
        echo $resultado;
    }
    echo "</p>";
}
    //---------------Fin ejercicio 5---------------\\

    /**
     * Ejercicio 6
     */
    echo "<h2>Ejercicio 6</h2>";
    $llamada1 = llamadaAFuncion(6,4,fn($a,$b)=>$a+$b);
    $llamada2 = llamadaAFuncion(7,7,fn($a,$b)=>$a*$b);
    $llamada3 = llamadaAFuncion(100,5,fn($a,$b)=>$a/$b);

    echo "llamadaAFuncion(6,4,fn(\$a,\$b)=>\$a+\$b) = " . $llamada1 . "<br>";
    echo "llamadaAFuncion(7,7,fn($a,$b)=>$a*$b) =  " . $llamada2 . "<br>";
    echo "llamadaAFuncion(100,5,fn($a,$b)=>$a/$b) = " . $llamada3 . "<br>";
    
    //---------------Fin ejercicio 6---------------\\

    /**
     * Ejercicio 7
     */
    echo "<h2>Ejercicio 7</h2>";
    $vector=array("uno","grande","caminos","a");
    $vector2=array("luz", "murcielago", "diez","pantalla", "teclado");

    ordenar($vector);
    ordenar($vector2);

    echo "\$vector=array((“uno”,“grande”,“caminos”,”a”) - ORDENADO: ";
    foreach ($vector as $elem ) {
        echo $elem . " - ";
    }
    echo "\$vector2=array('luz', 'murcielago', 'diez','pantalla', 'teclado') - ORDENADO: ";
    foreach ($vector2 as $elem ) {
        echo $elem . " - ";
    }
    //---------------Fin ejercicio 6---------------\\
}

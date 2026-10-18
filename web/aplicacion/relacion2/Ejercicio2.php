<?php
/**
 * 2.- Dada la cadena "Está la niña en casa" se pide: 
    - Mostrar cada carácter en una línea separada y con tantos espacios en blanco como me 
    indica la posición del carácter mostrado.  (quedaría algo así) NOTA: prueba si puedes hacerlo con [] para obtener los caracteres correctos. Prueba si 
    puedes  hacerlo  con  substr  para  obtener  los  caracteres  correctos.  Prueba  si  puedes 
    hacerlo  con  mb_substr  para  obtener  los  caracteres  correctos.  Comenta  las  formas  no 
    válidas para que pueda comprobar que lo has hecho.
    - Mostrar la cadena en orden inverso, (usar índices negativos, no invertir la cadena) 
    con cada carácter en una línea distinta y con los espacios en blanco 
    correspondientes  (desde  0  hasta  n  espacios  en  blanco),  los  caracteres  pares  en 
    mayúscula (0, 2, ...) y los impares en minúscula (1, 3, 5, ...), y extrayendo los 
    caracteres con mb_substr. 
    - Separa la cadena en partes usando el carácter a, y mostrar cada parte en una línea 
    distinta 
    - Localiza  en  la  cadena  la  palabra  niña  y  cambia  el  siguiente  carácter  a  niña  (el 
    espacio en blanco) por "/mujer "
 */
include_once(dirname(__FILE__) . "/../../cabecera.php");
// Controlador
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
        "TEXTO"=>"Ejercicio 2",
        "LINK" =>"Ejercicio2.php"
    ]
];

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 2");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 2 - Rel 2", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera()
{}

function cuerpo(){
    mb_internal_encoding('UTF-8');

    $cadena = "Está la niña en casa";
    $n = mb_strlen($cadena); // 20 caracteres

    /* 
       APARTADO 1: cada carácter en una línea con tantos espacios
       como indique su posición */
    echo "<h3>Apartado 1</h3><pre>";

    /* FORMA NO VÁLIDA 1: con [] (trabaja con BYTES)
       "á" y "ñ" ocupan 2 bytes en UTF-8, se parten en dos y salen como "�".
       Además strlen() devuelve 22 en vez de 20.

    for ($i = 0; $i < strlen($cadena); $i++) {
        echo str_repeat(" ", $i) . $cadena[$i] . "\n";
    }
    */

    /* --- FORMA NO VÁLIDA 2: con substr (también trabaja con BYTES) ---
       Mismo problema que con [].

    for ($i = 0; $i < strlen($cadena); $i++) {
        echo str_repeat(" ", $i) . substr($cadena, $i, 1) . "\n";
    }
    */

    /* --- FORMA VÁLIDA: con mb_substr (trabaja con CARACTERES) --- */
    for ($i = 0; $i < $n; $i++) {
        echo str_repeat(" ", $i) . mb_substr($cadena, $i, 1) . "\n";
    }
    echo "</pre>";

    /* APARTADO 2: orden inverso con índices negativos (sin invertir
       la cadena), espacios de 0 a n-1, pares en mayúscula e impares
       en minúscula, con mb_substr */
    echo "<h3>Apartado 2</h3><pre>";
    for ($i = 0; $i < $n; $i++) {
        $car = mb_substr($cadena, -($i + 1), 1); // -1 = último carácter

        $car = ($i % 2 == 0) ? mb_strtoupper($car) : mb_strtolower($car);

        echo str_repeat(" ", $i) . $car . "\n";
    }
    echo "</pre>";

    /*APARTADO 3: separar la cadena por el carácter "a"*/
    echo "<h3>Apartado 3</h3><pre>";
    $partes = explode("a", $cadena);
    foreach ($partes as $parte) {
        echo $parte . "\n";
    }
    echo "</pre>";
    // Partes: "Está l", " niñ", " en c", "s", "" la última queda vacía
    // porque la cadena termina en "a", La "á" con tilde no separa.

    /* APARTADO 4: localizar "niña" y cambiar el carácter siguiente
       (el espacio) por "/mujer " */
    echo "<h3>Apartado 4</h3><pre>";
    $pos = mb_strpos($cadena, "niña");   // 8
    $fin = $pos + mb_strlen("niña");     // 12 (posición del espacio)

    $nueva = mb_substr($cadena, 0, $fin) 
           . "/mujer "                    // sustituye al espacio
           . mb_substr($cadena, $fin + 1);

    echo $nueva; 
    echo "</pre>";

}
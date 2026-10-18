<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
// Barra de ubicación

/**
 * Cada elemento es un array de dos posiciones asociativas
 * TEXTO: testo a mostrar en el elemento
 * LINK: Enlace a la pagina. Si esta vaciono tiene enlace
 */
$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 1",
        "LINK" =>"index.php"
    ]
];

//controlador


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion 1 Primer trimestre", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera()
{}

//vista
function cuerpo()
{
?>
    <h2>Relacion 1</h2>
    <ul>
    <li><a href="ejercicio1.php">Ejercicio 1</a><br></li>
    <li><a href="ejercicio2.php">Ejercicio 2</a><br></li>
    <li><a href="ejercicio3.php">Ejercicio 3</a><br></li>
    <li><a href="ejercicio4.php">Ejercicio 4</a><br></li>
    <li><a href="ejercicio5.php">Ejercicio 5</a></li>
    <li><a href="ejercicio6.php">Ejercicio 6</a></li>
    <li><a href="ejercicio7.php">Ejercicio 7</a></li>
    </ul>
<?php
}
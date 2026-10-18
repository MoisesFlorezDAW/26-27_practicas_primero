<?php
include_once(dirname(__FILE__) . "../../../cabecera.php");
$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 2",
        "LINK" =>"index.php"
    ]
];
//controlador

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion 2 - Primer Trimestre", $barraUbi);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo()
{
?>
    <h2>Relacion 2</h2>
    <ul>
    <li><a href="Ejercicio1.php">Ejercicio 1</a><br></li>
    <li><a href="Ejercicio2.php">Ejercicio 2</a></li>
    <li><a href="Ejercicio3.php">Ejercicio 3</a></li>
    <li><a href="Ejercicio4.php">Ejercicio 4</a></li>
    <li><a href="Ejercicio5.php">Ejercicio 5</a></li>
    </ul>
<?php
}

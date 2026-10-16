<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra=[
    [
      "TEXTO" =>  "inicio",
      "ENLACE" => "/index.php",        ],
      [
      "TEXTO" =>  "pruebas"
      ],
];


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barra);
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
    <br><br>
    <a href="./aplicacion/pruebas/index.php">Acceso a pruebas</a>
    <h2>Relacion1</h2>
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
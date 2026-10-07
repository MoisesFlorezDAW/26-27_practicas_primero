<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//controlador
$barra=[
    [
      "TEXTO" =>  "inicio",
      "ENLACE" => "/index.php",
      "ADICIONAL" => ">>>"],        
      [
      "TEXTO" =>  "OTRO",
      ],
    [
    "TEXTO" => "index",
    "ADICIONAL" => "&copy;&copy"
    ]
];


$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
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
    <br><br>
    <a href="./aplicacion/pruebas/index.php">Acceso a pruebas</a>
    <h2>Relacion1</h2>
    <ul>
    <li><a href="./aplicacion/pruebas/relacion1/ejercicio1.php">Ejercicio 1</a><br></li>
    <li><a href="./aplicacion/pruebas/relacion1/ejercicio2.php">Ejercicio 2</a><br></li>
    <li><a href="./aplicacion/pruebas/relacion1/ejercicio3.php">Ejercicio 3</a><br></li>
    <li><a href="./aplicacion/pruebas/relacion1/ejercicio4.php">Ejercicio 4</a><br></li>
    <li><a href="./aplicacion/pruebas/relacion1/ejercicio5.php">Ejercicio 5</a></li>
    <li><a href="./aplicacion/pruebas/relacion1/ejercicio6.php">Ejercicio 6</a></li>
    <li><a href="./aplicacion/pruebas/relacion1/ejercicio7.php">Ejercicio 7</a></li>
    </ul>
<?php
}

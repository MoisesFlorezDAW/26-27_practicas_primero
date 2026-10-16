<?php
include_once(dirname(__FILE__) . "../../../cabecera.php");
//controlador

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
    <h2>Relacion 2</h2>
    <ul>
    <li><a href="Ejercicio1.php">Ejercicio 1</a><br></li>
    <li><a href="Ejercicio2.php">Ejercicio 2</a></li>
    <li><a href="Ejercicio3.php">Ejercicio 3</a></li>
    </ul>
<?php
}

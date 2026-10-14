<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//controlador

$barra=[
    [
      "TEXTO" =>  "inicio",
      "ENLACE" => "/index.php",        ],
      [
      "TEXTO" =>  "pruebas",
      "ENLACE" => "/aplicacion/pruebas/index.php"
      ],
      [
      "TEXTO" =>  "eje. basicos",
      "ENLACE" => "/aplicacion/pruebas/relacion1/ejercicio1.php"
      ]
];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("prubas básicas");
cuerpo(); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo(){
?>
    <br><br>
    Elemento de pruebas
    <a href="index.php">inicio</a>

    <?php 
    
        echo "cadena";

        $var1=25;
        $cadena="esto es una cadena";

        $var1+=12;
        echo $var1;

        $una_cadena="hola";
        $unaCadena="adios";

        $var1-=17;

        echo "$var1";

        $unaCadena=45;
        echo $unaCadena;

        if(isset($cadena2)){    
            echo $cadena2;

            $real=1234.567890123345678901;
        }        
    ?>

<?php
}
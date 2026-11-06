<?php

include_once(dirname(__FILE__) . "../../../cabecera.php");
$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion 5",
        "LINK" => "index.php"
    ]
];


$res=filter_var(12, FILTER_VALIDATE_INT);

$o=[
    "options"=>[
        "min_range"=>100,
        "max_range"=>200,
        "default"=>100
    ]
];
$res=filter_var('0x81', FILTER_VALIDATE_INT, $o);

$o=[
    "options"=>[
        "min_range"=>100,
        "max_range"=>200,
        "default"=>100
    ],
    "flags"=>FILTER_FLAG_ALLOW_HEX 
];
$res=filter_var('0x81', FILTER_VALIDATE_INT, $o);


//inicializaciones
$datos = [
    "nombre" => "Moises",
    "contraseña" => "123456",
    "fechaNac" => "16/08/2005",
    "fechaCarnet" => "10/02/2020",
    "horaLevantarse" => "20:00:00"
];
$errores = [];


if (isset($_POST["cr"])) 
    {
        //verifico nombre
        $nombre = "";
        if (isset($_POST["nombre"])) {
            $nombre = $_POST["nombre"];
            $nombre = mb_strtolower(mb_trim($nombre));
        }
        if ($nombre == "")
            $errores["nombre"][] = "Debe indicarse un nombre";
        if (mb_strlen($nombre) > 20)
            $errores["nombre"][] = "El nombre no puede tener mas de 20 caracteres";
        $datos["nombre"] = $nombre;
        
        //verifico precio
        $precio = 0;
        if (isset($_POST["precio"])) {
            $precio = floatval($_POST["precio"]);
        }
        if ($precio <= 0)
            {
                $errores["precio"][] = "Debe indicarse un precio";
                $precio=10;
            }
        $datos["precio"] = $precio;


        if (!$errores) //no hay errores hago la insercion
        {
            //codigo para el nuevo articulo
            $codigo = 1; //codigo
            //se guarda el articulo
            //ir a ver el articulo insertado
            //header("location: verArticulo.php?id=$codigo");
            exit;
        }
    }
    
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion 5 - Primer Trimestre", $barraUbi);
cuerpo($datos, $errores);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo(array $datos, array $errores)
{
    // Enlace a pruebas de metodos de la librerias
    echo "<a href='pruebaLibrerias.php'  style='color: Red; font-weight: bold;
    position: relative; left: 75%;'>Prueba de librerias</a>";
?>
    <br>
    <br>
    <br>
<?php
    formulario($datos, $errores);
}


function formulario(array $datos, array $errores)
{
    if ($errores) { //mostrar los errores
        echo "<div class='error'>";
        foreach ($errores as $clave => $valor) {
            foreach ($valor as $error)
                echo "$clave => $error<br>" . PHP_EOL;
        }
        echo "</div><br><br>";
    }
?>
    <form action="" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre"
            value="<?= $datos["nombre"]; ?>" size=21
            maxlength="25"><br>
        <?php
             if (isset($errores["nombre"]))
                {
                    echo "<div class='error'>";
                    foreach ($errores["nombre"] as $error)
                        {
                            echo "$error<br>".PHP_EOL;
                        }
                    echo "</div>";
                }?>
        <label for="contraseña">Contraseña: </label>
        <input type="password" name="contraseña" id="contraseña"
            value="<?php echo $datos["contraseña"]; ?>" size=20
            maxlength="15"><br>
        <?php
             if (isset($errores["contraseña"]))
                {
                    echo "<div class='error'>";
                    foreach ($errores["contraseña"] as $error)
                        {
                            echo "$error<br>".PHP_EOL;
                        }
                    echo "</div>";
                }?>
        <label for="fechaNac">Fecha de nacimiento: </label>
        <input type="text" name="fechaNac" id="fechaNac"
            value="<?= $datos["fechaNac"]; ?>" size=20
            maxlength="25"><br>
            <label for="fechaCarnet">Fecha de carnet: 
        <input type="number" name="dia-fechaCarnet" id="dia-fechaCarnet" placeholder="Dia">
        <input type="number" name="mes-fechaCarnet" id="mes-fechaCarnet" placeholder="Mes">
        <input type="number" name="año-fechaCarnet" id="año-fechaCarnet" placeholder="Año">        
            <br>
            </label>
        <label for="horaLevantarse">Hora de levantarse: <input type="text" name="horaLevantarse" id="horaLevantarse"
            value="<?= $datos["horaLevantarse"]; ?>" size=20
            maxlength="25"><br>
        </label>
    </form>
<?php
}
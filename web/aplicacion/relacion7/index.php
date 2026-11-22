<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");
include_once(dirname(__FILE__) . "/../../scripts/clases/DatosPunto.php");

$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion 7",
        "LINK" => "index.php"
    ]
];

/////////////////////////////////
$fichero = "puntos_192_168_2_219_chrome.dat";

if (file_exists($fichero)) {
    $lineas = file($fichero, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lineas as $linea) {
        $campos = explode(';', $linea);
        if (count($campos) != 4) {
            continue;
        }
        [$x, $y, $color, $grosor] = $campos;

        try {
            $puntos[] = new Punto((int)$x, (int)$y, mb_trim($color), (int)$grosor);
        } catch (Exception $ex) {
            echo "Linea ignorada (" . $linea . "): " . $ex->getMessage() . "<br>" . PHP_EOL;
        }
    }
}


/////////////////////////////////

$nombreFicher = "../../imagenes/puntos/192_168_2_119_chrome.jpg";

//$ip = str_replace(".", "_", $_SERVER["REMOTE_ADDR"]);

$imagen = imagecreatetruecolor(250, 250);


function dibujarLienzo(GdImage $imagen)
{
    $blanco = imagecolorallocate($imagen, 255, 255, 255);
    $azul = imagecolorallocate($imagen, 0, 0, 250);

    imagefill($imagen, 0, 0, $blanco);

    imagesetthickness($imagen, 10);
    imagerectangle($imagen, 5, 5, 245, 245, $azul);
}

function dibujarX(GdImage $imagen, int $x, int $y, string $color, int $grosor)
{
    $rgb = Punto::COLORES[$color]["rgb"];
    $colorDefinido = imagecolorallocate($imagen, $rgb[0], $rgb[1], $rgb[2]);

    imagesetthickness($imagen, $grosor);

    imageline($imagen, $x - 5, $y - 5, $x + 5, $y + 5, $colorDefinido);
    imageline($imagen, $x - 5, $y + 5, $x + 5, $y - 5, $colorDefinido);
}

function leeCadena(string $clave): string
{
    if (isset($_POST[$clave]) && is_string($_POST[$clave])) {
        return mb_trim($_POST[$clave]);
    }
    return "";
}

$datos = [
    "x" => "",
    "y" => "",
    "color" => "",
    "grosor" => ""
];

$errores = [];
$guardado = false;
$errorBorrar = "";
$borrado = false;

if (isset($_POST["guardar"])) {
    $datos["x"] = leeCadena("x");

    $datos["x"] = leeCadena("x");
    $x = filter_var($datos["x"], FILTER_VALIDATE_INT);
    if ($x === false || !validaEntero($x, 0, 20000, 0)) {
        $errores["x"][] = "La coordenada x debe ser un entero entre 0 y 20000";
    }

    $datos["y"] = leeCadena("y");
    $y = filter_var($datos["y"], FILTER_VALIDATE_INT);
    if ($y === false || !validaEntero($y, 0, 20000, 0)) {
        $errores["y"][] = "La coordenada y debe ser un entero entre 0 y 20000";
    }

    $datos["color"] = leeCadena("color");
    $color = $datos["color"];
    if (!validaRango($color, Punto::COLORES, 2)) {
        $errores["color"][] = "Debe seleccionarse un color";
    }

    $datos["grosor"] = leeCadena("grosor");
    $grosor = filter_var(leeCadena("grosor"), FILTER_VALIDATE_INT);
    if ($grosor === false || !validaRango($grosor, Punto::GROSORES, 2)) {
        $errores["grosor"][] = "Debe seleccionarse un grosor";
    }

    if (!$errores) {
        $puntoCreado = new Punto($x, $y, $color, $grosor);
        array_push($puntos, $puntoCreado);
        $guardado = true;
        $datos = [
            "x" => "",
            "y" => "",
            "color" => "",
            "grosor" => 0
        ];
        $archivo = fopen($fichero, "a+");

        if($archivo!=false){
            fwrite($archivo, $puntoCreado->getX() . ";" . $puntoCreado->getY().";" . 
            $puntoCreado->getColor() . ";" . $puntoCreado->getGrosor() . PHP_EOL);
        }
        fclose($archivo);
    }else{
        $errores["general"][] = "No se pudo abrir el archivo";
    }
}

if (isset($_POST["borrarPunto"])) {
    $indiceBorrar = false;
    if (isset($_POST["borrar"]) && is_string($_POST["borrar"])) {
        $indiceBorrar = filter_var($_POST["borrar"], FILTER_VALIDATE_INT);
    }
    if ($indiceBorrar === false || !array_key_exists($indiceBorrar, $puntos)) {
        $errorBorrar = "Debe seleccionarse un punto valido";
    } else {
        unset($puntos[$indiceBorrar]);
        $borrado = true;
    }
}

if ($borrado) {
    $lineasNuevas = [];
    foreach ($puntos as $punto) {
        $lineasNuevas[] = $punto->getX() . ";" . $punto->getY() . ";" . $punto->getColor() . ";" . $punto->getGrosor();
    }
    file_put_contents($fichero, implode(PHP_EOL, $lineasNuevas) . PHP_EOL);
}

dibujarLienzo($imagen);
foreach ($puntos as $punto) {
    dibujarX($imagen, $punto->getX(), $punto->getY(), $punto->getColor(), $punto->getGrosor());
}
imagejpeg($imagen, $nombreFicher);

//dibuja la plantilla de vista
inicioCabecera("Relacion 7");
cabecera();
finCabecera();

inicioCuerpo("Relacion 7 - Primer Trimestre", $barraUbi);
cuerpo($puntos, $datos, $errores, $guardado, $borrado, $errorBorrar, $nombreFicher);
finCuerpo();
// vista
function cabecera() {}

//vista


function cuerpo(array $puntos, array $datos, array $errores, bool $guardado, bool $borrado, string $errorBorrar, string $nombreFicher)
{
    formulario($datos, $errores, $puntos, $errorBorrar, $nombreFicher);

    if ($guardado == true) {
        echo "<h3>Punto guardado correctamente</h3>" . PHP_EOL;
    }
    if ($borrado) {
        echo "<h3>Punto borrado correctamente</h3>" . PHP_EOL;
    }
}

function muestraErrores(array $errores, string $campo)
{
    if (isset($errores[$campo])) {
        echo "<div class='error'>";
        foreach ($errores[$campo] as $error) {
            echo $error . PHP_EOL;
        }

        echo "</div>";
    }
}

function formulario(array $datos, array $errores, array $puntos, string $errorBorrar, string $nombreFicher)
{
?>
<br>
    <form action="index.php" method="post">
        <label for="x">Coordenada X: </label>
        <input type="text" name="x" id="x" value="<?= $datos["x"]; ?>"> <br>
        <?php muestraErrores($errores, "x"); ?>
        <label for="y">Coordenada Y: </label>
        <input type="text" name="y" id="y" value="<?= $datos["y"]; ?>">
        <?php muestraErrores($errores, "y"); ?>

        <br>
        <label for="color">Colores: </label>
        <select name="color" id="color">
            <option value="">Seleccione color</option>
            <?php
            foreach (Punto::COLORES as $clave => $info) {
                $marcado = ($datos["color"] === $clave) ? "selected" : "";
                echo "<option value='" . $clave . "' " . $marcado . ">" . $info["nombre"] . "</option>" . PHP_EOL;
            }
            ?>
        </select>
        <?php muestraErrores($errores, "color"); ?>
        <br>

        Grosor:
        <?php
        foreach (Punto::GROSORES as $valor => $texto) {
            $marcado = ($datos["grosor"] === $valor) ? "checked" : "";
            echo "<label><input type='radio' name='grosor' value='" . $valor . "' " . $marcado . ">" . $texto . "</label> " . PHP_EOL;
        }
        ?>
        <br>
        <?php muestraErrores($errores, "grosor"); ?>

        <br>
        <input type="submit" name="guardar" value="Guardar">
    </form>

    <form action="index.php" method="post">
        <select name="borrar" id="borrar">
            <option value="">Seleccione un punto</option>
            <?php
            foreach ($puntos as $indice => $punto) {
                echo "<option value='" . $indice . "'>"
                    . $indice . " - " . $punto->getX() . " - " . $punto->getY()
                    . " - " . Punto::COLORES[$punto->getColor()]["nombre"]
                    . " - " . Punto::GROSORES[$punto->getGrosor()]
                    . "</option>" . PHP_EOL;
            }
            ?>
        </select>
        <input type="submit" name="borrarPunto" value="Borrar">
        <?php
        if ($errorBorrar != "") {
            echo "<div class='error'>" . $errorBorrar . "</div>";
        }
        ?>
    </form>

    <textarea rows="5" cols="45" style="text-align: center;">
        <?php
        foreach ($puntos as $indice => $punto) {
            echo $punto->getX() . " - " . $punto->getY() .
                " - " . Punto::COLORES[$punto->getColor()]["nombre"] . " - " .
                Punto::GROSORES[$punto->getGrosor()] . PHP_EOL;
        }
        ?>
    </textarea>
    <br><br>
    <img src="<?= $nombreFicher ?>"
        alt="Imagen de puntos">
    <br>
    <a href="?descargar">Descargar</a>

<?php

}
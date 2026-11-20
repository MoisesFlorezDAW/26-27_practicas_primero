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


$fichero = "datos/puntos.dat";

if (file_exists($fichero)) {

    $fp = fopen($fichero, "r");

    while (($datos = fgetcsv($fp, 0, ";")) !== false) {

        if (count($datos) === 4) {

            $puntos[] = new Punto(
                (int)$datos[0], // x
                (int)$datos[1], // y
                $datos[2],      // color
                (int)$datos[3]  // grosor
            );
        }
    }

    fclose($fp);
}

/////////////////////////////////

$nombreFicher = RUTABASE . "/imagenes/puntos/192_168_2_119_jpeg";

//$ip = str_replace(".", "_", $_SERVER["REMOTE_ADDR"]);

$crear = true;

if ($crear) {

    
$imagen = imagecreatetruecolor(220, 220);

// Colores
$blanco = imagecolorallocate($imagen, 255, 255, 255);
$azul   = imagecolorallocate($imagen, 0, 0, 255);

// Fondo de la imagen
imagefill($imagen, 0, 0, $blanco);

// Grosor del borde
imagesetthickness($imagen, 5);

// Rectángulo blanco con borde azul grueso
imagerectangle($imagen, 10, 10, 210, 210, $azul);

    // Guardar la imagen
    imagejpeg($imagen, $nombreFicher);
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
        $errores["colores"][] = "Debe seleccionarse un color";
    }

    $datos["grosor"] = leeCadena("grosor");
    $grosor = filter_var(leeCadena("grosor"), FILTER_VALIDATE_INT);
    if ($grosor === false || !validaRango($grosor, Punto::GROSORES, 2)) {
        $errores["grosor"][] = "Debe seleccionarse un grosor";
    }

    if (!$errores) {
        //$puntos[] = new Punto($x, $y, $color, $grosor);
        array_push($puntos, new Punto($x, $y, $color, $grosor));
        $guardado = true;
        $datos = [
            "x" => "",
            "y" => "",
            "color" => "",
            "grosor" => 0
        ];
    }
}

if(isset($_POST["descargar"])){

}

//dibuja la plantilla de vista
inicioCabecera("Relacion 7");
cabecera();
finCabecera();

inicioCuerpo("Relacion 7 - Primer Trimestre", $barraUbi);
cuerpo($puntos, $datos, $errores, $guardado); // llamo a la vista
finCuerpo();
// vista
function cabecera() {}

//vista
function cuerpo(array $puntos, array $datos, array $errores, bool $guardado)
{
    formulario($datos, $errores, $puntos);

    if ($guardado == true) {
        echo "<h3>Punto guardado correctamente</h3>" . PHP_EOL;
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

function formulario(array $datos, array $errores, array $puntos)
{
?>
    <form action="index.php" method="post">
        <label for="puntoX">Coordenada X: </label>
        <input type="text" name="x" id="x" value="<?= $datos["x"]; ?>" required> <br>
        <?php muestraErrores($errores, "x"); ?>
        <label for="puntoY">Coordenada Y: </label>
        <input type="text" name="y" id="y" value="<?= $datos["y"]; ?>" required>
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
    <img src="../../imagenes/puntos/192_168_2_119_chrome.jpg"
        alt="Imagen de puntos">
    <br>
    <a href="?descargar">Descargar</a>
<?php

}

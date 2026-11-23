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

$sufijo = dameSufijo();
$fichero = dirname(__FILE__) . "/puntos_" . $sufijo . ".dat";
$nombreFicher = "../../imagenes/puntos/imagen_" . $sufijo . ".jpg";
$rutaImagen = dirname(__FILE__) . "/" . $nombreFicher;

$puntos = cargaPuntos($fichero);

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
    "grosor" => 0
];

$errores = [];
$guardado = false;
$errorBorrar = "";
$borrado = false;
$mensajeSubida = "";
$anadidos = 0;

if (isset($_POST["guardar"])) {
    $datos["x"] = leeCadena("x");
    $x = filter_var($datos["x"], FILTER_VALIDATE_INT);
    if ($x === false || !validaEntero($x, 0, 500, 0)) {
        $errores["x"][] = "La coordenada x debe ser un entero entre 0 y 500";
    }

    $datos["y"] = leeCadena("y");
    $y = filter_var($datos["y"], FILTER_VALIDATE_INT);
    if ($y === false || !validaEntero($y, 0, 500, 0)) {
        $errores["y"][] = "La coordenada y debe ser un entero entre 0 y 500";
    }

    $datos["color"] = leeCadena("color");
    $color = $datos["color"];
    if (!validaRango($color, Punto::COLORES, 2)) {
        $errores["color"][] = "Debe seleccionarse un color";
    }

    $grosor = filter_var(leeCadena("grosor"), FILTER_VALIDATE_INT);
    if ($grosor === false || !validaRango($grosor, Punto::GROSORES, 2)) {
        $errores["grosor"][] = "Debe seleccionarse un grosor";
    } else {
        $datos["grosor"] = $grosor;
    }

    if (!$errores) {
        $puntoCreado = new Punto($x, $y, $color, $grosor);
        $archivo = fopen($fichero, "a+");
        if ($archivo !== false) {
            fwrite($archivo, $puntoCreado->getX() . ";" . $puntoCreado->getY() . ";" .
                $puntoCreado->getColor() . ";" . $puntoCreado->getGrosor() . PHP_EOL);
            fclose($archivo);
            $puntos[] = $puntoCreado;
            $guardado = true;
            $datos = [
                "x" => "",
                "y" => "",
                "color" => "",
                "grosor" => 0
            ];
        } else {
            $errores["general"][] = "No se pudo abrir el archivo";
        }
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
        guardaPuntos($puntos, $fichero);
    }
}

if (isset($_POST["subir"])) {
    if (!isset($_FILES["ficheroPuntos"]) || $_FILES["ficheroPuntos"]["error"] !== UPLOAD_ERR_OK) {
        $mensajeSubida = "No se ha podido subir el fichero";
    } elseif (mb_strtolower(pathinfo($_FILES["ficheroPuntos"]["name"], PATHINFO_EXTENSION)) !== "dat") {
        $mensajeSubida = "El fichero debe tener extension dat";
    } elseif (!is_uploaded_file($_FILES["ficheroPuntos"]["tmp_name"])) {
        $mensajeSubida = "El fichero no es valido";
    } else {
        $lineas = file($_FILES["ficheroPuntos"]["tmp_name"], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $descartados = 0;
        foreach ($lineas as $linea) {
            $punto = leeLineaPunto($linea);
            if ($punto === null) {
                $descartados++;
            } else {
                $puntos[] = $punto;
                $anadidos++;
            }
        }
        if ($anadidos > 0) {
            guardaPuntos($puntos, $fichero);
        }
        $mensajeSubida = "Puntos añadidos: " . $anadidos . ". Lineas descartadas: " . $descartados;
    }
}

if (!file_exists($rutaImagen) || $guardado || $borrado || $anadidos > 0) {
    $imagen = creaImagen($puntos);
    imagejpeg($imagen, $rutaImagen);
    $image=null;
}

inicioCabecera("Relacion 7");
cabecera();
finCabecera();

inicioCuerpo("Relacion 7 - Primer Trimestre", $barraUbi);
cuerpo($puntos, $datos, $errores, $guardado, $borrado, $errorBorrar, $nombreFicher, $mensajeSubida);
finCuerpo();

function cabecera() {}

function cuerpo(
    array $puntos,
    array $datos,
    array $errores,
    bool $guardado,
    bool $borrado,
    string $errorBorrar,
    string $nombreFicher,
    string $mensajeSubida
) {
    formulario($datos, $errores, $puntos, $errorBorrar, $nombreFicher);

    if ($guardado) {
        echo "<h3>Punto guardado correctamente</h3>" . PHP_EOL;
    }
    if ($borrado) {
        echo "<h3>Punto borrado correctamente</h3>" . PHP_EOL;
    }
?>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="ficheroPuntos">Subir fichero de puntos (dat): </label>
        <input type="file" name="ficheroPuntos" id="ficheroPuntos" accept=".dat">
        <input type="submit" name="subir" value="Subir">
    </form>
<?php
    if ($mensajeSubida != "") {
        echo "<div class='error'>" . $mensajeSubida . "</div>" . PHP_EOL;
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
        <input type="text" name="x" id="x" value="<?= $datos["x"]; ?>"><br>
        <?php muestraErrores($errores, "x"); ?>
        <label for="y">Coordenada Y: </label>
        <input type="text" name="y" id="y" value="<?= $datos["y"]; ?>"><br>
        <?php muestraErrores($errores, "y"); ?>

        <label for="color">Colores: </label>
        <select name="color" id="color">
            <option value="">Seleccione color</option>
            <?php
            foreach (Punto::COLORES as $clave => $info) {
                $marcado = ($datos["color"] === $clave) ? "selected" : "";
                echo "<option value='" . $clave . "' " . $marcado . ">" . $info["nombre"] . "</option>" . PHP_EOL;
            }
            ?>
        </select><br>
        <?php muestraErrores($errores, "color"); ?>

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
        <?php muestraErrores($errores, "general"); ?>
    </form>

    <form action="index.php" method="post">
        <select name="borrar" id="borrar">
            <option value="">Seleccione un punto</option>
            <?php
            foreach ($puntos as $indice => $punto) {
                echo "<option value='" . $indice . "'>"
                    . $punto->getX() . " - " . $punto->getY()
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

    <textarea rows="5" cols="45" style="text-align: center;"><?php
        foreach ($puntos as $punto) {
            echo $punto->getX() . " - " . $punto->getY() .
                " - " . Punto::COLORES[$punto->getColor()]["nombre"] . " - " .
                Punto::GROSORES[$punto->getGrosor()] . PHP_EOL;
        }
    ?></textarea>
    <br><br>
    <img src="<?= $nombreFicher ?>?v=<?= time(); ?>" alt="Imagen de puntos">
    <br>
    <a href="imagen.php">Descargar</a>
<?php
}
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
    $x = filter_var($datos["x"], FILTER_VALIDATE_INT);
    if ($x === false || !validaEntero($x, 0, 20000, 100)) {
        $errores["x"][] = "La coordenada x debe ser un entero entre 0 y 20000";
    }

    $datos["y"] = leeCadena("x");
    $y = filter_var($datos["x"], FILTER_VALIDATE_INT);
    if ($x === false || !validaEntero($x, 0, 20000, 100)) {
        $errores["x"][] = "La coordenada y debe ser un entero entre 0 y 20000";
    }

    $datos["color"] = leeCadena("color");
    $color = $datos["color"];
    if (!validaRango($color, Punto::COLORES, 2)) {
        $errores["colores"][] = "Debe seleccionarse un color";
    }

    $grosor = filter_var(leeCadena("grosor"), FILTER_VALIDATE_INT);
    if ($grosor === false || !validaRango($grosor, Punto::GROSORES, 2)) {
        $errores["grosor"][] = "Debe seleccionarse un grosor";
    }

    if (!$errores) {
        $puntos = [$x, $y, $color, $grosor];
        $guardado = true;
        $datos = [
            "x" => "",
            "y" => "",
            "color" => "",
            "grosor" => 0
        ];
    }
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
    if ($guardado) {
        echo "<h3>Punto guardado correctamente</h3>" . PHP_EOL;}

    formulario($datos, $errores);

    almacenaPuntos($puntos);
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

function formulario(array $datos, array $errores)
{
?>
    <form action="post">
        <label for="puntoX">Coordenada X: </label>
        <input type="text" name="x" id="x" value="<?= $datos["x"]; ?>" required> <br>
        <?php muestraErrores($errores, "x"); ?>
        <label for="puntoY">Coordenada Y: </label>
        <input type="text" name="x" id="y" value="<?= $datos["y"]; ?>" required>
        <?php muestraErrores($errores, "y"); ?>

        <br>
        <label for="colores">Colores: </label>
        <select name="colores" id="color">
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
<?php
}

function almacenaPuntos($puntos){
    echo "<textarea 
    id='comentario'
    rows='5' 
    cols='40' 
    placeholder='Puntos...'>"; 
        foreach($puntos as $indice => $punto){
            echo $indice . " - " . $punto->getX() . " - ". $punto->getY() . 
            " - " . Punto::COLORES[$punto->getColor()]["nombre"] . " - " . 
            Punto::GROSORES[$punto->getGrosor()] . PHP_EOL;
        }

    echo "</textarea>" . PHP_EOL;

}

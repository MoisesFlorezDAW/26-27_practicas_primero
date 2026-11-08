<?php
include_once(dirname(__FILE__) . "../../../cabecera.php");
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");
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

// Listas de opciones (se usan en el controlador y en la vista)
function listaEstados(): array
{
    return [1 => "Estudiante", 2 => "En paro", 3 => "Trabajando", 4 => "Jubilado"];
}

function listaEstudios(): array
{
    return [
        0 => "Sin estudios",
        1 => "Primaria",
        2 => "Secundaria",
        3 => "Bachillerato",
        4 => "Ciclo formativo",
        5 => "Universitario"
    ];
}

function leeEntero(string $clave): ?int
{
    if (!isset($_POST[$clave]) || !is_string($_POST[$clave])) {
        return null;
    }
    $r = filter_var(mb_trim($_POST[$clave]), FILTER_VALIDATE_INT);
    return $r === false ? null : $r;
}

//inicializaciones sin errores
$datos = [
    "nombre" => "Moises",
    "contraseña" => "Moises123$",
    "fechaNac" => "16/08/2005",
    "diaCarnet" => "12",
    "mesCarnet" => "2",
    "anioCarnet" => "2025",
    "horaLevantarse" => "06:00:00",
    "estado" => 1,
    "estudios" => [3],
    "hermanos" => 2,
    "sueldo" => 1100.0
];
$errores = [];
$correcto = false;

if (isset($_POST["cr"])) {

    // ---------- NOMBRE ----------
    $nombre = "";
    if (isset($_POST["nombre"]) && is_string($_POST["nombre"])) {
        $nombre = mb_strtoupper(mb_trim($_POST["nombre"]));
    }
    if ($nombre == "") {
        $errores["nombre"][] = "Debe indicarse un nombre";
    } else {
        if (!validaCadena($nombre, 25, mb_substr($nombre, 0, 25))) {
            $errores["nombre"][] = "El nombre no puede tener mas de 25 caracteres";
        }
        if (mb_substr($nombre, 0, 1) === "H") {
            $errores["nombre"][] = "El nombre no puede empezar por H";
        }
    }
    $datos["nombre"] = $nombre;

    // ---------- CONTRASEÑA ----------
    $clave = "";
    if (isset($_POST["contraseña"]) && is_string($_POST["contraseña"])) {
        $clave = $_POST["contraseña"];
    }
    // 8-15 caracteres, sin espacios, con minuscula, mayuscula, cifra y uno de $_-;<>@
    $exprClave = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$_\-;<>@])\S{8,15}$/';
    if ($clave == "") {
        $errores["contraseña"][] = "Debe indicarse una contraseña";
    } else if (!validaExpresion($clave, $exprClave, "")) {
        $errores["contraseña"][] = "La contraseña debe tener entre 8 y 15 caracteres, sin espacios, "
            . "con al menos una mayuscula, una minuscula, una cifra y un caracter especial (\$_-;<>@)";
    }
    $datos["contraseña"] = $clave;

    // ---------- FECHA DE NACIMIENTO ----------
    $fechaNac = "";
    if (isset($_POST["fechaNac"]) && is_string($_POST["fechaNac"])) {
        $fechaNac = $_POST["fechaNac"];
    }
    $nacimiento = null;
    if (validaFecha($fechaNac, "")) {
        $nacimiento = DateTime::createFromFormat("!d/m/Y", $fechaNac);
    } else {
        $errores["fechaNac"][] = "La fecha de nacimiento no es valida (formato dd/mm/aaaa)";
    }
    $datos["fechaNac"] = $fechaNac;

    // ---------- FECHA DE CARNET ----------
    $dia = leeEntero("diaCarnet");
    $mes = leeEntero("mesCarnet");
    $anio = leeEntero("anioCarnet");
    $datos["diaCarnet"] = "";
    $datos["mesCarnet"] = "";
    $datos["anioCarnet"] = "";

    if ($dia === null || $mes === null || $anio === null) {
        $errores["fechaCarnet"][] = "Debe indicarse dia, mes y año como numeros enteros";
    } else {
        $okDia = validaEntero($dia, 1, 31, 0);
        $okMes = validaEntero($mes, 1, 12, 0);
        $okAnio = validaEntero($anio, 1900, 2100, 0);
        if (!$okDia || !$okMes || !$okAnio) {
            $errores["fechaCarnet"][] = "Dia (1-31), mes (1-12) o año (1900-2100) fuera de rango";
        } else {
            $datos["diaCarnet"] = $dia;
            $datos["mesCarnet"] = $mes;
            $datos["anioCarnet"] = $anio;

            // Se compone una unica fecha con los tres elementos
            $fechaCarnet = sprintf("%02d/%02d/%04d", $dia, $mes, $anio);
            if (!validaFecha($fechaCarnet, "")) {
                $errores["fechaCarnet"][] = "La fecha de carnet no existe";
            } else if ($nacimiento !== null) {
                // Mayor de edad: (carnet - 18 años) no puede ser anterior al nacimiento
                $carnet = date_create_from_format("!d/m/Y", $fechaCarnet);
                date_sub($carnet, date_interval_create_from_date_string("18 years"));
                $intervalo = date_diff($nacimiento, $carnet);
                if (date_interval_format($intervalo, "%R") == "-") {
                    $errores["fechaCarnet"][] = "La fecha de carnet es anterior a cumplir 18 años";
                }
            }
        }
    }

    // ---------- HORA DE LEVANTARSE ----------
    $hora = "";
    if (isset($_POST["horaLevantarse"]) && is_string($_POST["horaLevantarse"])) {
        $hora = $_POST["horaLevantarse"];
    }
    if (!validaHora($hora, "")) {
        $errores["horaLevantarse"][] = "La hora no es valida (formato hh:mm:ss)";
    }
    $datos["horaLevantarse"] = $hora;

    // ---------- ESTADO ----------
    $estado = leeEntero("estado");
    if ($estado === null) {
        $errores["estado"][] = "Debe indicarse un estado";
        $datos["estado"] = 0;
    } elseif (!validaRango($estado, listaEstados(), 2)) {
        $errores["estado"][] = "El estado seleccionado no es correcto";
        $datos["estado"] = 0;
    } else {
        $datos["estado"] = $estado;
    }

    // ---------- ESTUDIOS ----------
    $estudios = [];
    if (isset($_POST["estudios"]) && is_array($_POST["estudios"])) {
        foreach ($_POST["estudios"] as $e) {
            $e = is_string($e) ? filter_var($e, FILTER_VALIDATE_INT) : false;
            if ($e === false || !validaRango($e, listaEstudios(), 2)) {
                $errores["estudios"][] = "Se ha marcado una opcion de estudios incorrecta";
            } else {
                $estudios[] = $e;
            }
        }
    }
    $estudios = array_values(array_unique($estudios));
    if (!isset($_POST["estudios"]) || ($_POST["estudios"] == [] && !isset($errores["estudios"]))) {
        $errores["estudios"][] = "Debe seleccionarse al menos un estudio";
    }
    if (in_array(0, $estudios, true)) {
        $estudios = [0]; // Sin estudios: se desmarca el resto
    }
    $datos["estudios"] = $estudios;

    // ---------- HERMANOS ----------
    $hermanos = leeEntero("hermanos");
    if ($hermanos === null) {
        $errores["hermanos"][] = "El numero de hermanos debe ser un entero";
        $hermanos = 0;
    } elseif (!validaEntero($hermanos, 0, 20, 0)) {
        $errores["hermanos"][] = "El numero de hermanos debe estar entre 0 y 20";
    }
    $datos["hermanos"] = $hermanos;

    // ---------- SUELDO ----------
    $sueldo = false;
    if (isset($_POST["sueldo"]) && is_string($_POST["sueldo"])) {
        $sueldo = filter_var(mb_ereg_replace(",", ".", mb_trim($_POST["sueldo"])), FILTER_VALIDATE_FLOAT);
    }
    if ($sueldo === false) {
        $errores["sueldo"][] = "El sueldo debe ser un numero";
        $sueldo = 1100.0;
    } elseif (!validaReal($sueldo, 1000.0, 150000.0, 1100.0)) {
        $errores["sueldo"][] = "El sueldo debe estar entre 1000 y 150000 €";
    }
    $datos["sueldo"] = $sueldo;

    // ---------- RESULTADO ----------
    $correcto = !$errores;
}

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion 5 - Primer Trimestre", $barraUbi);
cuerpo($datos, $errores, $correcto);  //llamo a la vista
finCuerpo();
function cabecera() {}
function muestraErrores(array $errores, string $campo)
{
    if (isset($errores[$campo])) {
        echo "<div class='error'>";
        foreach ($errores[$campo] as $error) {
            echo $error . "<br>" . PHP_EOL;
        }
        echo "</div>";
    }
}

//vista
function resumen(array $datos)
{
    echo "<h3>Datos introducidos</h3>" . PHP_EOL;
    echo "Nombre: " . $datos["nombre"] . "<br>" . PHP_EOL;
    echo "Contraseña: " . mb_str_pad("", mb_strlen($datos["contraseña"]), "*") . "<br>" . PHP_EOL;
    echo "Fecha de nacimiento: " . $datos["fechaNac"] . "<br>" . PHP_EOL;
    echo "Fecha de carnet: " . $datos["diaCarnet"] . "/" . $datos["mesCarnet"] . "/" . $datos["anioCarnet"] . "<br>" . PHP_EOL;
    echo "Hora de levantarse: " . $datos["horaLevantarse"] . "<br>" . PHP_EOL;
    echo "Estado: " . $datos["estado"] . " - " . listaEstados()[$datos["estado"]] . "<br>" . PHP_EOL;

    echo "Estudios: <br>" . PHP_EOL;
    foreach ($datos["estudios"] as $e) {
        echo $e . " - " . listaEstudios()[$e] . "<br>" . PHP_EOL;
    }
    echo "Hermanos: " . $datos["hermanos"] . "<br>" . PHP_EOL;
    echo "Sueldo: " . number_format($datos["sueldo"], 2, ",", ".") . " €<br>" . PHP_EOL;
}

//vista
function formulario(array $datos, array $errores)
{
?>
    <form action="" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre"
            value="<?= $datos["nombre"] ?>" size="21" maxlength="40"><br>
        <?php muestraErrores($errores, "nombre"); ?>

        <label for="contraseña">Contraseña: </label>
        <input type="password" name="contraseña" id="contraseña"
            value="<?= $datos["contraseña"] ?>" size="20" maxlength="30"><br>
        <?php muestraErrores($errores, "contraseña"); ?>

        <label for="fechaNac">Fecha de nacimiento (dd/mm/aaaa): </label>
        <input type="text" name="fechaNac" id="fechaNac"
            value="<?= $datos["fechaNac"]; ?>" size="20" maxlength="25"><br>
        <?php muestraErrores($errores, "fechaNac"); ?>

        Fecha de carnet:
        <input type="number" name="diaCarnet" id="diaCarnet" placeholder="Dia" value="<?= $datos["diaCarnet"]; ?>">
        <input type="number" name="mesCarnet" id="mesCarnet" placeholder="Mes" value="<?= $datos["mesCarnet"]; ?>">
        <input type="number" name="anioCarnet" id="anioCarnet" placeholder="Año" value="<?= $datos["anioCarnet"]; ?>"><br>
        <?php muestraErrores($errores, "fechaCarnet"); ?>

        <label for="horaLevantarse">Hora de levantarse (hh:mm:ss): </label>
        <input type="text" name="horaLevantarse" id="horaLevantarse"
            value="<?= $datos["horaLevantarse"]; ?>" size="20" maxlength="25"><br>
        <?php muestraErrores($errores, "horaLevantarse"); ?>

        Estado: <br>
        <?php
        $estados = listaEstados() + [5 => "Incorrecta"];
        foreach ($estados as $codigo => $texto) {
            $marcado = ($datos["estado"] === $codigo) ? "checked" : "";
            echo "<label><input type='radio' name='estado' value='$codigo' $marcado>$codigo - $texto</label> " . PHP_EOL;
        }
        ?>
        <br>
        <?php muestraErrores($errores, "estado"); ?>

        Estudios: <br>
        <?php
        $estudios = listaEstudios() + [6 => "Incorrecta"]; // 6 solo para probar la validacion
        foreach ($estudios as $codigo => $texto) {
            $marcado = in_array($codigo, $datos["estudios"], true) ? "checked" : "";
            echo "<label><input type='checkbox' name='estudios[]' value='$codigo' $marcado>$codigo - $texto</label> " . PHP_EOL;
        }
        ?>
        <br>
        <?php muestraErrores($errores, "estudios"); ?>

        <label for="hermanos">Hermanos: </label>
        <input type="number" name="hermanos" id="hermanos" value="<?= $datos["hermanos"]; ?>"><br>
        <?php muestraErrores($errores, "hermanos"); ?>

        <label for="sueldo">Sueldo (€): </label>
        <input type="text" name="sueldo" id="sueldo" value="<?= $datos["sueldo"]; ?>"><br>
        <?php muestraErrores($errores, "sueldo"); ?>

        <br>
        <input type="submit" name="cr" value="Enviar">
    </form>
<?php
}


//vista
function cuerpo(array $datos, array $errores, bool $correcto)
{
    // Enlace a pruebas de metodos de la librerias
    echo "<a href='pruebaLibrerias.php'  style='color: Red; font-weight: bold;
    position: relative; left: 75%;'>Prueba de librerias</a>";
    echo "<br><br><br>";

    if ($correcto) {
        resumen($datos);
    } else {
        formulario($datos, $errores);
    }
}

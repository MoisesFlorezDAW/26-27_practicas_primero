<?php
require_once dirname(__FILE__) . "/../clases/Punto.php";

$puntos = [];

function dameIp(): string
{
    $ip = "desconocida";
    if (isset($_SERVER["REMOTE_ADDR"]) && is_string($_SERVER["REMOTE_ADDR"])) {
        $ip = $_SERVER["REMOTE_ADDR"];
    }
    return mb_ereg_replace("[^0-9a-zA-Z]", "_", $ip);
}

function dameNavegador(): string
{
    $agente = "";
    if (isset($_SERVER["HTTP_USER_AGENT"]) && is_string($_SERVER["HTTP_USER_AGENT"])) {
        $agente = $_SERVER["HTTP_USER_AGENT"];
    }
    if (mb_stripos($agente, "edg") !== false) {
        return "edge";
    }
    if (mb_stripos($agente, "opr") !== false || mb_stripos($agente, "opera") !== false) {
        return "opera";
    }
    if (mb_stripos($agente, "chrome") !== false) {
        return "chrome";
    }
    if (mb_stripos($agente, "firefox") !== false) {
        return "firefox";
    }
    if (mb_stripos($agente, "safari") !== false) {
        return "safari";
    }
    return "otro";
}

function dameSufijo(): string
{
    return mb_strtolower(dameIp() . "_" . dameNavegador());
}

function leeLineaPunto(string $linea): ?Punto
{
    $campos = mb_split(";", $linea);
    if (count($campos) != 4) {
        return null;
    }
    $x = filter_var(mb_trim($campos[0]), FILTER_VALIDATE_INT);
    $y = filter_var(mb_trim($campos[1]), FILTER_VALIDATE_INT);
    $color = mb_trim($campos[2]);
    $grosor = filter_var(mb_trim($campos[3]), FILTER_VALIDATE_INT);
    if ($x === false || $y === false || $grosor === false) {
        return null;
    }
    try {
        return new Punto($x, $y, $color, $grosor);
    } catch (Exception $ex) {
        return null;
    }
}

function cargaPuntos(string $fichero): array
{
    $puntos = [];
    if (file_exists($fichero)) {
        $lineas = file($fichero, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lineas as $linea) {
            $punto = leeLineaPunto($linea);
            if ($punto !== null) {
                $puntos[] = $punto;
            }
        }
    }
    return $puntos;
}

function guardaPuntos(array $puntos, string $fichero): bool
{
    $lineas = [];
    foreach ($puntos as $punto) {
        $lineas[] = $punto->getX() . ";" . $punto->getY() . ";" . $punto->getColor() . ";" . $punto->getGrosor();
    }
    $texto = $lineas ? implode(PHP_EOL, $lineas) . PHP_EOL : "";
    return file_put_contents($fichero, $texto) !== false;
}

function creaImagen(array $puntos): GdImage
{
    $imagen = imagecreatetruecolor(250, 250);
    $blanco = imagecolorallocate($imagen, 255, 255, 255);
    $azul = imagecolorallocate($imagen, 0, 0, 250);

    imagefill($imagen, 0, 0, $blanco);
    imagesetthickness($imagen, 10);
    imagerectangle($imagen, 5, 5, 245, 245, $azul);

    foreach ($puntos as $punto) {
        $rgb = Punto::COLORES[$punto->getColor()]["rgb"];
        $color = imagecolorallocate($imagen, $rgb[0], $rgb[1], $rgb[2]);
        $x = $punto->getX();
        $y = $punto->getY();
        imagesetthickness($imagen, $punto->getGrosor());
        imageline($imagen, $x - 5, $y - 5, $x + 5, $y + 5, $color);
        imageline($imagen, $x - 5, $y + 5, $x + 5, $y - 5, $color);
    }
    return $imagen;
}
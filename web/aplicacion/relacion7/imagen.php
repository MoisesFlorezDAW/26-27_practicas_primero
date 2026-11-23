<?php
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");
include_once(dirname(__FILE__) . "/../../scripts/clases/DatosPunto.php");

$sufijo = dameSufijo();
$puntos = cargaPuntos(dirname(__FILE__) . "/puntos_" . $sufijo . ".dat");

$imagen = creaImagen($puntos);

header("Content-Type: image/jpeg");
header("Content-Disposition: attachment; filename=\"imagen_" . $sufijo . ".jpg\"");
imagejpeg($imagen);
$imagen=null;
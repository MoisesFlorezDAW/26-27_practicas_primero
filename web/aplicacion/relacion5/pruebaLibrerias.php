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
    ],
    [
        "TEXTO" => "Prueba Librerias",
        "LINK" => "pruebaLibrerias.php"
    ]
];

include_once("val_filter.php");
include_once("val_normal.php");

//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion 5 - Primer Trimestre", $barraUbi);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
//vista
//vista
function cuerpo()
{
    /**
     * validaEntero
     */
    echo "<p style='color: blue'>PRUEBA VAL_NORMAL - validaEntero (entero entre 0 y 120, defecto 18)<br><p>" . PHP_EOL;
    $edad = 25;
    $edadError = 130;
    if (\VAL_NORMAL\validaEntero($edad, 0, 120, 18)) {
        echo "Edad valida: " . $edad . "<br>" . PHP_EOL;
    } else {
        echo "Edad incorrecta. Valor asignado: " . $edad . "<br>" . PHP_EOL;
    }
    if (\VAL_NORMAL\validaEntero($edadError, 0, 120, 18)) {
        echo "Edad valida: " . $edadError . "<br>" . PHP_EOL;
    } else {
        echo "Edad incorrecta. (edad = 130) edad por defecto: " . $edadError . "<br>" . PHP_EOL;
    }

    echo "<p style='color: blue'>PRUEBA VAL_FILTER - validaEntero<br><p>" . PHP_EOL;
    $edad = 25;
    $edadError = 130;
    if (\VAL_FILTER\validaEntero($edad, 0, 120, 18)) {
        echo "Edad valida: " . $edad . "<br>" . PHP_EOL;
    } else {
        echo "Edad incorrecta. Valor asignado: " . $edad . "<br>" . PHP_EOL;
    }
    if (\VAL_FILTER\validaEntero($edadError, 0, 120, 18)) {
        echo "Edad valida: " . $edadError . "<br>" . PHP_EOL;
    } else {
        echo "Edad incorrecta. (edad = 130) edad por defecto: " . $edadError . "<br>" . PHP_EOL;
    }

    /**
     * validaReal
     */
    echo "<p style='color: blue'>PRUEBA VAL_NORMAL - validaReal (real entre 0 y 30, defecto 10.0)<br><p>" . PHP_EOL;
    $dinero = 23.65;
    $dineroFuera = 40.0;
    if (\VAL_NORMAL\validaReal($dinero, 0, 30, 10.0)) {
        echo "Cantidad valida: " . $dinero . "<br>" . PHP_EOL;
    } else {
        echo "Cantidad incorrecta. Valor asignado: " . $dinero . "<br>" . PHP_EOL;
    }
    if (\VAL_NORMAL\validaReal($dineroFuera, 0, 30, 10.0)) {
        echo "Cantidad valida: " . $dineroFuera . "<br>" . PHP_EOL;
    } else {
        echo "Cantidad fuera de los rangos (min=0, max=30) cantidad = 40.0 - Valor por defecto: " . $dineroFuera . "<br>" . PHP_EOL;
    }

    echo "<p style='color: blue'>PRUEBA VAL_FILTER - validaReal<br><p>" . PHP_EOL;
    $dinero = 23.65;
    $dineroFuera = 40.0;
    if (\VAL_FILTER\validaReal($dinero, 0, 30, 10.0)) {
        echo "Cantidad valida: " . $dinero . "<br>" . PHP_EOL;
    } else {
        echo "Cantidad incorrecta. Valor asignado: " . $dinero . "<br>" . PHP_EOL;
    }
    if (\VAL_FILTER\validaReal($dineroFuera, 0, 30, 10.0)) {
        echo "Cantidad valida: " . $dineroFuera . "<br>" . PHP_EOL;
    } else {
        echo "Cantidad fuera de los rangos (min=0, max=30) cantidad = 40.0 - Valor por defecto: " . $dineroFuera . "<br>" . PHP_EOL;
    }

    /**
     * validaFecha
     */
    echo "<p style='color: blue'>PRUEBA VAL_NORMAL - validaFecha (dd/mm/aaaa, defecto 01/01/1970)<br><p>" . PHP_EOL;
    $fecha = "1/2/2023";
    $fechaError = "31/02/2023";
    if (\VAL_NORMAL\validaFecha($fecha, "01/01/1970")) {
        echo "Fecha valida (1/2/2023). Fecha saneada: " . $fecha . "<br>" . PHP_EOL;
    } else {
        echo "Fecha incorrecta. Valor asignado: " . $fecha . "<br>" . PHP_EOL;
    }
    if (\VAL_NORMAL\validaFecha($fechaError, "01/01/1970")) {
        echo "Fecha valida: " . $fechaError . "<br>" . PHP_EOL;
    } else {
        echo "Fecha incorrecta (31/02/2023). Fecha por defecto: " . $fechaError . "<br>" . PHP_EOL;
    }

    echo "<p style='color: blue'>PRUEBA VAL_FILTER - validaFecha<br><p>" . PHP_EOL;
    $fecha = "1/2/2023";
    $fechaError = "31/02/2023";
    if (\VAL_FILTER\validaFecha($fecha, "01/01/1970")) {
        echo "Fecha valida (1/2/2023). Fecha saneada: " . $fecha . "<br>" . PHP_EOL;
    } else {
        echo "Fecha incorrecta. Valor asignado: " . $fecha . "<br>" . PHP_EOL;
    }
    if (\VAL_FILTER\validaFecha($fechaError, "01/01/1970")) {
        echo "Fecha valida: " . $fechaError . "<br>" . PHP_EOL;
    } else {
        echo "Fecha incorrecta (31/02/2023). Fecha por defecto: " . $fechaError . "<br>" . PHP_EOL;
    }

    /**
     * validaHora
     */
    echo "<p style='color: blue'>PRUEBA VAL_NORMAL - validaHora (hh:mm:ss, defecto 00:00:00)<br><p>" . PHP_EOL;
    $hora = "0:5:1";
    $horaError = "25:00:00";
    if (\VAL_NORMAL\validaHora($hora, "00:00:00")) {
        echo "Hora valida (0:5:1). Hora saneada: " . $hora . "<br>" . PHP_EOL;
    } else {
        echo "Hora incorrecta. Valor asignado: " . $hora . "<br>" . PHP_EOL;
    }
    if (\VAL_NORMAL\validaHora($horaError, "00:00:00")) {
        echo "Hora valida: " . $horaError . "<br>" . PHP_EOL;
    } else {
        echo "Hora incorrecta (25:00:00). Hora por defecto: " . $horaError . "<br>" . PHP_EOL;
    }

    echo "<p style='color: blue'>PRUEBA VAL_FILTER - validaHora<br><p>" . PHP_EOL;
    $hora = "0:5:1";
    $horaError = "25:00:00";
    if (\VAL_FILTER\validaHora($hora, "00:00:00")) {
        echo "Hora valida (0:5:1). Hora saneada: " . $hora . "<br>" . PHP_EOL;
    } else {
        echo "Hora incorrecta. Valor asignado: " . $hora . "<br>" . PHP_EOL;
    }
    if (\VAL_FILTER\validaHora($horaError, "00:00:00")) {
        echo "Hora valida: " . $horaError . "<br>" . PHP_EOL;
    } else {
        echo "Hora incorrecta (25:00:00). Hora por defecto: " . $horaError . "<br>" . PHP_EOL;
    }

    /**
     * validaEmail
     */
    echo "<p style='color: blue'>PRUEBA VAL_NORMAL - validaEmail (defecto sin@email.com)<br><p>" . PHP_EOL;
    $email = "usuario@dominio.com";
    $emailError = "usuario@@dominio";
    if (\VAL_NORMAL\validaEmail($email, "sin@email.com")) {
        echo "Email valido: " . $email . "<br>" . PHP_EOL;
    } else {
        echo "Email incorrecto. Valor asignado: " . $email . "<br>" . PHP_EOL;
    }
    if (\VAL_NORMAL\validaEmail($emailError, "sin@email.com")) {
        echo "Email valido: " . $emailError . "<br>" . PHP_EOL;
    } else {
        echo "Email incorrecto (usuario@@dominio). Email por defecto: " . $emailError . "<br>" . PHP_EOL;
    }

    echo "<p style='color: blue'>PRUEBA VAL_FILTER - validaEmail<br><p>" . PHP_EOL;
    $email = "usuario@dominio.com";
    $emailError = "usuario@@dominio";
    if (\VAL_FILTER\validaEmail($email, "sin@email.com")) {
        echo "Email valido: " . $email . "<br>" . PHP_EOL;
    } else {
        echo "Email incorrecto. Valor asignado: " . $email . "<br>" . PHP_EOL;
    }
    if (\VAL_FILTER\validaEmail($emailError, "sin@email.com")) {
        echo "Email valido: " . $emailError . "<br>" . PHP_EOL;
    } else {
        echo "Email incorrecto (usuario@@dominio). Email por defecto: " . $emailError . "<br>" . PHP_EOL;
    }

    /**
     * validaCadena
     */
    echo "<p style='color: blue'>PRUEBA VAL_NORMAL - validaCadena (longitud maxima 10, defecto 'defecto')<br><p>" . PHP_EOL;
    $cadena = "Hola";
    $cadenaError = "Esta cadena es demasiado larga";
    if (\VAL_NORMAL\validaCadena($cadena, 10, "defecto")) {
        echo "Cadena valida: " . $cadena . "<br>" . PHP_EOL;
    } else {
        echo "Cadena incorrecta. Valor asignado: " . $cadena . "<br>" . PHP_EOL;
    }
    if (\VAL_NORMAL\validaCadena($cadenaError, 10, "defecto")) {
        echo "Cadena valida: " . $cadenaError . "<br>" . PHP_EOL;
    } else {
        echo "Cadena incorrecta (30 caracteres). Cadena por defecto: " . $cadenaError . "<br>" . PHP_EOL;
    }

    echo "<p style='color: blue'>PRUEBA VAL_FILTER - validaCadena<br><p>" . PHP_EOL;
    $cadena = "Hola";
    $cadenaError = "Esta cadena es demasiado larga";
    if (\VAL_FILTER\validaCadena($cadena, 10, "defecto")) {
        echo "Cadena valida: " . $cadena . "<br>" . PHP_EOL;
    } else {
        echo "Cadena incorrecta. Valor asignado: " . $cadena . "<br>" . PHP_EOL;
    }
    if (\VAL_FILTER\validaCadena($cadenaError, 10, "defecto")) {
        echo "Cadena valida: " . $cadenaError . "<br>" . PHP_EOL;
    } else {
        echo "Cadena incorrecta (30 caracteres). Cadena por defecto: " . $cadenaError . "<br>" . PHP_EOL;
    }

    /**
     * validaExpresion
     */
    $expresion = "/^[A-Z]{3}[0-9]{4}$/";

    echo "<p style='color: blue'>PRUEBA VAL_NORMAL - validaExpresion (3 letras mayusculas + 4 numeros, defecto XXX0000)<br><p>" . PHP_EOL;
    $codigo = "ABC1234";
    $codigoError = "abc12";
    if (\VAL_NORMAL\validaExpresion($codigo, $expresion, "XXX0000")) {
        echo "Codigo valido: " . $codigo . "<br>" . PHP_EOL;
    } else {
        echo "Codigo incorrecto. Valor asignado: " . $codigo . "<br>" . PHP_EOL;
    }
    if (\VAL_NORMAL\validaExpresion($codigoError, $expresion, "XXX0000")) {
        echo "Codigo valido: " . $codigoError . "<br>" . PHP_EOL;
    } else {
        echo "Codigo incorrecto (abc12). Codigo por defecto: " . $codigoError . "<br>" . PHP_EOL;
    }

    echo "<p style='color: blue'>PRUEBA VAL_FILTER - validaExpresion<br><p>" . PHP_EOL;
    $codigo = "ABC1234";
    $codigoError = "abc12";
    if (\VAL_FILTER\validaExpresion($codigo, $expresion, "XXX0000")) {
        echo "Codigo valido: " . $codigo . "<br>" . PHP_EOL;
    } else {
        echo "Codigo incorrecto. Valor asignado: " . $codigo . "<br>" . PHP_EOL;
    }
    if (\VAL_FILTER\validaExpresion($codigoError, $expresion, "XXX0000")) {
        echo "Codigo valido: " . $codigoError . "<br>" . PHP_EOL;
    } else {
        echo "Codigo incorrecto (abc12). Codigo por defecto: " . $codigoError . "<br>" . PHP_EOL;
    }

    /**
     * validaRango (no modifica la variable, solo devuelve true/false)
     */
    $colores = ["rojo", "verde", "azul"];
    $idiomas = ["es" => "Español", "en" => "Inglés"];

    echo "<p style='color: blue'>PRUEBA VAL_NORMAL - validaRango<br><p>" . PHP_EOL;
    if (\VAL_NORMAL\validaRango("verde", $colores, 1)) {
        echo "'verde' esta entre los valores del array<br>" . PHP_EOL;
    } else {
        echo "'verde' NO esta entre los valores del array<br>" . PHP_EOL;
    }
    if (\VAL_NORMAL\validaRango("negro", $colores, 1)) {
        echo "'negro' esta entre los valores del array<br>" . PHP_EOL;
    } else {
        echo "'negro' NO esta entre los valores del array<br>" . PHP_EOL;
    }
    if (\VAL_NORMAL\validaRango("es", $idiomas, 2)) {
        echo "'es' esta entre las claves del array<br>" . PHP_EOL;
    } else {
        echo "'es' NO esta entre las claves del array<br>" . PHP_EOL;
    }
    if (\VAL_NORMAL\validaRango("fr", $idiomas, 2)) {
        echo "'fr' esta entre las claves del array<br>" . PHP_EOL;
    } else {
        echo "'fr' NO esta entre las claves del array<br>" . PHP_EOL;
    }

    echo "<p style='color: blue'>PRUEBA VAL_FILTER - validaRango<br><p>" . PHP_EOL;
    if (\VAL_FILTER\validaRango("verde", $colores, 1)) {
        echo "'verde' esta entre los valores del array<br>" . PHP_EOL;
    } else {
        echo "'verde' NO esta entre los valores del array<br>" . PHP_EOL;
    }
    if (\VAL_FILTER\validaRango("negro", $colores, 1)) {
        echo "'negro' esta entre los valores del array<br>" . PHP_EOL;
    } else {
        echo "'negro' NO esta entre los valores del array<br>" . PHP_EOL;
    }
    if (\VAL_FILTER\validaRango("es", $idiomas, 2)) {
        echo "'es' esta entre las claves del array<br>" . PHP_EOL;
    } else {
        echo "'es' NO esta entre las claves del array<br>" . PHP_EOL;
    }
    if (\VAL_FILTER\validaRango("fr", $idiomas, 2)) {
        echo "'fr' esta entre las claves del array<br>" . PHP_EOL;
    } else {
        echo "'fr' NO esta entre las claves del array<br>" . PHP_EOL;
    }
}
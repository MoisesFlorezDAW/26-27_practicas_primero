<?php
/*5.- Crea una cadena que ocupe varias líneas (usa nowdoc o heredoc). En líneas distintas debe 
aparecer: varias etiquetas html (<>), varios números (de 1 o varias cifras) y varias  direcciones 
de correo electrónico (formato aaaa@aaaa.aa).  Define expresiones regulares 
apropiadas para localizar los distintos elementos creados (etiqueta, numero y dirección de email)
en la cadena.  Muestra  la  posición/elemento  encontrado  usando  
las  expresiones  regulares  definidas  y  la función preg_match.*/
include_once(dirname(__FILE__) . "/../../cabecera.php");
$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 2",
        "LINK" =>"index.php"
    ],
    [
        "TEXTO"=>"Ejercicio 5",
        "LINK" =>"Ejercicio5.php"
    ]
];

// Controlador
$cadena = <<<EOT
            <h1>Esto es un h1</h1>
            <span style="color: blue;">Texto en span</span>
            <span style="color: red;">321</span>
            <span style="color: red;">5</span>
            <span style="color: red;">32154</span>
            <span style="color: green;">pepeperez@gmail.com</span>
            <span style="color: green;">joserodriguez@gmail.com.es</span>

            EOT;

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 5");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 5 - Rel 2", $barraUbi);
cuerpo($cadena); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera()
{
}


function buscar($patron, $cadena)
{
    $resultado = [];
    $offset = 0;

    while (preg_match($patron, $cadena, $m, PREG_OFFSET_CAPTURE, $offset)) {
        $texto = $m[0][0];  // elemento encontrado
        $pos   = $m[0][1];  // posición donde empieza

        $resultado[] = [$pos, $texto];
        $offset = $pos + strlen($texto); // seguir buscando a partir del final
    }
    return $resultado;
}

function mostrar($titulo, $encontrados)
{
    echo "<h3>$titulo (" . count($encontrados) . ")</h3><pre>";
    foreach ($encontrados as [$pos, $texto]) {
        // htmlspecialchars para que las etiquetas se vean como texto
        echo "Posición $pos: " . htmlspecialchars($texto) . "\n";
    }
    echo "</pre>";
}

function cuerpo($cadena)
{
    // Etiqueta HTML: apertura o cierre, con atributos opcionales
    $reEtiqueta = '/<\/?[a-z][a-z0-9]*(?:\s[^>]*)?>/i';

    // Número de una o varias cifras (\b evita el "1" de "h1")
    $reNumero = '/\b\d+\b/';

    // Email con formato aaaa@aaaa.aa (admite varios niveles: .com.es)
    $reEmail = '/[a-z0-9._%+-]+@[a-z0-9-]+(?:\.[a-z]{2,})+/i';

    echo "<h3>Cadena original</h3><pre>" . htmlspecialchars($cadena) . "</pre>";

    mostrar("Etiquetas HTML", buscar($reEtiqueta, $cadena));
    mostrar("Números", buscar($reNumero, $cadena));
    mostrar("Emails", buscar($reEmail, $cadena));
}
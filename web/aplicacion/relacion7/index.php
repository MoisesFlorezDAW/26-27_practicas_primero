<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 7",
        "LINK" =>"index.php"
    ]
];

$datos = [
    "x" => "",
    "y" => "",
    "color"=>"",
    "grosor"=>""
];

//dibuja la plantilla de vista
inicioCabecera("Relacion 7");
cabecera();
finCabecera();  

inicioCuerpo("Relacion 7 - Primer Trimestre",$barraUbi);
cuerpo(); // llamo a la vista
finCuerpo();
// vista
function cabecera() {}

//vista
function cuerpo()
{
    formulario();
}

function formulario(){
    ?>
        <form action="post" style="align-items: normal;">
            <label for="puntoX">Coordenada X: </label>
            <input type="text" name="puntoX" id="puntoX" required> <br>
            <label for="puntoY">Coordenada Y: </label>
            <input type="text" name="puntoY" id="puntoY" required>

            <br><select name="colores" id="color">
                <option value="">Seleccione color</option>
                <?php
                    foreach(Punto::COLORES as $indice => $color)
                        echo "<option value='" . $indice . "' >".
                                mb_strtoupper($indice) . "</option>";
                ?>
            </select> 
            <input type="radio" name="grosor" id="grosor1">Fino
            <input type="radio" name="grosor" id="grosor2">Medio
            <input type="radio" name="grosor" id="grosor3">Gordo

            <br>
            <input type="button" value="Guardar">
        </form>
    <?php
}
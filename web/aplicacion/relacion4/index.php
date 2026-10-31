<?php
include_once(dirname(__FILE__) . "../../../cabecera.php");
$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion 4",
        "LINK" => "index.php"
    ]
];
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion 4 - Primer Trimestre", $barraUbi);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
//vista
function cuerpo()
{
    /**
     * Prueba de los puntos del 1 al 4
     */
    echo "<h2>Prueba ejercicios del 1 al 4 (Abs InstrumentoBase, Interface IFabricable, InstrumentoViento, Flauta)</h2>";
    $flauta1 = Flauta::CrearDesdeArray([
        "material" => "metal",
        "edad" => 8
    ]);

    echo $flauta1 . "<br>";
    echo $flauta1->sonido() . "<br>";
    echo $flauta1->afinar() . "<br>";

    $flauta2 = clone $flauta1;
    echo "<hr>" . $flauta2 . "<br>";

    // Objeto nuevo 1: flauta con los valores por defecto (array vacío)
    $flauta3 = Flauta::CrearDesdeArray([]);
    echo "<hr>" . $flauta3 . "<br>";

    // Prueba de métodos de InstrumentoBase y de IFabricable
    echo "<hr>Descripción de flauta3: " . $flauta3->getDescripcion() . "<br>";
    $flauta3->setDescripcion("flauta de prueba");
    echo "Nueva descripción: " . $flauta3->getDescripcion() . "<br>";

    echo "Edad de flauta3 antes de envejecer: " . $flauta3->getEdad() . "<br>";
    $flauta3->envejecer();
    echo "Edad de flauta3 después de envejecer: " . $flauta3->getEdad() . "<br>";

    echo "Orden de flauta1: " . $flauta1->getOrden() . "<br>";
    echo "Orden de flauta2 (clon): " . $flauta2->getOrden() . "<br>";
    echo "Orden de flauta3: " . $flauta3->getOrden() . "<br>";
    echo "Total de instrumentos creados: " . InstrumentoBase::getTotal() . "<br>";

    echo "Fabricación: " . $flauta3->metodoFabricacion() . "<br>";
    echo "Reciclado: " . $flauta3->metodoReciclado() . "<br>";

    // Creacion y prueba de los objetos del ejercicio 5
    $persona1 = new Persona();
    $persona2 = new Persona("Juan perez", "16/08/2003", "Calle Toronjo", "Sevilla", EstadoCivil::PAREJA);
    $persona3 = new Persona("Mario lopez", "11/04/1970", "Calle 123", "Madrid", EstadoCivil::VIUDO);
    // Objeto nuevo 2
    $persona4 = new Persona("Maria Fernandez", "25/12/1995", "Avenida del Sol", "Malaga", EstadoCivil::CASADO);

    echo "<h2>Prueba ejercicio 5 (Enum EstadoCivil, Clase Persona)</h2>";
    echo $persona1;
    echo "<hr><br>" . $persona2;
    echo "<hr><br>" . $persona3;
    echo "<hr><br>" . $persona4;

    // Prueba de getters y setters de Persona
    echo "<hr><br>Nombre de persona4: " . $persona4->getNombre() . "<br>";
    $persona4->setNombre("Maria Jesus Fernandez");
    $persona4->setLocalidad("Antequera");
    $persona4->setDomicilio("Calle Infante Don Fernando");
    $persona4->setEstado(EstadoCivil::SOLTERO);
    echo "Después de modificarla: " . $persona4 . "<br>";
    echo "Domicilio: " . $persona4->getDomicilio() . "<br>";
    echo "Fecha de nacimiento: " . $persona4->getFechaNac() . "<br>";

    // Prueba del enum
    echo "<br>Estados civiles disponibles:<br>";
    foreach (EstadoCivil::casos() as $estado) {
        echo $estado->descripcion() . " = " . $estado->valor() . "<br>";
    }

    echo"<h2>Prueba ejercicio 6 (Clase SerieFibonacci)</h2>";    
    echo "<br><span>Iterador:</span><br>";
    // Uso con el iterador
    foreach (new SerieFibonacci(10) as $valor) {
        echo "$valor &nbsp;";
    }
    // Genera: 0 1 1 2 3 5 8 13 21 34 55

    echo "<br><span>Generador estatico:</span> <br>";

    // Uso con el generador estático
    foreach (SerieFibonacci::fFibonacci(10) as $clave => $valor) {
        echo "F($clave) = $valor<br>";
    }    

    // Creacion y prueba de los objetos del Ejercicio 7
    echo "<h2>Prueba ejercicio 7 (Clase Mis propiedades)</h2>";
    $Objeto= new ClaseMisPropiedades(); 
    $Objeto->propPublica="publica"; 
    //$Objeto->_propPrivada="privada";  //no es valida al ser privada 
    $Objeto->propiedad1=25; 
    $Objeto->propiedad2="cadena de texto"; 
    echo "la propiedad 1 vale ".$Objeto->propiedad1."<br>";
    $obj = new ClaseMisPropiedades();

    $obj->propPublica = "Hola";
    $obj->propiedad1 = "valor1";
    $obj->propiedad2 = 42;

    foreach ($obj as $clave => $valor) {
        echo "$clave => $valor<br>";
    }

    // Prueba de isset y unset sobre propiedades dinámicas
    echo "<br>¿Existe propiedad1? ";
    echo isset($obj->propiedad1) ? "Sí" : "No";
    unset($obj->propiedad1);
    echo "<br>¿Existe propiedad1 tras unset? ";
    echo isset($obj->propiedad1) ? "Sí" : "No";
    echo "<br>";
}
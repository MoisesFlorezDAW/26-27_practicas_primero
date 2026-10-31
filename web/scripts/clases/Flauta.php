<?php

/**
 * Flauta: instrumento de viento fabricable. Se crea con CrearDesdeArray().
 */
final class Flauta extends InstrumentoViento implements IFabricable
{
    /**
     * @param string $material Material de la flauta
     * @param int $edad Edad en años
     */
    private function __construct(string $material = "madera", int $edad = 15)
    {
        parent::__construct($material, $edad);
    }

    /**
     * Crea una flauta a partir de un array con las claves "material" y "edad".
     *
     * @param array $datos Datos de la flauta
     * @return Flauta Nueva instancia
     */
    public static function CrearDesdeArray(array $datos): Flauta
    {
        $material = (string) ($datos["material"] ?? "madera");
        $edad = (int) ($datos["edad"] ?? 15);

        return new Flauta($material, $edad);
    }

    /**
     * @return string Sonido de la flauta
     */
    public function sonido(): string
    {
        return "Firufi Firufi";
    }

    /**
     * @return string Pasos de fabricación
     */
    public function metodoFabricacion(): string
    {
        return "Tallado del cuerpo, perforación de agujeros y ensamblado.";
    }

    /**
     * @return string Método de reciclado
     */
    public function metodoReciclado(): string
    {
        return "Separar componentes y reciclar según material.";
    }

    /**
     * Al clonar, la edad vuelve a 0 y se asigna un nuevo orden.
     *
     * @return void
     */
    public function __clone()
    {
        $this->_edad = 0;
        $this->_orden = ++self::$_contador;
    }
}
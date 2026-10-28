<?php

final class Flauta extends InstrumentoViento implements IFabricable
{
    private function __construct(
        string $material = "madera",
        int $edad = 15
    ) {
        parent::__construct($material, $edad);
    }

    public static function CrearDesdeArray(array $datos): Flauta
    {
        $material = $datos["material"] ?? "madera";
        $edad = $datos["edad"] ?? 15;

        return new Flauta($material, $edad);
    }

    public function sonido(): string
    {
        return "Tirurí tirurí";
    }

    public function metodoFabricacion(): string
    {
        return "Tallado del cuerpo, perforación de agujeros y ensamblado.";
    }

    public function metodoReciclado(): string
    {
        return "Separar componentes y reciclar según material.";
    }

    public function __clone()
    {
        $this->edad = 0;

        self::$contador++;
        $this->orden = self::$contador;
    }
}

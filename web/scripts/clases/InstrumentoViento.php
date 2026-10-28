<?php

class InstrumentoViento extends InstrumentoBase
{
    protected string $material = "madera";

    public function __construct(
        string $material = "madera",
        int $edad = 15
    ) {
        parent::__construct(
            "instrumento de viento",
            $edad
        );

        $this->material = $material;
    }

    public function sonido(): string
    {
        return "Fuuuuuu";
    }

    final public function afinar(): string
    {
        return "1. Revisar boquilla. 2. Limpiar conductos. 3. Ajustar tono.";
    }

    public function __toString(): string
    {
        return parent::__toString() .
               ". Instrumento de material {$this->material}";
    }
}
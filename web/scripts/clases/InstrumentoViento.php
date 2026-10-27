<?php

require_once 'InstrumentoBase.php';

// Es abstracta porque hereda sonido() sin implementar: lo definirán las clases derivadas.
abstract class InstrumentoViento extends InstrumentoBase
{
    // No accesible desde el exterior, sí desde las clases derivadas. Sin get/set.
    protected string $material = "madera";

    public function __construct(string $material = "madera", int $edad = 15)
    {
        // La descripción es siempre "instrumento de viento"
        parent::__construct("instrumento de viento", $edad);
        $this->material = $material;
    }

    // final: las clases derivadas no pueden redefinirlo
    final public function afinar(): string
    {
        return "1. Montar las piezas del instrumento. "
            . "2. Tocar una nota de referencia (La 440 Hz) con el afinador. "
            . "3. Ajustar la longitud del tubo (boquilla, cabeza o bomba de afinación) hasta igualar la nota. "
            . "4. Comprobar el resto de notas y repetir si hace falta.";
    }

    public function __toString(): string
    {
        return parent::__toString() . ". Instrumento de material " . $this->material;
    }
}
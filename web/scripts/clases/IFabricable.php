<?php

// Interfaz que indica cómo se fabrica un elemento y cómo se recicla
interface IFabricable
{
    // Devuelve los pasos para fabricar el elemento
    public function metodoFabricacion(): string;

    // Devuelve el método de reciclado que se debe aplicar según su fabricación
    public function metodoReciclado(): string;
}
<?php

/**
 * Interfaz que indica cómo se fabrica un elemento y cómo se recicla.
 */
interface IFabricable
{
    /**
     * @return string Pasos para fabricar el elemento
     */
    public function metodoFabricacion(): string;

    /**
     * @return string Método de reciclado según su fabricación
     */
    public function metodoReciclado(): string;
}
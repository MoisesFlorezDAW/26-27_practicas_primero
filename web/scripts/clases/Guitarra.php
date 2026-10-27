<?php
    class Guitarra extends InstrumentoBase
{
    public function sonido(): string
    {
        return "Rasgueo: ¡chan chan chan!";
    }
 
    public function afinar(): string
    {
        return "1. Afinar la 6ª cuerda en Mi. 2. Pisar el traste 5 y afinar la 5ª en La. "
            . "3. Repetir con el resto de cuerdas.";
    }
 
    // Prueba de acceso a la propiedad protegida desde un descendiente
    public function edadEnMeses(): int
    {
        return $this->edad * 12;
    }
}
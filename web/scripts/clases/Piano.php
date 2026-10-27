<?php
class Piano extends InstrumentoBase
{
    public function sonido(): string
    {
        return "Plin plon plin";
    }
 
    public function afinar(): string
    {
        return "1. Fijar el La central a 440 Hz. 2. Afinar el resto de octavas con el diapasón.";
    }
}
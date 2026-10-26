<?php

class InstrumentoBase{
    private string $descripcion;
    //protected static int $elemCreados;
    private int $orden;
    
    // No accesible
    protected int $edad;

    public function __construct(string $descripcion = "", int $edad=10){
        $this->descripcion = $descripcion;
        $this->edad = $edad;

      //   $this->orden = ++self::$elemCreados;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }
 
    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }
 
    public function getEdad(): int
    {
        return $this->edad;
    }
 
    public function getOrden(): int
    {
        return $this->orden;
    }
 
    public static function getTotal(): int
    {
        //return self::$elemCreados;
    }
 
    public function Sonido() : string{
        return "do, re, mi";       
    }

    public function afinar() : string{
        return "dgiweghiorgherhneinhi";
    }

    public function envejecer() : void{
        $this->edad+=1;
    }

    public function __toString()
    {   
    return "instrumento con descripción " . $this->descripcion
            . ", instancia " . $this->orden
            //. " de un total de " . self::$elemCreados
            . ". Tiene " . $this->edad . " años"
            . ". La clase es " . get_class($this);

    }    
}
<?php
// Con métodos abstractos la clase tiene que ser abstracta.
abstract class InstrumentoBase
{
    // Variable de clase protegida: cuántos instrumentos se han creado
    protected static int $contador = 0;

    // No accesible directamente: solo mediante get/set públicos
    private string $descripcion;

    // No accesible desde el exterior, sí desde las clases descendientes
    protected int $edad = 10;

    // Orden de creación de esta instancia
    protected int $orden;

    public function __construct(string $descripcion = "", int $edad = 10)
    {
        $this->descripcion = $descripcion;
        $this->edad = $edad;

        // Se asigna el número de orden actual (empezando en 1) y se incrementa el contador
        $this->orden = ++self::$contador;
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
        return self::$contador;
    }

    // Aumenta la edad en un año
    public function envejecer(): void
    {
        $this->edad++;
    }

    // Devuelve una frase que representa el sonido
    abstract public function sonido(): string;

    // Devuelve una cadena con los pasos necesarios para afinar el instrumento
    abstract public function afinar(): string;

    public function __toString(): string
    {
        return "instrumento con descripción " . $this->descripcion
            . ", instancia " . $this->orden
            . " de un total de " . self::$contador
            . ". Tiene " . $this->edad . " años"
            . ". La clase es " . get_class($this);
    }

    // No se definen __get ni __set: no hay sobrecarga de propiedades.
}

/**--------------- Clase no abstracta(prueba) */
// class InstrumentoBase{
//     private string $descripcion;
//     //protected static int $elemCreados;
//     private int $orden;
    
//     // No accesible
//     protected int $edad;

//     public function __construct(string $descripcion = "", int $edad=10){
//         $this->descripcion = $descripcion;
//         $this->edad = $edad;

//       //   $this->orden = ++self::$elemCreados;
//     }

//     public function getDescripcion(): string
//     {
//         return $this->descripcion;
//     }
 
//     public function setDescripcion(string $descripcion): void
//     {
//         $this->descripcion = $descripcion;
//     }
 
//     public function getEdad(): int
//     {
//         return $this->edad;
//     }
 
//     public function getOrden(): int
//     {
//         return $this->orden;
//     }
 
//     public static function getTotal(): int
//     {
//         //return self::$elemCreados;
//     }
 
//     public function Sonido() : string{
//         return "do, re, mi";       
//     }

//     public function afinar() : string{
//         return "dgiweghiorgherhneinhi";
//     }

//     public function envejecer() : void{
//         $this->edad+=1;
//     }

//     public function __toString()
//     {   
//     return "instrumento con descripción " . $this->descripcion
//             . ", instancia " . $this->orden
//             //. " de un total de " . self::$elemCreados
//             . ". Tiene " . $this->edad . " años"
//             . ". La clase es " . get_class($this);

//     }    
// }
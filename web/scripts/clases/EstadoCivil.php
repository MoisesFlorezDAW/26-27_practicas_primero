<?php
enum EstadoCivil: int{
    case SOLTERO = 10;
    case CASADO = 20;
    case PAREJA = 30;
    case VIUDO = 40;

    public function descripcion(){
        return $this->name;
    }

    public function valor(){
        return $this->value;
    }
    
    public static function casos(): array {
        return self::cases();        
    }
    
}
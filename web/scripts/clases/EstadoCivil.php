<?php

/**
 * Estados civiles posibles de una persona.
 */
enum EstadoCivil: int
{
    case SOLTERO = 10;
    case CASADO = 20;
    case PAREJA = 30;
    case VIUDO = 40;

    /**
     * @return string Nombre del estado
     */
    public function descripcion(): string
    {
        return $this->name;
    }

    /**
     * @return int Valor numérico del estado
     */
    public function valor(): int
    {
        return $this->value;
    }

    /**
     * @return EstadoCivil[] Todos los casos del enum
     */
    public static function casos(): array
    {
        return self::cases();
    }
}
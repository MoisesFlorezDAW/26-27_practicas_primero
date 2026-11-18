<?php

class Punto
{
    public const COLORES = [
        'black' => ['nombre' => 'negro', 'rgb' => [0, 0, 0]],
        'white' => ['nombre' => 'blanco', 'rgb' => [255, 255, 255]],
        'red' => ['nombre' => 'rojo', 'rgb' => [255, 0, 0]],
        'blue' => ['nombre' => 'azul', 'rgb' => [0, 0, 255]],
        'green' => ['nombre' => 'verde', 'rgb' => [0, 128, 0]]
    ];

    public const GROSORES = [
        1 => "fino",
        2 => "medio",
        3 => "grueso"
    ];

    private int $x = 0;
    private int $y = 0;
    private string $color = "black";
    private int $grosor = 1;

    public function __construct(int $x, int $y, string $color, int $grosor)
    {
        if (!$this->setX($x)) {
            throw new Exception("Coordenada x incorrecta");
        }
        if (!$this->setY($y)) {
            throw new Exception("Coordenada y incorrecta");
        }
        if (!$this->setColor($color)) {
            throw new Exception("Color incorrecto");
        }
        if (!$this->setGrosor($grosor)) {
            throw new Exception("Grosor incorrecto");
        }
    }

    public function __set(string $nombre, mixed $valor): void
    {
        throw new Error("No se permite crear la propiedad dinamica '" . $nombre . "' en " . static::class);
    }

    public function setX(int $x): bool
    {
        $valor = $x;
        if (!validaEntero($valor, 0, 20000, 0)) {
            return false;
        }
        $this->x = $valor;
        return true;
    }

    public function setY(int $y): bool
    {
        $valor = $y;
        if (!validaEntero($valor, 0, 20000, 0)) {
            return false;
        }
        $this->y = $valor;
        return true;
    }

    public function setColor(string $color): bool
    {
        if (!validaRango($color, self::COLORES, 2)) {
            return false;
        }
        $this->color = $color;
        return true;
    }

    public function setGrosor(int $grosor): bool
    {
        if (!validaRango($grosor, self::GROSORES, 2)) {
            return false;
        }
        $this->grosor = $grosor;
        return true;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getGrosor(): int
    {
        return $this->grosor;
    }
}
<?php

class SerieFibonacci implements Iterator
{
    private int $_limite;
    private int $_claveActual = 0;

    public function __construct(int $limite)
    {
        $this->_limite = $limite;
    }

    private function calcular(int $n): int
    {
        $raiz5 = sqrt(5);
        $phi = (1 + $raiz5) / 2;
        $psi = (1 - $raiz5) / 2;

        return (int) round((pow($phi, $n) - pow($psi, $n)) / $raiz5);
    }

    public function current(): mixed
    {
        return $this->calcular($this->_claveActual);
    }

    public function key(): mixed
    {
        return $this->_claveActual;
    }

    public function next(): void
    {
        $this->_claveActual++;
    }

    public function rewind(): void
    {
        $this->_claveActual = 0;
    }

    public function valid(): bool
    {
        // Con límite 10 se generan F(0)...F(10), es decir, 11 valores
        return $this->_claveActual <= $this->_limite;
    }
    public static function fFibonacci(int $ultimo): Generator
    {
        $a = 0;
        $b = 1;

        for ($i = 0; $i <= $ultimo; $i++) {
            yield $i => $a;
            [$a, $b] = [$b, $a + $b];
        }
    }
}

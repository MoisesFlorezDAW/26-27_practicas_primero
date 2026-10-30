<?php

class ClaseMisPropiedades implements IteratorAggregate
{
    // Almacén de las propiedades dinámicas
    private array $_propiedades = [];

    // Propiedades de instancia
    public mixed $propPublica = null;
    private mixed $_propPrivada = 25;

    public function __set(string $nombre, mixed $valor): void
    {
        if ($nombre === '_propPrivada') {
            throw new Exception("No se puede asignar un valor a la propiedad '_propPrivada'.");
        }

        $this->_propiedades[$nombre] = $valor;
    }

    public function __get(string $nombre): mixed
    {
        if ($nombre === '_propPrivada') {
            throw new Exception("No se puede acceder a la propiedad '_propPrivada'.");
        }

        if (array_key_exists($nombre, $this->_propiedades)) {
            return $this->_propiedades[$nombre];
        }

        trigger_error("Propiedad no definida: $nombre", E_USER_NOTICE);
        return null;
    }

    public function __isset(string $nombre): bool
    {
        return isset($this->_propiedades[$nombre]);
    }

    public function __unset(string $nombre): void
    {
        unset($this->_propiedades[$nombre]);
    }

    /**
     * Permite recorrer el objeto con foreach.
     * Devuelve primero las propiedades dinámicas y, al final,
     * propPublica y _propPrivada, todas con el prefijo "oi_".
     */
    public function getIterator(): Iterator
    {
        foreach ($this->_propiedades as $clave => $valor) {
            yield 'oi_' . $clave => $valor;
        }

        yield 'oi_propPublica' => $this->propPublica;
        yield 'oi_propPrivada' => $this->_propPrivada;
    }
}
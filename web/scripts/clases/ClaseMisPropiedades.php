<?php

/**
 * Clase con propiedades dinámicas e iterable.
 * La sobrecarga está activa a propósito: es lo que pide el enunciado.
 */
class ClaseMisPropiedades implements IteratorAggregate
{
    /** @var array Almacén de las propiedades dinámicas */
    private array $_propiedades = [];

    /** @var mixed Propiedad pública */
    public mixed $propPublica = null;

    /** @var mixed Propiedad privada */
    private mixed $_propPrivada = 25;

    /**
     * Crea una propiedad dinámica. Si el nombre es "_propPrivada" se ignora.
     *
     * @param string $nombre Nombre de la propiedad
     * @param mixed $valor Valor que se asigna
     * @return void
     */
    public function __set(string $nombre, mixed $valor): void
    {
        if ($nombre === '_propPrivada') {
            return;
        }

        $this->_propiedades[$nombre] = $valor;
    }

    /**
     * Lee una propiedad dinámica. Devuelve null si no existe
     * o si se intenta leer "_propPrivada".
     *
     * @param string $nombre Nombre de la propiedad
     * @return mixed Valor de la propiedad o null
     */
    public function __get(string $nombre): mixed
    {
        if ($nombre === '_propPrivada') {
            return null;
        }

        return $this->_propiedades[$nombre] ?? null;
    }

    /**
     * Comprueba si existe una propiedad dinámica.
     *
     * @param string $nombre Nombre de la propiedad
     * @return bool True si existe y no es null
     */
    public function __isset(string $nombre): bool
    {
        return isset($this->_propiedades[$nombre]);
    }

    /**
     * Elimina una propiedad dinámica.
     *
     * @param string $nombre Nombre de la propiedad
     * @return void
     */
    public function __unset(string $nombre): void
    {
        unset($this->_propiedades[$nombre]);
    }

    /**
     * Permite recorrer el objeto con foreach.
     * Devuelve primero las propiedades dinámicas y, al final,
     * propPublica y _propPrivada, todas con el prefijo "oi_".
     *
     * @return Iterator Generador clave => valor
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
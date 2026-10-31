<?php
/**
 * Clase base abstracta para los instrumentos.
 */
abstract class InstrumentoBase
{
    /** @var int Número de instrumentos creados */
    protected static int $_contador = 0;

    /** @var string Descripción (solo accesible mediante get/set) */
    private string $_descripcion = "";

    /** @var int Edad en años */
    protected int $_edad = 10;

    /** @var int Orden de creación de esta instancia */
    protected int $_orden = 0;

    /**
     * Si la edad es negativa se conserva el valor por defecto.
     *
     * @param string $descripcion Descripción del instrumento
     * @param int $edad Edad en años (no negativa)
     */
    public function __construct(string $descripcion = "", int $edad = 10)
    {
        $this->_descripcion = $descripcion;

        if ($edad >= 0) {
            $this->_edad = $edad;
        }

        $this->_orden = ++self::$_contador;
    }

    /**
     * @return string Descripción del instrumento
     */
    public function getDescripcion(): string
    {
        return $this->_descripcion;
    }

    /**
     * @param string $descripcion Nueva descripción
     * @return void
     */
    public function setDescripcion(string $descripcion): void
    {
        $this->_descripcion = $descripcion;
    }

    /**
     * @return int Edad del instrumento
     */
    public function getEdad(): int
    {
        return $this->_edad;
    }

    /**
     * @return int Orden de creación de la instancia
     */
    public function getOrden(): int
    {
        return $this->_orden;
    }

    /**
     * @return int Total de instrumentos creados
     */
    public static function getTotal(): int
    {
        return self::$_contador;
    }

    /**
     * Aumenta la edad en un año.
     *
     * @return void
     */
    public function envejecer(): void
    {
        $this->_edad++;
    }

    /**
     * @return string Frase que representa el sonido
     */
    abstract public function sonido(): string;

    /**
     * @return string Pasos necesarios para afinar el instrumento
     */
    abstract public function afinar(): string;

    /**
     * Sobrecarga deshabilitada: leer una propiedad inexistente devuelve null.
     *
     * @param string $nombre Nombre de la propiedad
     * @return mixed Siempre null
     */
    public function __get(string $nombre): mixed
    {
        return null;
    }

    /**
     * Sobrecarga deshabilitada: la asignación se ignora.
     *
     * @param string $nombre Nombre de la propiedad
     * @param mixed $valor Valor que se intenta asignar
     * @return void
     */
    public function __set(string $nombre, mixed $valor): void
    {
    }

    /**
     * Sobrecarga deshabilitada: ninguna propiedad dinámica existe.
     *
     * @param string $nombre Nombre de la propiedad
     * @return bool Siempre false
     */
    public function __isset(string $nombre): bool
    {
        return false;
    }

    /**
     * Sobrecarga deshabilitada: no hace nada.
     *
     * @param string $nombre Nombre de la propiedad
     * @return void
     */
    public function __unset(string $nombre): void
    {
    }

    /**
     * @return string Representación textual del instrumento
     */
    public function __toString(): string
    {
        return "instrumento con descripción " . $this->_descripcion
            . ", instancia " . $this->_orden
            . " de un total de " . self::$_contador
            . ". Tiene " . $this->_edad . " años"
            . ". La clase es " . get_class($this);
    }
}
<?php
/**
 * Representa a una persona.
 */
class Persona
{
    private string $_nombre = "prueba";
    private string $_fechaNacimiento = "01/01/2000";
    private string $_domicilio = "carrera 12";
    private string $_localidad = "antequera";
    private EstadoCivil $_estado = EstadoCivil::SOLTERO;

    /**
     * @param string $nombre Nombre de la persona
     * @param string $fechaNacimiento Fecha de nacimiento (dd/mm/aaaa)
     * @param string $domicilio Domicilio
     * @param string $localidad Localidad
     * @param EstadoCivil $estado Estado civil
     */
    public function __construct(
        string $nombre = "prueba",
        string $fechaNacimiento = "01/01/2000",
        string $domicilio = "carrera 12",
        string $localidad = "antequera",
        EstadoCivil $estado = EstadoCivil::SOLTERO
    ) {
        $this->_nombre = $nombre;
        $this->_fechaNacimiento = $fechaNacimiento;
        $this->_domicilio = $domicilio;
        $this->_localidad = $localidad;
        $this->_estado = $estado;
    }

    /**
     * @return string Nombre
     */
    public function getNombre(): string
    {
        return $this->_nombre;
    }

    /**
     * @param string $nombre Nuevo nombre
     * @return void
     */
    public function setNombre(string $nombre): void
    {
        $this->_nombre = $nombre;
    }

    /**
     * @return string Fecha de nacimiento
     */
    public function getFechaNac(): string
    {
        return $this->_fechaNacimiento;
    }

    /**
     * @param string $fechaNac Nueva fecha de nacimiento
     * @return void
     */
    public function setFechaNac(string $fechaNac): void
    {
        $this->_fechaNacimiento = $fechaNac;
    }

    /**
     * @return string Domicilio
     */
    public function getDomicilio(): string
    {
        return $this->_domicilio;
    }

    /**
     * @param string $domicilio Nuevo domicilio
     * @return void
     */
    public function setDomicilio(string $domicilio): void
    {
        $this->_domicilio = $domicilio;
    }

    /**
     * @return string Localidad
     */
    public function getLocalidad(): string
    {
        return $this->_localidad;
    }

    /**
     * @param string $localidad Nueva localidad
     * @return void
     */
    public function setLocalidad(string $localidad): void
    {
        $this->_localidad = $localidad;
    }

    /**
     * @return EstadoCivil Estado civil
     */
    public function getEstado(): EstadoCivil
    {
        return $this->_estado;
    }

    /**
     * @param EstadoCivil $estadoCivil Nuevo estado civil
     * @return void
     */
    public function setEstado(EstadoCivil $estadoCivil): void
    {
        $this->_estado = $estadoCivil;
    }

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
     * @return string 
     */
    public function __toString(): string
    {
        return "{$this->_nombre} es una persona {$this->_estado->descripcion()} "
            . "nacida en {$this->_fechaNacimiento} y que vive en {$this->_localidad}";
    }
}
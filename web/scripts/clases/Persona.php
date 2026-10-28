<?php

class Persona{
    private string $nombre;
    private string $fecha_nacimiento;
    private string $domicilio;
    private string $localidad;
    private EstadoCivil $estado;

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getFechaNac(): string
    {
        return $this->fecha_nacimiento;
    }

    public function setDescripcion(string $fechaNac): void
    {
        $this->fecha_nacimiento = $fechaNac;
    }

    public function getDomicilio(): string
    {
        return $this->domicilio;
    }

    public function setDomicilio(string $domicilio): void
    {
        $this->domicilio = $domicilio;
    }

    public function getLocalidad(): string
    {
        return $this->localidad;
    }

    public function setLocalidad(string $localidad): void
    {
        $this->localidad = $localidad;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado(EstadoCivil $estadoCivil): void
    {
        $this->estado = $estadoCivil;
    }

    public function __construct(string $nombre="prueba", string $fecha_nacimiento="01/01/2000",
    string $domicilio = "carrera 12", $localidad="antequera", EstadoCivil $estado = EstadoCivil::SOLTERO)
    {
        $this->nombre = $nombre;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->domicilio = $domicilio;
        $this->localidad=$localidad;
        $this->estado=$estado;
    }

    public function __toString(): string{
        return "{$this->nombre} es una persona {$this->estado->descripcion()} 
        nacida en {$this->fecha_nacimiento} y que vive en {$this->localidad}";
    }

}
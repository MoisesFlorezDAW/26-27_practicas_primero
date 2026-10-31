<?php
/**
 * Instrumento de viento.
 */
class InstrumentoViento extends InstrumentoBase
{
    /** @var string Material del instrumento */
    protected string $_material = "madera";

    /**
     * Si el material está vacío se conserva el valor por defecto.
     *
     * @param string $material Material del instrumento
     * @param int $edad Edad en años
     */
    public function __construct(string $material = "madera", int $edad = 15)
    {
        parent::__construct("instrumento de viento", $edad);

        if (mb_strlen(trim($material)) > 0) {
            $this->_material = $material;
        }
    }

    /**
     * @return string Sonido del instrumento
     */
    public function sonido(): string
    {
        return "Fuuuuuu";
    }

    /**
     * @return string Pasos para afinar el instrumento
     */
    final public function afinar(): string
    {
        return "1. Revisar boquilla. 2. Limpiar conductos. 3. Ajustar tono.";
    }

    /**
     * @return string Representación textual del instrumento
     */
    public function __toString(): string
    {
        return parent::__toString() . ". Instrumento de material {$this->_material}";
    }
}
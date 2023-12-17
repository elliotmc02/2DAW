<?php
class Deuda
{
    public int $idDeuda;
    public string $usuario;
    public string $receptor;
    public float $cantidad;
    public string $descripcion;
    public string $fecha;
    public bool $pagado;
    public string $creador;

    function __construct($idDeuda, $usuario, $receptor, $cantidad, $descripcion, $fecha, $pagado, $creador)
    {
        $this->idDeuda = $idDeuda;
        $this->usuario = $usuario;
        $this->receptor = $receptor;
        $this->cantidad = $cantidad;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
        $this->pagado = $pagado;
        $this->creador = $creador;
    }
}

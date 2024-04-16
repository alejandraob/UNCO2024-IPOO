<?php
class Moto{
    /* declaramos las variables a utilizar en esta clase */
    private $codigo;
    private $costo;
    private $anio_fabricacion;
    private $descripcion;
    private $porcentaje_incremento_anual;
    private $activa;

    /* Creamos el constructor de la clase */
    public function __construct($codigo, $costo, $anio_fabricacion, $descripcion, $porcentaje_incremento_anual, $activa){
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anio_fabricacion = $anio_fabricacion;
        $this->descripcion = $descripcion;
        $this->porcentaje_incremento_anual = $porcentaje_incremento_anual;
        $this->activa = $activa;
    }

    /* crearemos los metodos gettes y settes de la clase */
    public function getCodigo(){
        return $this->codigo;
    }
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    public function getCosto(){
        return $this->costo;
    }
    public function setCosto($costo){
        $this->costo = $costo;
    }
    public function getAnioFabricacion(){
        return $this->anio_fabricacion;
    }
    public function setAnioFabricacion($anio_fabricacion){
        $this->anio_fabricacion = $anio_fabricacion;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function getPorcentajeIncrementoAnual(){
        return $this->porcentaje_incremento_anual;
    }
    public function setPorcentajeIncrementoAnual($porcentaje_incremento_anual){
        $this->porcentaje_incremento_anual = $porcentaje_incremento_anual;
    }
    public function getActiva(){
        return $this->activa;
    }
    public function setActiva($activa){
        $this->activa = $activa;
    }

    /**
     * Implementaremos el metodo darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
     * Si la moto no se encuentra disponile para la venta retorna un valor . Si la moto esta disponible para la venta el metodo realiza el siguiente calculo
     * $venta=$compra+$compra*(annio*incremento_anual)
     * donde $compra es el costo de la moto, anio es cantidad de años transcurridos desde que se fabrico la moto y 
     * por_inc_anual es porcentaje de incremento anual de la moto
     * @return float
     */
    public function darPrecioVenta(){
        $venta=0;
        
        if($this->activa == false){
            return $venta;
        }else{
            $venta=$this->costo+$this->costo*($this->anio_fabricacion*$this->porcentaje_incremento_anual);
            return $venta;
        }
    }
    //crearemos el metodo toString de la clase
    public function __toString(){
        return "Codigo: ".$this->codigo." Costo: ".$this->costo." Año de Fabricacion: ".$this->anio_fabricacion." Descripcion: ".$this->descripcion." Porcentaje de Incremento Anual: ".$this->porcentaje_incremento_anual." Activa: ".$this->activa;
    }

}
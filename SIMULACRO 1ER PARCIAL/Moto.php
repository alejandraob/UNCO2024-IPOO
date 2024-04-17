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
     *
     */
    public function darPrecioVenta(){
        $anioActual = date("Y");
        $retorno = -1;
        $costo = $this->getCosto();
        $cantAniosVehiculo = $anioActual - $this->getAnioFabricacion() ;
        if($this->getActiva()){
            $retorno = $costo + $costo*($cantAniosVehiculo*$this->getPorcentajeIncrementoAnual());
        }
        return $retorno;
    }
    //crearemos el metodo toString de la clase
    public function __toString(){
        return "Moto: \n
         Codigo:". $this->getCodigo() .
        "\nCosto: " . $this->getCosto() .
         "\nanioFabric: " . $this->getAnioFabricacion().
         "\nDescripcion:" . $this->getDescripcion().
         "\nPorcIncrementoAnual: " . $this->getPorcentajeIncrementoAnual().
         "\n Activo: " . ($this->getActiva()? "SI" : "NO");
    }

}
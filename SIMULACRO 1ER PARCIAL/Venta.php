<?php
class Venta{
    private $numero;
    private $fecha;
    private $cliente;
    private $moto;
    private $precioFinal;

    public function __construct($numero, $fecha, $cliente, $moto, $precioFinal){
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->cliente = $cliente;
        $this->moto = $moto;
        $this->precioFinal = $precioFinal;
    }

    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    public function getCliente(){
        return $this->cliente;
    }
    public function setCliente($cliente){
        $this->cliente = $cliente;
    }
    public function getMoto(){
        return $this->moto;
    }
    public function setMoto($moto){
        $this->moto = $moto;
    }
    public function getPrecioFinal(){
        return $this->precioFinal;
    }
    public function setPrecioFinal($precioFinal){
        $this->precioFinal = $precioFinal;
    }

    /**
     * Incorporar meto incorporarMoto($objMoto) que recibe un objeto de tipo Moto y lo incorpora a la coleccion de la venta, SIEMPRE Y CUANDO SEA POSIBLE LA VENTA. El metodo 
     * casa vez que incopora una moto a la venta, debe actualizar la variable instancia precio final de la vent. Utilizar el metodo que calcula el precio de venta de la moto.
     * @param Moto $objMoto
     * @return void
     * 
     */
    public function incorporarMoto($objMoto){
        if($objMoto->getActiva() == true){
            $this->moto = $objMoto;
            $this->precioFinal = $this->moto->darPrecioVenta();
        }
    }
}
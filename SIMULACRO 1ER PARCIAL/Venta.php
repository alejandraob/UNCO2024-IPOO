<?php
class Venta{
    private $numero;
    private $fecha;
    private $cliente;
    private $moto;
    private $precioFinal;

    public function __construct($fecha, $cliente, $moto){
        $this->numero = $this->generarNumero();
        $this->fecha = $fecha;
        $this->cliente = $cliente;
        $this->moto = $moto;
        $this->precioFinal = 0;
    }
    private function generarNumero(){
        return rand(1,1000);
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


    public function mostrarArrMotos(){
        $mensaje = "";
        $moto = $this->getMoto();
        for($i=0; $i<count($moto);$i++){
            $mensaje.= "\n" . $moto[$i] . "\n";
        }
        return $mensaje;
    }





    /**
     * Incorporar meto incorporarMoto($objMoto) que recibe un objeto de tipo Moto y lo incorpora a la coleccion de la venta, SIEMPRE Y CUANDO SEA POSIBLE LA VENTA. El metodo 
     * casa vez que incopora una moto a la venta, debe actualizar la variable instancia precio final de la vent. Utilizar el metodo que calcula el precio de venta de la moto.
     * @param Moto $objMoto
     * @return void
     * 
     */
    public function incorporarMoto($objMoto){
        $arrMotos = $this->getMoto();
        $precioFinal =  $this->getPrecioFinal();
        $retorno = false;

        if($objMoto->getActiva() == true){
           //Agrego al arreglo de moto el obj moto
           array_push($arrMotos,$objMoto);
           //Seteo el nuevo arreglo de moto
           $this->setMoto($arrMotos);
           //Sumo al precio final el moto agregado
           $precioFinal+=$objMoto->darPrecioVenta();
           $this->setPrecioFinal($precioFinal);
           $retorno = true;
        }
        return $retorno;
    }


    public function __toString(){
        return "Venta: \n Numero:" . $this->getNumero() 
        . "\n Fecha: ". $this->getFecha() 
        . "\n Cliente: ". $this->getCliente() 
        . "\n Motos: ". $this->mostrarArrMotos() 
        . "\n Precio Final: ". $this->getPrecioFinal() . "\n";
    }




}
<?php
class Empresa{
    private $denominacion;
    private $direccion;
    private $coleccionClientes;
    private $coleccionVentas;
    private $coleccionMotos;

    public function __construct($denominacion, $direccion){
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccionClientes = [];
        $this->coleccionVentas = [];
        $this->coleccionMotos = [];
    }

    public function getDenominacion(){
        return $this->denominacion;
    }
    public function setDenominacion($denominacion){
        $this->denominacion = $denominacion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    /**
     * Implementar el metodo retornarMoto($codigoMoto) que recorre la coleccion de motos de la empresa y retorna la referencia al objeto moto cuyo codigo coincide con el parametro recibido.
     * @param int $codigoMoto
     * @return Moto
     * 
     */
    public function retornarMoto($codigoMoto){
        foreach($this->coleccionMotos as $moto){
            if($moto->getCodigo() == $codigoMoto){
                return $moto;
            }
        }
    }
    
}
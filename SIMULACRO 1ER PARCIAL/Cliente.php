<?php
class Cliente{
    /*declaramos las variables a utilizar en esta clase*/
    private $nombre;
    private $apellido;
    private $estado;
    private $tipoDocumento;
    private $numeroDocumento;

    /*Creamos el constructor de la clase*/
    public function __construct($nombre, $apellido, $estado, $tipoDocumento, $numeroDocumento){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->estado = $estado;
        $this->tipoDocumento = $tipoDocumento;
        $this->numeroDocumento = $numeroDocumento;
    }

    /**
     * Creamos el metodo para validar el estado del cliente, si el cliente fue dado de baja, no se podra realizar ninguna operacion de compra 
     * @return boolean
     */

    public function validarEstado(){
        
        $respuesta=false;
        if($this->estado == "Activo"){
            $respuesta =true;
        }   
        return $respuesta;
          
    }
    /*Creamos los metodos get y set de la clase*/
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }
    public function getTipoDocumento(){
        return $this->tipoDocumento;
    }
    public function setTipoDocumento($tipoDocumento){
        $this->tipoDocumento = $tipoDocumento;
    }
    public function getNumeroDocumento(){
        return $this->numeroDocumento;
    }
    public function setNumeroDocumento($numeroDocumento){
        $this->numeroDocumento = $numeroDocumento;
    }

    /*Creamos el metodo toString de la clase*/
    public function __toString(){
        return "Cliente: \n Nombre:" . $this->getNombre() 
        . "\n Apellido: ". $this->getApellido() 
        . "\n Estado: " . ($this->getEstado()? "SI" : "NO") 
        . "\n Tipo DNI:" . $this->getTipoDocumento() 
        . "\n Nro DNI ". $this->getNumeroDocumento();
    }
}
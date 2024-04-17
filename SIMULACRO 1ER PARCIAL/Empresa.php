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

    
    public function getColeccionMotos(){
        return $this->coleccionMotos;
    }
    public function setColeccionMotos($coleccionMotos){
        $this->coleccionMotos = $coleccionMotos;
    }

    public function getColeccionVentas(){
        return $this->coleccionVentas;
    }
    public function setColeccionVentas($coleccionVentas){
        $this->coleccionVentas = $coleccionVentas;
    }

    
    public function getColeccionClientes(){
        return $this->coleccionClientes;
    }
    public function setColeccionClientes($coleccionClientes){
        $this->coleccionClientes = $coleccionClientes;
    }


    public function mostrarClientes()
    {
        $respuesta = "";
        $clientes = $this->getColeccionClientes();
        for ($i = 0; $i < count($clientes); $i++) {
            $respuesta .= $clientes[$i] . "\n";
        }
        return $respuesta;
    }

    public function mostrarMotos()
    {
        $respuesta = "";
        $motos = $this->getColeccionMotos();
        for ($i = 0; $i < count($motos); $i++) {
            $respuesta .= $motos[$i] . "\n";
        }
        return $respuesta;
    }

    public function mostrarVentasRealizadas()
    {
        $respuesta = "";
        $ventas = $this->getColeccionVentas();
        for ($i = 0; $i < count($ventas); $i++) {
            $respuesta .= $ventas[$i] . "\n";
        }
        return $respuesta;
    }


    /**
     * Implementar el metodo retornarMoto($codigoMoto) que recorre la coleccion de motos de la empresa y retorna la referencia al objeto moto cuyo codigo coincide con el parametro recibido.
     * @param int $codigoM
     * @return Moto
     * 
     */
    public function retornarMoto($codigoM){

        $i=0;
        $corte = false;
        $retorno =null;
        $motos=$this->getcoleccionMotos();

        while ($i < count($motos) && !$corte) {
            if ($motos[$i]->getCodigo() === $codigoM) {
                $retorno = $motos[$i];
                $corte = true;
            }
            $i++;
        }
        return $retorno;
    }



     /**
     * Esta funcion recibe una coleccion de codigos de Motos y un objeto cliente.
     * Verifica que el cliente este activo, si es asi crea una venta con la fecha actual y el cliente recibido.
     * Recorre la coleccion de codigos y agrega a la venta los Motos que coincidan con el codigo.
     * Si la venta tiene al menos un vehiculo, la agrega al arreglo de ventas de la concesionaria.
     * Retorna el precio final de la venta.
     * @param array $colCodigosMotos
     * @param Cliente $objCliente
     * @return int
     */
    public function registrarVenta($colCodigosMotos, $objCliente)
    {

        //Creo un arreglo vacio de Motos a vender.
        $motosAVender = array();
        $retorno = 0;

        //Verifico que el cliente este activo
        if ($objCliente->getEstado()) {

            $venta = new Venta(date("d/m/Y"), $objCliente, $motosAVender);

            //Recorro la coleccion de codigos y agrego a la venta los Motos que coincidan con el codigo.
            for ($i = 0; $i < count($colCodigosMotos); $i++) {
                $vehiculo = $this->retornarMoto($colCodigosMotos[$i]);
                if ($vehiculo != null) {
                    $venta->incorporarMoto($vehiculo);
                }
            }
            //Verifico que la venta tenga al menos un vehiculo. Si es asi, la agrego al arreglo de ventas de la concesionaria.
            if (count($venta->getMoto()) > 0) {
                //Agrego la venta al arreglo de ventas de la concesionaria.
                $ventas = $this->getColeccionVentas();
                array_push($ventas, $venta);
                $this->setColeccionVentas($ventas);
                $retorno = $venta->getPrecioFinal();
            //Si no tiene Motos, seteo la venta en null.
            }else{
                $venta = null;
            }
        }

        return $retorno;
    }


        /**
         * Recibe tipo y nroDoc de un cliente y retorna un array con las ventas asociadas a ese cliente.
         * @param string $tipo
         * @param int $nroDoc
         * @return array
         */
        public function retornarVentasXCliente($tipo, $nroDoc)
        {
            $arrVentas = $this->getColeccionVentas();
            $arrVentasCliente = array();
            for ($i = 0; $i < count($arrVentas); $i++) {
                if ($arrVentas[$i]->getCliente()->getTipoDni() === $tipo && $arrVentas[$i]->getCliente()->getDni() === $nroDoc) {
                    array_push($arrVentasCliente, $arrVentas[$i]);
                }
            }

            return $arrVentasCliente;
        }



            //toString
    public function __toString()
    {
        return "Concesionaria: " .
            "\nDenominación: " . $this->getDenominacion() .
            "\nDireccion: " . $this->getDireccion() .
            "\nClientes: "  . $this->mostrarClientes() .
            "\nMotos: " . $this->mostrarMotos() .
            "\nVentas Realizadas: " . $this->mostrarVentasRealizadas();
    }
        
 }

    

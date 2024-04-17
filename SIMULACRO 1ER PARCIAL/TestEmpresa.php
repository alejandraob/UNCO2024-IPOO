<?php
include_once('Cliente.php');
include_once('Empresa.php');
include_once('Moto.php');
include_once('Venta.php');


//1) crear 2 instancias de tipo cliente
$objCliente1 = new Cliente("Sergio","Lopez",true,"DNI",12345678);
$objCliente2 = new Cliente("Romina", "Benitez",true,"DNI",321654987);

//2) Crear 3 obj vehiculos con la info subministrada.-
$moto1 = new Moto(11,2230000,2022,"Benlli Imperiable 400",1.85,true);
$moto2 = new Moto(12,584000,2021,"Zanella Zr 150 Ohc",1.70,true);
$moto3 = new Moto(13,999900,2023,"Zanella PAtagonian Eagle 250",1.55,false);

// 3) Crear obj empresa con datos de arriba.
$colMotos = [$moto1,$moto2,$moto3];
$colClientes = [$objCliente1,$objCliente2];
$empresa = new Empresa("Alta Gama","Av. Argentina 123",$colClientes,$colMotos,[]);

echo "VENTA 1: " . $empresa->registrarVenta([11,12,13],$objCliente2);
echo "\nVENTA 2: " . $empresa->registrarVenta([0],$objCliente2);
echo "\n VENTA 3: " . $empresa->registrarVenta([2],$objCliente2);

echo "\nVentas cliente 1 :";
print_r ($empresa->retornarVentasXCliente("DNI",12345678));


echo "\nVentas cliente 2: ";
print_r ($empresa->retornarVentasXCliente("DNI",321654987));

echo $empresa;
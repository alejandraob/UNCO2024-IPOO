<?php
require_once "Viaje.php";
/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/
/**
 * 
 *  Mostrar Menu de opciones
 * 
 * */
function mostrarMenu()
{
    echo "\n
    1)Ingresar Codigo de Viaje \n
    2)Ingresar Destino de Viaje \n
    3)Ingresar Max de Pasajeros \n
    4)Ingresar Pasajero \n
    5)Modificar Pasajero \n
    6)Eliminar Pasajero \n
    7)Agregar responsable de Viaje \n
    8)Modificar datos de Empleado \n
    9)Eliminar Empleado \n
    10)Ver Información de Viaje Cargado \n
    11)Salir\n
    Ingrese la opción: ";
}


/**
 * 
 *  Usamos una funcion para cargar los datos del pasajero
 * @param Viaje $viaje
 * */
function ingresarPasajero($viaje)
{


    echo "Ingrese al pasajero para el viaje \n";
    echo "Nombre del pasajero: \n";
    $nombre = trim(fgets(STDIN));
    echo "Apellido del pasajero: \n";
    $apellido = trim(fgets(STDIN));
    echo "Nro de DNI: \n";
    $nroDoc = trim(fgets(STDIN));
    echo "Nro de Tel: \n";
    $nroTel = trim(fgets(STDIN));

    $resultado = $viaje->insertarPasajero($nombre, $apellido, $nroDoc, $nroTel);
    if ($resultado === 2) {
        echo "El pasajero no se pudo ingresar.Tiene completo el cupo de pasajeros permitidos.\n";
    }
    if ($resultado === true) {
        echo "El pasajero se ha ingresado correctamente.\n";
    } else {
        echo "El pasajero no se pudo ingresar. Ya existe un pasajero con el mismo número de DNI.\n";
    }
}

/**
 * 
 *  Usamos una funcion para modificar los datos del pasajero
 * @param Viaje $viaje
 * */
function modificarPasajero($viaje)
{
    echo "Ingrese el DNI del pasajero que desea cambiar\n";
    echo "Numero del DNI pasajero: \n";
    $nroDoc = trim(fgets(STDIN));
    echo "Nuevo Nombre del pasajero: \n";
    $nombreNuevo = trim(fgets(STDIN));
    echo "Nuevo Apellido del pasajero: \n";
    $apellidoNuevo = trim(fgets(STDIN));
    echo "Nuevo Telefono del pasajero: \n";
    $telefonoNuevo = trim(fgets(STDIN));

    $resultado = $viaje->modificarPasajero($nroDoc, $nombreNuevo, $apellidoNuevo, $telefonoNuevo);
    if ($resultado === true) {
        echo "El pasajero se modifico correctamente.\n";
    } else {
        echo "El pasajero no se pudo modificar. O no existe un pasajero con el número de DNI ingreasado.\n";
    }
}
/**
 * 
 *  Usamos una funcion para eliminar un pasajero
 * @param Viaje $viaje
 * */
function eliminarPasajero($viaje)
{
    echo "Ingrese el DNI del pasajero que desea eliminar\n";
    echo "Numero del DNI pasajero: \n";
    $nroDoc = trim(fgets(STDIN));

    $resultado = $viaje->eliminarPasajero($nroDoc);
    if ($resultado === true) {
        echo "El pasajero se elimino correctamente.\n";
    } else {
        echo "El pasajero no se pudo eliminar. O no existe un pasajero con el número de DNI ingreasado.\n";
    }
}


/**
 * 
 *  Usamos una funcion para cargar los datos del pasajero
 * @param Viaje $viaje
 * */
function ingresarResponsable($viaje)
{
    echo "Ingrese el personal a Cargo \n";
    echo "Nro de Empleado: \n";
    $nroEmp = trim(fgets(STDIN));
    echo "Nro de Licencia: \n";
    $nroLic = trim(fgets(STDIN));
    echo "Nombre del Empleado: \n";
    $nombre = trim(fgets(STDIN));
    echo "Apellido del Empleado: \n";
    $apellido = trim(fgets(STDIN));

    $resultado = $viaje->insertarResponable($nroEmp, $nroLic, $nombre, $apellido);

    if ($resultado === true) {
        echo "El Empleado se ha ingresado correctamente.\n";
    } else {
        echo "El empleado no se pudo ingresar. \n";
    }
}

/**
 * 
 *  Usamos una funcion para modificar los datos del pasajero
 * @param Viaje $viaje
 * */
function modificarResponsable($viaje)
{
    echo "Ingrese el personal a Cargo \n";
    echo "Nro de Empleado: \n";
    $nroEmp = trim(fgets(STDIN));
    echo "Nuevo Nro de Licencia: \n";
    $nroLic = trim(fgets(STDIN));
    echo "Nuevo Nombre del Empleado: \n";
    $nombre = trim(fgets(STDIN));
    echo "Nuevo Apellido del Empleado: \n";
    $apellido = trim(fgets(STDIN));

    $resultado = $viaje->modificarResponsable($nroEmp, $nroLic, $nombre, $apellido);
    if ($resultado === true) {
        echo "El Empleado se ha ingresado correctamente.\n";
    } else {
        echo "El empleado no se pudo ingresar. \n";
    }
}
/**
 * 
 *  Usamos una funcion para eliminar un pasajero
 * @param Viaje $viaje
 * */
function eliminarResponsable($viaje)
{
    echo "Ingrese el empleado a eliminar\n";
    echo "Nro de Empleado: \n";
    $nroEmp = trim(fgets(STDIN));

    $resultado = $viaje->eliminarResponsable($nroEmp);
    if ($resultado === true) {
        echo "El Empleado se ha elimino correctamente.\n";
    } else {
        echo "El Empleado se no se pudo eliminar. O no existe.\n";
    }
}


/**************************************/
/***** PROGRAMA PRINCIPAL ********/
/**************************************/
//Iniciamos el programa
//Llamamos a la clase y le daremos datos iniciales
//Cargamos el array con dato


$viaje = new Viaje("1", "Buenos Aires", 15);
$viaje->insertarPasajero("Pedro", "Guzman", 36459126, 299269357);
$viaje->insertarResponable("I1", "3695", "Samanta", "Gutierrez");
do {

    //mostramos el menu con las opciones a elegir
    mostrarMenu();
    //leemos la opcion
    $opcion = trim((fgets(STDIN)));

    //Creamos un switch para darle acceso a las opciones del menu
    switch ($opcion) {
        case 1:
            //Ingresamos el codigo de viaje
            echo "Ingrese un codigo para identificar el viaje \n";
            $codigo = trim(fgets(STDIN));
            $viaje->setCodigo($codigo);
            break;
        case 2:
            //Ingresamos el Destino de viaje
            echo "Ingrese un Destino para  el viaje \n ";
            $destino = trim(fgets(STDIN));
            $viaje->setDestino($destino);
            break;
        case 3:
            //Indicamos la cantidad Max de pasajeros
            echo "Ingrese un limite de pasajeros para el viaje \n ";
            $maxPasajeros = trim(fgets(STDIN));
            $viaje->setCanMaxPasajeros($maxPasajeros);

            break;
        case 4:
            //Ingresamos los Pasajeros
            ingresarPasajero($viaje);

            break;

        case 5:
            //Modificamos a un pasajero
            modificarPasajero($viaje);
            break;
        case 6:
            //Eliminar a un pasajero
            eliminarPasajero($viaje);
            break;

        case 7:
            ingresarResponsable($viaje);
            break;
        case 8:
            //Modificamos 
            modificarResponsable($viaje);
            break;
        case 9:
            //Eliminar
            eliminarResponsable($viaje);
            break;
        case 10:
            //Ver Información de Viaje Cargado
            echo $viaje;
            break;

        case 11:
            //Salir
            echo "Finalizo la carga del viaje";
            exit();
            break;
        default:
            echo "No es una opción correcta. Intente nuevamente";
            break;
    }
} while ($opcion != 11);

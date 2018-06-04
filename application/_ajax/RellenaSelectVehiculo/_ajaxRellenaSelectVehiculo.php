<?php 
    $tipoDeVehiculoPasado="";

    $conexion= new PDO("mysql:dbname=landingPage_bd;host=127.0.0.1", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") ); /// nombre de la base de datos y la ip del servidor
    // configurar conexion para lanzar PDO
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (count($_POST)!=0) 
    {   
        try
        {
            $tipoDeVehiculoPasado=$_POST["TipoDeVehiculo"];

            $consulta = "SELECT Vehiculo.Modelo
                         FROM Vehiculo 
                         WHERE Vehiculo.TipoDeVehiculo1 = '$tipoDeVehiculoPasado' OR Vehiculo.TipoDeVehiculo2 = '$tipoDeVehiculoPasado' ORDER BY Vehiculo.Modelo";            
            $datos=$conexion->query($consulta); 
        }
        catch (PDOException $e)
        {
            // controlar error
            echo $e->getMessage();
        }
    }
    function RecorrerConFetch($datos) //fila a fila
    {
        while ($modelos=$datos->fetch(PDO::FETCH_ASSOC)) // assoc no saca las posiciones de los indices
        {
            $ModelosArray[] = $modelos; // voy añadiendo en un ARRAY
        }
        if (!empty($ModelosArray)) 
        {
            echo json_encode($ModelosArray); // codificación
        } 
        else 
        { 
            echo "sin datos regresados";
        }
    }
    if (count($_POST)!=0) 
    {       
        RecorrerConFetch($datos); 
    }
?>
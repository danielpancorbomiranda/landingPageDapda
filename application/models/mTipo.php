<?php
/*
DISPONOGO DE 2 MODELOS, TIPOS DE VEHICULOS (futuros posibles tipos de vehiculos) Y SOLICITANTES 
ESTE EN CONCRETO SE REFIERE A LOS TIPOS DE LOS VEHICULOS
*/
class mTipo extends CI_Model 
{ 
    public function __construct()
    {
        $this->load->database();
    }

    // Para cargar los tipos de vehiculos de la base de datos
    public function fCargarTipos()    
    {
        $query = $this->db->query ("SELECT * FROM Tipo ORDER BY TipoDeVehiculo");
        $tipos=$query->result_array();
        return $tipos; // devuelvo ya todos los tipos de vehiculos
    }

}
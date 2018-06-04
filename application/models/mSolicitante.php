<?php
/*
DISPONOGO DE 2 MODELOS, TIPOS DE VEHICULOS Y SOLICITANTES (futuros posibles clientes)
ESTE EN CONCRETO SE REFIERE A LOS METODOS DE LOS SOLICITANTES, INCLUSO HE PREPARADO FUTUROS PAR AUN POSIBLE MANTENIMIENTO, ESTÁN CAPADOS
*/
class mSolicitante extends CI_Model 
{ 
    public function __construct()
    {
        $this->load->database();
    }

    // Para crear un solicitante con el formulario oportuno, valido si existe ya el email para que no se dupliquen datos de un mismo usuario
    public function fCrearSolicitante ()
    { 
        $consultaSiExiste = $this->db->get_where('Solicitante', array ('EmailSolicitante' => $this->input->post("EmailSolicitante")));
        if ($consultaSiExiste->num_rows() > 0)
        {
            echo "<div class='alert alert-danger centro'>Upps!! Ya existe dicho solicitante con email << <b>".$this->input->post("EmailSolicitante")."</b> >>. Prueba con otro distinto o revíselo.<span title='Cerrar' class='x'>X</span></div>";
        }
        else
        {
            $data = array ("EmailSolicitante"=>$this->input->post("EmailSolicitante"),
                        "NombreSolicitante"=>$this->input->post("NombreSolicitante"),
                        "ApellidosSolicitante"=>$this->input->post("ApellidosSolicitante"),
                        "TelefonoSolicitante"=>$this->input->post("TelefonoSolicitante"),
                        "TipoDeVehiculo"=>$this->input->post("TipoDeVehiculo"),
                        'Vehiculo' => $this->input->post("Vehiculo"),
                        'PreferenciaDeLlamada' => $this->input->post("PreferenciaDeLlamada")
                        );
            $this->db->insert('Solicitante', $data);
            session_start();
            $_SESSION["nombreSolicitanteSesion"]=$_POST["NombreSolicitante"]; // Sesión iniciada una vez validado todos los posibles errones
            $_SESSION["emailSolicitanteSesion"]=$_POST["EmailSolicitante"];
            redirect ('gracias-promocion', 'location'); // Redirijo a la página de gracias-promocion
        }
    }
/*
    public function fModificarSolicitante ($emailPasar)
    { 
        $consultaSiExiste = $this->db->get_where('Solicitante', array ('EmailSolicitante' => $this->input->post("EmailSolicitante")));
        if ($consultaSiExiste->num_rows() > 0 && $emailPasar != $this->input->post("EmailSolicitante"))
        {
            echo "<div id='cajaCabecera' class='entradaAnadida alert alert-danger'>Upps!! Ya existe dicha solicitud con email < ".$this->input->post("EmailSolicitante")." >. Prueba con otro distinto o revíselo.<span class='x'>X</span></div>";
        }
        else
        {
            $data = array ("EmailSolicitante"=>$this->input->post("EmailSolicitante"),
                        "NombreSolicitante"=>$this->input->post("NombreSolicitante"),
                        "ApellidosSolicitante"=>$this->input->post("ApellidosSolicitante"),
                        "TelefonoSolicitante"=>$this->input->post("TelefonoSolicitante"),
                        "TipoDeVehiculo"=>$this->input->post("TipoDeVehiculo"),
                        'Vehiculo' => $this->input->post("Vehiculo"),
                        'PreferenciaDeLlamada' => $this->input->post("PreferenciaDeLlamada")
                        );
            $this->db->where('EmailSolicitante', $emailPasar);
            $this->db->update('Solicitante', $data);
        }
    }

    public function fBorrarSolicitante ($emailPasar)
    { 
        $this->db->delete('Solicitante', array ('EmailSolicitante' => $emailPasar));
    }

    public function fCargarEseSolicitante ($emailPasar) 
    {
        $query = $this->db->get_where('Solicitante', array ('EmailSolicitante' => $emailPasar));
        $eseSolicitante=$query->row_array();
        return $eseSolicitante;
    }

    public function fCargarSolicitantes ()    
    {
        $query = $this->db->query ("SELECT * FROM Solicitante ORDER BY ApellidosSolicitante, NombreSolicitante");
        $solicitantes=$query->result_array ();
        return $solicitantes;
    }*/
}
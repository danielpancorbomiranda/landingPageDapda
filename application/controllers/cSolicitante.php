<?php 
/*
 * CLASE DEL CONTROLADOR DE SOLICITANTE CON SUS MODELOS PARA 
 * EJECUTAR LOS METODOS SEGUN EL CASO
 */
class cSolicitante extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mSolicitante');    // CARGO EL MODELO 
        $this->load->model('mTipo');    // CARGO EL MODELO 
    }

    public function fCrearSolicitante() // ($preferenciaPasar)
    {
        session_start(); // Para aceder a las variables de sesion asignadas
        session_destroy(); // Destruye todas la variables de sesión
        // $data["preferenciaPasada"]=$preferenciaPasar;
        $data['tipos'] = $this->mTipo->fCargarTipos(); // UTILIZO EL MODELO PARA LOS TIPOS DE VEHICULOS
        $this->load->view('vCabecera'); 
        $this->load->view('vSolicitante/vCrearSolicitante', $data); 
        $this->load->view('vPie'); 
    }    
    
    public function gracias_promocion()
    {
        /* LO CAPO YA QUE NO NO CONSIGO REPARAR EL ERROR "fsockopen(): SSL operation failed with code 1. OpenSSL Error messages: error:14090086:SSL routines:ssl3_get_server_certificate:certificate verify failed"

        //cargamos la libreria email de ci
        $this->load->library("email");
         //configuracion para gmail
        $configGmail = array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.gmail.com',
        'smtp_port' => 465,
        'smtp_user' => 'danipanda84@gmail.com',
        'smtp_pass' => '',
        'mailtype' => 'html',
        'charset' => 'utf-8',
        'newline' => "\r\n"
        );    
        
        //cargamos la configuración para enviar con gmail
        $this->email->initialize($configGmail);
        
        $this->email->to("dani_panda_84@hotmail.com");
        $this->email->from('danipanda84@gmail.com','OPEL');
        $this->email->subject('Solicitud promoción OPEL');
        $this->email->message('<h2>Solicitud procesada. Agradecemos su interés.</h2>');
        $this->email->send();
        //con esto podemos ver el resultado
        var_dump($this->email->print_debugger());
        */
        $this->load->view('vCabecera'); 
        $this->load->view('vSolicitante/vGracias_promocion'); 
        $this->load->view('vPie'); 
    }
}
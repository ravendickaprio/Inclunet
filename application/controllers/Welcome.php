<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {	
		parent::__construct();
		$this->load->model('MProfesor');
		$this->load->model('MAlumno');
		$this->load->helper(array('form'));
        $this->load->library('form_validation');
		//$this->load->library('encryption');
	}
	public function Index() {
		$this->load->view("header");
		$data2["org"]= $this->MProfesor->mostrarOrganizaciones();
		$this->load->view("nav",$data2);
		$this->load->view("inicio");
		//$this->load->view("session");
		$this->load->view("footer");
	}
	public function In2() {
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("inicio");
		$this->load->view("exito.php");
		$this->load->view("footer");
	}
	public function In3() {
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("inicio");
		$this->load->view("error.php");
		$this->load->view("footer");
	}
	public function Session() {
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("session");
		$this->load->view("footer");
	}
	public function Validation() {
		//$this->load->view("header");
		/*----------  Login  ----------*/
		$user= $this->input->post('user');
		$pass= $this->input->post('mat');
		
		
		$res= $this->MProfesor->ingresar($user,$pass);
		
		
		if($res==1)
			/*----------  Redirecciona a Controlador  ----------*/
			{redirect("/CProfesor/","location");}
		else	
			{redirect("/Welcome/In3","location");}
		
		
	}
	public function user_exists($username) {
		
	}
	public function RegisterP() {
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("registerP");
		$this->load->view("footer");
	}
	public function RegisterP2() {
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("registerP");
		$this->load->view("error");
		$this->load->view("footer");
	}
	public function RegisterA() {
		$this->load->view("header");
		$data2["org"]= $this->MProfesor->mostrarOrganizaciones();
		$this->load->view("nav",$data2);
		$this->load->view("registerA");
		$this->load->view("footer");
	}
	public function RegisterA2() {
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("registerA");
		$this->load->view("error");
		$this->load->view("footer");
	}
	public function Cerrar(){
		session_destroy();
		unset($_SESSION);
		redirect("/Welcome/","location");
	}
	public function Registrar_Usuario(){
		//$profesor['id']= $this->input->post('mat');
		$Usuario['nombre']= $this->input->post('nombre');
		$Usuario['apellido']= $this->input->post('apellido');
		$Usuario['telefono']= $this->input->post('cel');
		$Usuario['edad']= $this->input->post('edad');
		$Usuario['pass']= $this->input->post('pass');
		$Usuario['correo']= $this->input->post('correo');
		//$this->form_validation->set_rules('mat','mat','required|min_length[8]|max_length[10]');
		$this->form_validation->set_rules('nombre','nombre','required');
		$this->form_validation->set_rules('apellido','apellido','required');
		$this->form_validation->set_rules('cel','cel','numeric|min_length[8]|max_length[14]');
		//$this->form_validation->set_rules('cubi','cubi','min_length[8]|max_length[8]');
		$this->form_validation->set_rules('pass','pass','required');
		$this->form_validation->set_rules('correo','correo','required|valid_email');
		
		//$Usuario['pass']= password_hash($pass, PASSWORD_BCRYPT);

		//$filtro= $this->MProfesor->Permitido($Usuario['id']);

		
        if ($this->form_validation->run() == FALSE)
        {
			redirect("/Welcome/RegisterP2/","location");
        }
        else
        {
			$this->MProfesor->registrar($Usuario);
			
			redirect("/Welcome/In2","location");
        }
		
	}
	public function Registrar_Tutor(){
		//$profesor['id']= $this->input->post('mat');
		$Usuario['nombre']= $this->input->post('nombre');
		$Usuario['apellido']= $this->input->post('apellido');
		$Usuario['telefono']= $this->input->post('cel');
		$Usuario['edad']= $this->input->post('edad');
		$Usuario['pass']= $this->input->post('pass');
		$Usuario['correo']= $this->input->post('correo');
		$tutor['cedula']= $this->input->post('cedula');
		$tutor['organizacion']= $this->input->post('organizacion');
		//$this->form_validation->set_rules('mat','mat','required|min_length[8]|max_length[10]');
		//$this->form_validation->set_rules('nombre','nombre','required');
		//$this->form_validation->set_rules('apellido','apellido','required');
		//$this->form_validation->set_rules('cel','cel','numeric|min_length[8]|max_length[14]');
		//$this->form_validation->set_rules('cubi','cubi','min_length[8]|max_length[8]');
		//$this->form_validation->set_rules('pass','pass','required');
		//$this->form_validation->set_rules('correo','correo','required|valid_email');
		
		//$Usuario['pass']= password_hash($pass, PASSWORD_BCRYPT);

		//$filtro= $this->MProfesor->Permitido($Usuario['id']);

		
        //if ($this->form_validation->run() == FALSE)
        //{
		//	redirect("/Welcome/RegisterP2/","location");
        //}
        //else
        //{	
			//$this->MProfesor->registrar($Usuario);
        	

        	$c=$Usuario['correo'];
        	$alo=$this->MProfesor->devolverID($c);
        	var_dump($alo);
			//$this->MProfesor->registrarT($tutor, );
			//redirect("/Welcome/In2","location");
        //}
		
	}
}

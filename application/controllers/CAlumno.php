<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CAlumno extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('MAlumno');
		$this->load->model('MProfesor');
		$this->load->library('grocery_CRUD');
	}
	public function Index(){
		if ($this->session->userdata('s_level')!==NULL) {
			if ($this->session->userdata('s_level')==="3" ) {
				$data["mensaje"]= $this->MProfesor->Imprimir();
				$data2["curso"]= $this->MAlumno->Fromquien();
				$this->load->view("header");
				$this->load->view("nav",$data2);
				$this->load->view("VAlumno/alumno",$data);
				$this->load->view("footer");
			}
			else
			{
				redirect("/CProfesor/","location");
			}
		}
		else
		{
			redirect("/Welcome/","location");
		}
	}

	public function I2(){
		if ($this->session->userdata('s_level')!==NULL) {
			if ($this->session->userdata('s_level')==="3" ) {
				$data["mensaje"]= $this->MProfesor->Imprimir();
				$data2["curso"]= $this->MAlumno->Fromquien();
				$this->load->view("header");
				$this->load->view("nav",$data2);
				$this->load->view("VAlumno/alumno",$data);
				$this->load->view("exito");
				$this->load->view("footer");
			}
			else
			{
				redirect("/CProfesor/","location");
			}
		}
		else
		{
			redirect("/Welcome/","location");
		}
	}

	public function EditarPerfilA(){
		if ($this->session->userdata('s_level')!==NULL) {
			if ($this->session->userdata('s_level')==="3" ) {
				try {
					
					$crud = new grocery_CRUD();
					//seleccionar tabla
					$crud->set_table('alumno'); //se puede si el crud pero sin ;   crud->  set table ......set subject
					//nombrar tabla
					$crud->where('id',$this->session->userdata('s_id'));
					$crud->set_subject('Perfil');
					$crud->columns('name','lastname','mail','eduprogram','phone'); //('columna1','columna2'...)
					$crud->fields('name','lastname','mail','eduprogram','phone','pass'); //('columna1','columna2'...)
					$crud->display_as('name','Nombre')->display_as('lastname','Apellido')->display_as('mail','Correo')->display_as('cube','Cubiculo')->display_as('ext','Extencion Telefonico')->display_as('pass','Contraseña'); //('columna', 'como se muestra');una por cada
					$crud->field_type('pass', 'password');
					$crud->unset_add()->unset_delete()->unset_export()->unset_print()->unset_read();
					$output= $crud->render();
					//llamar a la vista
					$this->load->view('VProfesor/perfilp',$output);

				} catch (Exception $e) {
					show_error($e->getMessage().'----'.$e->getTraceAsString());
				}
				
			}
			else
			{
				redirect("/CProfesor/","location");
			}
		}
		else
		{
			redirect("/Welcome/","location");
		}
	}
	
}
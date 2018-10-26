<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CProfesor extends CI_Controller {
	function __construct() {
		parent::__construct();
		/*----------  Necesario cargar libreria de Grocery CRUD  ----------*/
		$this->load->library('grocery_CRUD');
		$this->load->model('MProfesor');
		$this->load->model('MAlumno');
		$this->load->helper(array('form'));
        $this->load->library('form_validation');
	}
	public function Index(){
		if ($this->session->userdata('s_level')!==NULL) {
			if ($this->session->userdata('s_level')!=="3" ) {
				$data["mensaje"]= $this->MProfesor->Imprimir();
				$this->load->view("header");
				$this->load->view("nav");
				$this->load->view("VProfesor/profesor",$data);
				#$data["json"]=json_decode(file_get_contents($this->mensaje));
			#echo $this->uri->segment(3);
			#echo $this->uri->segment(4);
			#echo $this->uri->segment(1);
			#echo $this->uri->segment(2);
				$this->load->view("footer");
				# code...
			}
			else{
				redirect("/CAlumno/","location");
			}
			# code...
		} else {
			redirect("/Welcome/","location");
			# code...
		}
	}
	
	public function I2(){
		if ($this->session->userdata('s_level')!==NULL) {
			if ($this->session->userdata('s_level')!=="3" ) {
				$this->load->view("header");
				$this->load->view("nav");
				$data["mensaje"]= $this->MProfesor->Imprimir();
				#$data["json"]=json_decode(file_get_contents($this->mensaje));
				$this->load->view("VProfesor/profesor",$data);
			#echo $this->uri->segment(3);
			#echo $this->uri->segment(4);
			#echo $this->uri->segment(1);
			#echo $this->uri->segment(2);

				$this->load->view("exito");
				$this->load->view("footer");
				# code...
			}
			else{
				redirect("/CAlumno/","location");
			}
			# code...
		} else {
			redirect("/Welcome/","location");
			# code...
		}
	}
	/*============================================
	=            Vista de Abrir Curso            =
	============================================*/

	
	/*===========================================================
	=            Gorcery para Editar Cursos Profesor            =
	===========================================================*/
	public function EditarMensajesP(){
		if ($this->session->userdata('s_level')!==NULL) {
			if ($this->session->userdata('s_level')!=="3" ) {
				try {
					$crud = new grocery_CRUD();
					//seleccionar tabla
					$crud->set_table('mensajes'); //se puede si el crud pero sin ;   crud->  set table ......set subject
					//nombrar tabla
					$crud->set_subject('Mensaje');
					$crud->where('idProfe',$this->session->userdata('s_id'));
					
					$crud->set_relation('idMateria','materia','name');//seleciona relacion y despliega en nombre real
					$crud->columns('idMateria','Mensaje'); //('columna1','columna2'...)
					$crud->fields('idMateria','Mensaje'); //('columna1','columna2'...)
					$crud->display_as('idMateria','Materia')->display_as('Mensaje','Mensaje'); //('columna', 'como se muestra');una por cada
					$crud->unset_add()->unset_export()->unset_print();//->unset_read()->unset_delete();

					$output= $crud->render();
					//llamar a la vista
					$this->load->view('VProfesor/cursos.php',$output);
				} catch (Exception $e) {
					show_error($e->getMessage().'----'.$e->getTraceAsString());
				}
				
			}
			else{
				redirect("/CAlumno/","location");
			}
			# code...
		} else {
			redirect("/Welcome/","location");
			# code...
		}
	}
	/*=====  End of Gorcery para Editar Cursos Profesor  ======*/
	/*======================================
	=            RegistraAlumno            =
	======================================*/
	
	public function RegistraAlumno(){
		if ($this->session->userdata('s_level')!==NULL) {
			if ($this->session->userdata('s_level')!=="3" ) {
				$idAlumno=$this->input->post('alumnos');
				$idCurso=$this->input->post('curso');
				if($idCurso==NULL){
					$data["ress2"]= $this->MProfesor->seleccionacurso();
					$data["ress3"]= $this->MAlumno->seleccionaalumno();
					$this->load->view("header");
					$this->load->view("nav");
					$this->load->view("error");
					$this->load->view("VProfesor/VIngresarAlumnos",$data);
					$this->load->view("footer");
				}
				else{
					$this->MProfesor->RegistrarAlumnosAMateria($idAlumno,$idCurso);
					redirect("/CProfesor/I2","location");
				}
			}
			else{
				redirect("/CAlumno/","location");
			}
			# code...
		} else {
			redirect("/Welcome/","location");
			# code...
		}
	}
	/*=====  End of RegistraAlumno  ======*/
	
	
	/*===============================================
	=            Vew de Ingresar Alumnos            =
	===============================================*/
	public function IngresarAlumnos(){
		if ($this->session->userdata('s_level')!==NULL) {
			if ($this->session->userdata('s_level')!=="3" ) {
				$data["ress2"]= $this->MProfesor->seleccionacurso();
				if($data["ress2"]==false){
					$this->load->view("header");
					$this->load->view("nav");
					$data["mensaje"]= $this->MProfesor->Imprimir();
					$this->load->view("erroresp",$data);
					$this->load->view("VProfesor/profesor",$data);
					$this->load->view("footer");
				}
				else{
					$data["ress3"]= $this->MAlumno->seleccionaalumno();
					$this->load->view("header");
					$this->load->view("nav");
					$this->load->view("VProfesor/VIngresarAlumnos",$data);
					$this->load->view("footer");
				}
				
			}
			else{
				redirect("/CAlumno/","location");
			}
			# code...
		} else {
			redirect("/Welcome/","location");
			# code...
		}
	}
	
	
	/*=====  End of Vew de Ingresar Alumnos  ======*/
	

	
} 
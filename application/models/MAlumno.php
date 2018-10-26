<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MAlumno extends CI_Model {
	/*===================================================
	=            Funcion-Metodo de Ingresar            =
	===================================================*/
	
	public function ingresar ($user, $pass){

		$this->db->select('*');
		$this->db->from('alumno a');
		$this->db->where('a.correo',$user);
		//$this->db->where('a.pass',$pass);
		/*----------  Obtener la Query  ----------*/
		$ress=$this->db->get();
		if($ress->num_rows()==1){
			$r=$ress->row();
			if(password_verify($pass, $r->pass)){
				$s_usuario=array(
					's_id' => $r->id,
					's_name'=> $r->name,
					's_mail'=> $r->mail,
					's_phone'=> $r->phone,
					's_eduprogram'=> $r->eduprogram,
					's_level'=>"3",
					's_lastname'=>$r->lastname	);
				/*----------  Crea el Session  ----------*/
				$this->session->set_userdata($s_usuario);
				return 1;
			}
			else
			{
				return 0;
			}
		} else {
			return 0;
		}
	}
	/*=====  End of Funcion-Metodo de Ingresar  ======*/
	/*========================================
	=            Metodo Registrar            =
	========================================*/
	
	public function registrar($alumno){
		$campos= array(
			'id'=> $alumno['id'],
			'name'=> $alumno['name'],
			'lastname'=> $alumno['name2'],
			'mail'=> $alumno['mail'],
			'phone'=> $alumno['phone'],
			'eduprogram'=> $alumno['eduprogram'],
			'pass'=> $alumno['pass']
		);
		$this->db->insert('alumno',$campos);
	}
	
	
	/*=====  End of Metodo Registrar  ======*/

	/*========================================
	=            Metodo Actualizar            =
	========================================*/
	public function actualizar2($alumno){
		$campos= array(
			
			'name'=> $alumno['name'],
			'lastname'=> $alumno['name2'],
			'mail'=> $alumno['mail'],
			'phone'=> $alumno['phone'],
			'eduprogram'=> $alumno['eduprogram'],
			'pass'=> $alumno['pass']
			
			
		);
		$this->db->where('id',$this->session->userdata('s_id'));
		$this->db->update('alumno',$campos);
	}
	
	/*=====  End of Metodo Actualizar  ======*/

	/*========================================
	=            Metodo Actualizar            =
	========================================*/
	public function actualizar1($alumno){
		$campos= array(
			
			'name'=> $alumno['name'],
			'lastname'=> $alumno['name2'],
			'mail'=> $alumno['mail'],
			'phone'=> $alumno['phone'],
			'eduprogram'=> $alumno['eduprogram']
			
			
		);
		$this->db->where('id',$this->session->userdata('s_id'));
		$this->db->update('alumno',$campos);
	}
	
	/*=====  End of Metodo Actualizar  ======*/
	/*==========================================
	=            seleccionaalumno()            =
	==========================================*/
	public function seleccionaalumno (){
		$this->db->select('a.id,a.name,a.lastname');
		$this->db->from('alumno a');
		$ress=$this->db->get();
		if($ress->num_rows()>0){
			return $ress->result();
		} else {
			return false;
		}
	}
	
	
	/*=====  End of seleccionaalumno()  ======*/
	
	public function Check($user, $password) {
		$this->db->select("id, name, pass, level")->where("id",$user)->where("pass",$password);
		$fetch = $this->db->get("profesor");
		if ($fetch->num_rows() > 0)
			return $fetch->result();
		else
			return false;
	}
	
	
}

/* End of file mProfesor.php */
/* Location: ./application/models/mProfesor.php */
	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class MProfesor extends CI_Model {
		/*=======================================
		=            Metodo Ingresar            =
		=======================================*/
		public function ingresar ($user, $pass){
			$this->db->select('*');
			$this->db->from('usuario p');
			$this->db->where('p.correo',$user);
			$this->db->where('p.password',$pass);
			$ress=$this->db->get();
			if($ress->num_rows()==1){
				$r=$ress->row();
				//if(password_verify($pass, $r->password)){
					$s_usuario=array(
						's_id' => $r->id_usuario,
						's_name'=> $r->nombre,
						's_level'=>"2"
						);
					$this->session->set_userdata($s_usuario);
					return 1;
				
			} else {
				return 0;
			}
		}
		
		/*=====  End of Metodo Ingresar  ======*/
	
			public function seleccionarTutor(){
			/*$this->db->select('c.idClave,c.idProfesor,c.idMateria, m.name,');
			$this->db->from('cursos c ,materia m ');
			$this->db->where('c.idProfesor',$this->session->userdata('s_id'));
			//$this->db->where('c.idMateria','m.id');
			$this->db->join('materia',' c.idMateria = m.id');*/
			//$ress=$this->db->get();
			$profe=$this->session->userdata('s_id');
					$query2=" ";
			$ress=$this->db->query($query2);
			if($ress->num_rows()>0){
				return $ress->result();
			} else {
				return false;
			}
			return $ress;
		}
		
		/*=====  End of Mostrar Tabla Materas  ======*/

		/*========================================
		=            Metodo Registrar            =
		========================================*/
		public function registrar($Usuario){
			$campos= array(
				
				'nombre '=>$Usuario['nombre'],
				'apellido'=> $Usuario['apellido'],
				'correo'=>$Usuario['correo'],
				'edad'=>$Usuario['edad'],
				'telefono'=>$Usuario['telefono'],
				'password'=>$Usuario['pass'],
			);
			$this->db->insert('usuario',$campos);
		}

		public function registrarT($tutor, $id){
			$campos= array(
				'cedula'=> $tutor['cedula'],
				'id_organizacion'=> $tutor['organizacion'],
				'usuario_id'=>$tutor['id']

			);
			$this->db->insert('tutor',$campos);
		}
		

		public function devolverID($correo){
			
			$this->db->select('id_usuario');
			$this->db->from('usuario p');
			$this->db->where('p.correo',$correo);
			$fetch=$this->db->get();
			
			if ($fetch->num_rows() > 0){
				return $fetch->result();
			}
			else
			{
				return false;
			}
		}
		/*=====  End of Metodo Registrar  ======*/


		
	###########registrar mensaje#################3
		public function Mandar($curso){
			$camp= array(
				'Mensaje'=>$curso['msj'],
				'idMateria'=>$curso['curso'],
				'idProfe'=>$curso['prof'],
				'fecha'=>$curso['fecha']

			);
			$this->db->insert('mensajes',$camp);
		}
	################sacar mensajes de la tabla#####################
		public function Imprimir(){
			$this->db->select('*');
			$this->db->from('mensajes m');
			$this->db->order_by("id_mensaje", "DESC");
			$ress=$this->db->get();
			if($ress->num_rows()>0){
				return $ress->result();
			} else {
				return false;
			}
		}


		public function mostrarOrganizaciones(){
			$this->db->select('id_organizacion, nombre');
			$this->db->from('organizacion');
			$ress=$this->db->get();
			if($ress->num_rows()>0){
				return $ress->result();
			} else {
				return false;
			}
		}
}

	/* End of file mProfesor.php */
	/* Location: ./application/models/mProfesor.php */
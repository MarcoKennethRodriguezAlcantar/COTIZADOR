<?php
/**
 * 
 */
class Mlogin extends CI_Model
{
	//Validacin de ususario y contraseña
	public function ingresar($usu,$pass)
	{
		$this->db->select('u.idusuarios, u.nombre, u.appaterno, u.apmaterno, u.correo, u.puesto, u.clave');
		$this->db->from('usuarios u');
		$this->db->where('u.correo',$usu);
		$this->db->or_where('u.numero', $usu);
		
		$resultado = $this->db->get();
		$r = $resultado->row_array();

		if ($pass == $r['clave']) {
			$s_usuario = array(
				's_idusuarios' => $r['idusuarios'],
				's_puesto' => $r['puesto'],
				's_usuario' => $r['appaterno']." ".$r['appaterno']
			);

			$this->session->set_userdata($s_usuario);
			return 1;
		}else{
			return 0;
		}		
	}

	//existe ususario
	public function verificarusuario($usu)
	{
		$this->db->select('u.idusuarios');
		$this->db->from('usuarios u');
		$this->db->where('u.correo',$usu);
		$this->db->or_where('u.numero', $usu);
		
		$resultado = $this->db->get();
		if($resultado->num_rows() == 1){
			return 1;
		}else{
			return 0;
		}
	}

	//datos de correo
	public function get_correo($email)
	{
		$this->db->select('idusuarios, nombre, appaterno, apmaterno, correo, puesto, clave');
		$this->db->from('usuarios');
		$this->db->where('correo',$email);
		$resultado = $this->db->get();
		return $resultado;
	}

	//creacion de token
	public function inserttoken($user_token)
	{
		$this->db->insert('user_token',$user_token);
	}

	//eliminacion de token
	public function deletetoken($email)
	{
		$this->db->where('user',$email);
		$this->db->delete('user_token');
	}

	//dato token
	public function get_token($token)
	{
		$this->db->select('iduser_token, user, token, date_create');
		$this->db->from('user_token');
		$this->db->where('token',$token);
		$resultadotoken = $this->db->get();
		return $resultadotoken;
	}

	//update clave
	public function update_clave($email,$password)
	{	
		$this->db->set('clave', $password);
        $this->db->where('correo', $email);
        $this->db->update('usuarios');
        $this->deletetoken($email);
	}
}

//CREATE EVENT mievento
//ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 10 MINUTE
//DO
//DELETE FROM user_token
//WHERE date_create <= SUBDATE(NOW(), INTERVAL 10 MINUTE);
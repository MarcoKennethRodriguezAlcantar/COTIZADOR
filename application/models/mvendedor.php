<?php
/**
 * 
 */
class Mvendedor extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getClientes()
	{
		$s = $this->db->get('clientes');
		$clientes = $s->result_array();
		return $clientes;
	}

	public function getCliente($postData=array())
	{
		$response = array();

		$this->db->select('*');
		$this->db->where('idclientes',$postData['nombre']);
		$s = $this->db->get('clientes');
		$response = $s->result_array();
 		return $response;
	}

}
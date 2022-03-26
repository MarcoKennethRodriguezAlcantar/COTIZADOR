<?php
/**
 * 
 */
class Madmin extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function guardar($param)
	{
		$campos = array(
			'nombre' => $param['nombre'],
			'appaterno' => $param['appaterno'],
			'apmaterno' => $param['apmaterno'],
			'numero' => $param['numero'],
			'correo' => $param['correo'],
			'clave' => $param['clave'],
			'puesto' => $param['puesto']
		);
		$this->db->insert('usuarios',$campos);

		return $this->db->insert_id();
	}

	public function guardarcliente($param)
	{
		$campos = array(
			'nombre' => $param['nombre'],
			'contacto' => $param['contacto'],
			'ciudad' => $param['ciudad'],
			'numero' => $param['numero'],
			'direccion' => $param['direccion'],
			'email' => $param['correo']
		);
		$this->db->insert('clientes',$campos);

		return $this->db->insert_id();
	}

	public function guardarproducto($param)
	{
		$campos = array(
			'modelo' => $param['modelo'],
			'altura' => $param['altura'],
			'base' => $param['base'],
			'material_marco' => $param['material_marco'],
			'material_cristal' => $param['material_cristal'],
			'descripcion' => $param['descripcion'],
			'color' => $param['color'],
			'ancho_perfil' => $param['ancho_perfil'],
			'acabado' => $param['acabado'],
			'peso' => $param['peso'],
			'imagen' => $param['imagen'],
			'cantidad' => $param['cantidad'],
			'costo_produccion' => $param['costo_produccion'],
			'precio_publico' => $param['precio_publico']

		);
		if ($param['tipo'] == "Ventana") {
			$this->db->insert('ventanas',$campos);
		} else if($param['tipo'] == "Cancel"){
			$this->db->insert('canceles',$campos);
		} else if($param['tipo'] == "Puerta"){
			$this->db->insert('puertas',$campos);
		}
		
		return $this->db->insert_id();
	}

	public function guardarmaterial($param)
	{
		$campos = array(
			'nombre' => $param['nombre'],
			'descripcion' => $param['descripcion'],
			'cantidad' => $param['cantidad'],
			'unidad' => $param['unidad'],
			'costo' => $param['costo'],
			'tipo' => $param['tipo']
		);
		$this->db->insert('materiales',$campos);

		return $this->db->insert_id();
	}

	public function updateususario($param,$id)
	{
		$campos = array(
			'nombre' => $param['nombre'],
			'appaterno' => $param['appaterno'],
			'apmaterno' => $param['apmaterno'],
			'correo' => $param['correo'],
			'numero' => $param['numero'],
			'puesto' => $param['puesto']
		);

		$this->db->where('idusuarios',$id);
		$this->db->update('usuarios',$campos);

		return 1;
	}

	public function updatecliente($param,$id)
	{
		$campos = array(
			'nombre' => $param['nombre'],
			'contacto' => $param['contacto'],
			'ciudad' => $param['ciudad'],
			'numero' => $param['numero'],
			'direccion' => $param['direccion'],
			'email' => $param['correo']
		);

		$this->db->where('idclientes',$id);
		$r = $this->db->update('clientes',$campos);

		if ($r == TRUE) {
			return 1;
		}else{
			return 0;
		}
	}

	public function updateventana($param,$id)
	{
		if ($param['imagen'] == "vacio") {
			$campos = array(
			'modelo' => $param['modelo'],
			'altura' => $param['altura'],
			'base' => $param['base'],
			'material_marco' => $param['material_marco'],
			'material_cristal' => $param['material_cristal'],
			'descripcion' => $param['descripcion'],
			'color' => $param['color'],
			'ancho_perfil' => $param['ancho_perfil'],
			'acabado' => $param['acabado'],
			'peso' => $param['peso'],
			'cantidad' => $param['cantidad'],
			'costo_produccion' => $param['costo_produccion'],
			'precio_publico' => $param['precio_publico']
			);
		}else {
			$campos = array(
			'modelo' => $param['modelo'],
			'altura' => $param['altura'],
			'base' => $param['base'],
			'material_marco' => $param['material_marco'],
			'material_cristal' => $param['material_cristal'],
			'descripcion' => $param['descripcion'],
			'color' => $param['color'],
			'ancho_perfil' => $param['ancho_perfil'],
			'acabado' => $param['acabado'],
			'peso' => $param['peso'],
			'imagen' => $param['imagen'],
			'cantidad' => $param['cantidad'],
			'costo_produccion' => $param['costo_produccion'],
			'precio_publico' => $param['precio_publico']
			);
		}
		

		$this->db->where('idventanas',$id);
		$r = $this->db->update('ventanas',$campos);

		if ($r == TRUE) {
			return 1;
		}else{
			return 0;
		}
	}

	public function updatecancel($param,$id)
	{
		$campos = array(
			'modelo' => $param['modelo'],
			'altura' => $param['altura'],
			'base' => $param['base'],
			'material_marco' => $param['material_marco'],
			'material_cristal' => $param['material_cristal'],
			'descripcion' => $param['descripcion'],
			'color' => $param['color'],
			'ancho_perfil' => $param['ancho_perfil'],
			'acabado' => $param['acabado'],
			'peso' => $param['peso'],
			'imagen' => $param['imagen'],
			'cantidad' => $param['cantidad'],
			'costo_produccion' => $param['costo_produccion'],
			'precio_publico' => $param['precio_publico']
		);

		$this->db->where('idcanceles',$id);
		$r = $this->db->update('canceles',$campos);

		if ($r == TRUE) {
			return 1;
		}else{
			return 0;
		}
	}

	public function updatepuerta($param,$id)
	{
		$campos = array(
			'modelo' => $param['modelo'],
			'altura' => $param['altura'],
			'base' => $param['base'],
			'material_marco' => $param['material_marco'],
			'material_cristal' => $param['material_cristal'],
			'descripcion' => $param['descripcion'],
			'color' => $param['color'],
			'ancho_perfil' => $param['ancho_perfil'],
			'acabado' => $param['acabado'],
			'peso' => $param['peso'],
			'imagen' => $param['imagen'],
			'cantidad' => $param['cantidad'],
			'costo_produccion' => $param['costo_produccion'],
			'precio_publico' => $param['precio_publico']
		);

		$this->db->where('idpuertas',$id);
		$r = $this->db->update('puertas',$campos);

		if ($r == TRUE) {
			return 1;
		}else{
			return 0;
		}
	}

	public function updatematerial($param,$id)
	{
		$campos = array(
			'nombre' => $param['nombre'],
			'descripcion' => $param['descripcion'],
			'cantidad' => $param['cantidad'],
			'unidad' => $param['unidad'],
			'costo' => $param['costo'],
			'tipo' => $param['tipo']
		);

		$this->db->where('idmateriales',$id);
		$r = $this->db->update('materiales',$campos);

		if ($r == TRUE) {
			return 1;
		}else{
			return 0;
		}
	}

	public function eliminarPersona($idP)
	{
		$this->db->where('idusuarios',$idP);
		$this->db->delete('usuarios');
	}

	public function eliminarcliente($idC)
	{
		$this->db->where('idclientes',$idC);
		$this->db->delete('clientes');
	}

	public function eliminarventana($idC)
	{
		$this->db->where('idventanas',$idC);
		$this->db->delete('ventanas');
	}

	public function eliminarcancel($idC)
	{
		$this->db->where('idcanceles',$idC);
		$this->db->delete('canceles');
	}

	public function eliminarpuerta($idC)
	{
		$this->db->where('idpuertas',$idC);
		$this->db->delete('puertas');
	}

	public function eliminarmaterial($idC)
	{
		$this->db->where('idmateriales',$idC);
		$this->db->delete('materiales');
	}

	public function getUsuarios()
	{
		$this->db->select('idusuarios, nombre, appaterno, apmaterno, correo, numero,  puesto');
		$this->db->from('usuarios');
		$this->db->order_by('idusuarios','DESC');
		$s = $this->db->get();
		return $s->result();
	}

	public function getUsuario($idP)
	{
		$this->db->from('usuarios');
		$this->db->where('idusuarios',$idP);
		$s = $this->db->get();
		return $s->result();
	}

	public function getcliente($idC)
	{
		$this->db->from('clientes');
		$this->db->where('idclientes',$idC);
		$s = $this->db->get();
		return $s->result();
	}

	public function getClientes()
	{
		$this->db->select('idclientes, nombre, contacto, ciudad, numero, direccion,  email');
		$this->db->from('clientes');
		$this->db->order_by('idclientes','DESC');
		$s = $this->db->get();
		return $s->result();
	}

	public function getVentanas()
	{
		
		$this->db->from('ventanas');
		$this->db->order_by('idventanas','DESC');
		$s = $this->db->get();
		return $s->result();
	}

	public function getventana($idC)
	{
		$this->db->from('ventanas');
		$this->db->where('idventanas',$idC);
		$s = $this->db->get();
		return $s->result();
	}

	public function getCanceles()
	{
		$this->db->from('canceles');
		$this->db->order_by('idcanceles','DESC');
		$s = $this->db->get();
		return $s->result();
	}

	public function getcancel($idC)
	{
		$this->db->from('canceles');
		$this->db->where('idcanceles',$idC);
		$s = $this->db->get();
		return $s->result();
	}

	public function getPuertas()
	{
		$this->db->from('puertas');
		$this->db->order_by('idpuertas','DESC');
		$s = $this->db->get();
		return $s->result();
	}

	public function getpuerta($idC)
	{
		$this->db->from('puertas');
		$this->db->where('idpuertas',$idC);
		$s = $this->db->get();
		return $s->result();
	}

	public function getMateriales()
	{
		$this->db->from('materiales');
		$this->db->order_by('idmateriales','DESC');
		$s = $this->db->get();
		return $s->result();
	}

	public function getmaterial($idC)
	{
		$this->db->from('materiales');
		$this->db->where('idmateriales',$idC);
		$s = $this->db->get();
		return $s->result();
	}

}
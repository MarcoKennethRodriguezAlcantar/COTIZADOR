<?php
class Cadmin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('madmin');
		$this->load->model('musuario');
	}

	//index_view_admin
	public function index()
	{
        $data["p"] = $this->madmin->getUsuarios();
        $data["a"] = null;

        $this->session->set_flashdata('message','');
        
		$this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/personal/vtablausuarios',$data);
		$this->load->view('layout/footer');
	}

	//view registro de usuario
	public function viewregistro()
	{
		$this->session->set_flashdata('message','');

		$this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/personal/vadminregistro');
		$this->load->view('layout/footer');
	}

	//view tabla clientes
	public function vtablaclientes()
	{
        $data["p"] = $this->madmin->getClientes();
        $data["a"] = null;

        $this->session->set_flashdata('message','');
        
		$this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/clientes/vtablaclientes',$data);
		$this->load->view('layout/footer');
	}

	//view registro de cliente
	public function vregistroclientes()
	{
		$this->session->set_flashdata('message','');

		$this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/clientes/vregistroclientes');
		$this->load->view('layout/footer');
	}

	//view tabla materiales
	public function vtablamateriales()
	{
        $data["p"] = $this->madmin->getMateriales();
        $data["a"] = null;

        $this->session->set_flashdata('message','');
        
		$this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/material/vtablamaterial',$data);
		$this->load->view('layout/footer');
	}

	//view registro de materiales
	public function vregistromateriales()
	{
		$this->session->set_flashdata('message','');

		$this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/material/vregistromaterial');
		$this->load->view('layout/footer');
	}

	//view tabla productos ventana
	public function vtablaventanas()
	{
        $data["p"] = $this->madmin->getVentanas();
        $data["a"] = null;

        $this->session->set_flashdata('message','');
        
		$this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/productos/vtablaventanas',$data);
		$this->load->view('layout/footer');
	}

	//view tabla productos canceles
	public function vtablacanceles()
	{
        $data["p"] = $this->madmin->getCanceles();
        $data["a"] = null;

        $this->session->set_flashdata('message','');
        
		$this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/productos/vtablacanceles',$data);
		$this->load->view('layout/footer');
	}

	//view tabla productos puertas
	public function vtablapuertas()
	{
        $data["p"] = $this->madmin->getPuertas();
        $data["a"] = null;

        $this->session->set_flashdata('message','');
        
		$this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/productos/vtablapuertas',$data);
		$this->load->view('layout/footer');
	}

	//view registro de producto
	public function vregistroproducto()
	{
		$data["p"] = $this->madmin->getMateriales();	

		$this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/productos/vregistroproducto',$data);
		$this->load->view('layout/footer');
	}
	
	//registro de ususario btn
	public function guardar()
	{
		$this->form_validation->set_rules('txtNombre', 'nombre', 'trim|required');
		$this->form_validation->set_rules('txtAppaterno', 'apellido paterno', 'trim|required');
		$this->form_validation->set_rules('txtApmaterno', 'apellido materno', 'trim|required');
		$this->form_validation->set_rules('txtEmail', 'correo', 'trim|required|valid_email');
		$this->form_validation->set_rules('txtNumero', 'numero', 'trim|min_length[10]|max_length[10]|is_natural|required');
		$this->form_validation->set_rules('txtClave', 'password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header');
			$this->load->view('layout/menuadmin');
			$this->load->view('admin/personal/vadminregistro');
			$this->load->view('layout/footer');
		}else{
			$param['nombre'] = $this->input->post('txtNombre');
			$param['appaterno'] = $this->input->post('txtAppaterno');
			$param['apmaterno'] = $this->input->post('txtApmaterno');
			$param['correo'] = $this->input->post('txtEmail');
			$param['numero'] = $this->input->post('txtNumero');
			$param['clave'] = sha1($this->input->post('txtClave'));
			$param['puesto'] = $this->input->post('txtPuesto');
		
			$res= $this->madmin->guardar($param);

			if ($res != null) {
				$data["p"] = $this->madmin->getUsuarios();
		        $data["a"] = null;		        

				$this->session->set_flashdata('message',
				'<div class="alert alert-success alert-dismissible">
        			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        			<h4><i class="icon fa fa-check"></i> Exito!</h4>Usuario creado con exito.
        		</div>');

        		$this->load->view('layout/header');
				$this->load->view('layout/menuadmin');
				$this->load->view('admin/personal/vtablausuarios',$data);
				$this->load->view('layout/footer');
			}else{
				$data["p"] = $this->madmin->getUsuarios();
		        $data["a"] = null;

				$this->session->set_flashdata('message',
				'<div class="alert alert-danger alert-dismissible">
            		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               		<h4><i class="icon fa fa-ban"></i> Error!</h4>Usuario no registrado.
            	</div>');

            	$this->load->view('layout/header');
				$this->load->view('layout/menuadmin');
				$this->load->view('admin/personal/vtablausuarios',$data);
				$this->load->view('layout/footer');
			}
		}	
	}

	//registro de cliente btn
	public function guardarcliente()
	{
		$this->form_validation->set_rules('txtNombre', 'nombre', 'trim|required');
		$this->form_validation->set_rules('txtContacto', 'contacto', 'trim|required');
		$this->form_validation->set_rules('txtCiudad', 'ciudad', 'trim|required');
		$this->form_validation->set_rules('txtNumero', 'numero', 'trim|min_length[10]|max_length[10]|is_natural|required');
		$this->form_validation->set_rules('txtDireccion', 'direccion', 'trim|required');
		$this->form_validation->set_rules('txtEmail', 'correo', 'trim|required|valid_email');
		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header');
			$this->load->view('layout/menuadmin');
			$this->load->view('admin/clientes/vregistroclientes');
			$this->load->view('layout/footer');
		}else{
			$param['nombre'] = $this->input->post('txtNombre');
			$param['contacto'] = $this->input->post('txtContacto');
			$param['ciudad'] = $this->input->post('txtCiudad');
			$param['numero'] = $this->input->post('txtNumero');
			$param['direccion'] = $this->input->post('txtDireccion');
			$param['correo'] = $this->input->post('txtEmail');
		
			$res= $this->madmin->guardarcliente($param);

			if ($res != null) {
				$data["p"] = $this->madmin->getClientes();
		        $data["a"] = null;

				$this->session->set_flashdata('message',
				'<div class="alert alert-success alert-dismissible">
        			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        			<h4><i class="icon fa fa-check"></i> Exito!</h4>Cliente creado con exito.
        		</div>');
        		
        		$this->load->view('layout/header');
				$this->load->view('layout/menuadmin');
				$this->load->view('admin/clientes/vtablaclientes',$data);
				$this->load->view('layout/footer');
			}else{
				$data["p"] = $this->madmin->getClientes();
		        $data["a"] = null;

				$this->session->set_flashdata('message',
				'<div class="alert alert-danger alert-dismissible">
            		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               		<h4><i class="icon fa fa-ban"></i> Error!</h4>Cliente no registrado.
            	</div>');
            	
            	$this->load->view('layout/header');
				$this->load->view('layout/menuadmin');
				$this->load->view('admin/clientes/vtablaclientes',$data);
				$this->load->view('layout/footer');
			}
		}	
	}

	public function username_check($str)
        {
                if ($str == null)
                {
                        $this->form_validation->set_message('username_check', 'The {field} field can not be the word "test"');
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }
        }

	//registro de producto btn
	public function guardarproducto()
	{
		$this->form_validation->set_rules('txtModelo', 'modelo', 'trim|required');
		$this->form_validation->set_rules('txtAltura', 'altura', 'trim|required|is_numeric');
		$this->form_validation->set_rules('txtBase', 'base', 'trim|required|is_numeric');
		
		$this->form_validation->set_rules('txtMaterialm', 'material de marco', 'trim|required');

		$this->form_validation->set_rules('txtMaterialc', 'material de cristal', 'trim|required');
		$this->form_validation->set_rules('txtDescripcion', 'descripcion', 'trim|required');
		$this->form_validation->set_rules('txtColor', 'color', 'trim|required');
		$this->form_validation->set_rules('txtAnchop', 'ancho de perfil', 'trim|required|is_numeric');
		$this->form_validation->set_rules('txtAcabado', 'acabado', 'trim|required');
		$this->form_validation->set_rules('txtPeso', 'peso', 'trim|required|is_numeric');
		$this->form_validation->set_rules('txtProduccion', 'costo produccion', 'trim|required|is_numeric');
		$this->form_validation->set_rules('txtCantidad', 'cantidad', 'trim|required|is_numeric');
		$this->form_validation->set_rules('txtPrecio', 'precio publico', 'trim|required|is_numeric');
		$param['tipo'] = $this->input->post('txtTipo');
		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header');
			$this->load->view('layout/menuadmin');
			$this->load->view('admin/productos/vregistroproducto');
			$this->load->view('layout/footer');
		}else{
			$mi_archivo = 'txtImagen';
			if ($this->input->post('txtTipo') == "Ventana") {
				 $config['upload_path'] = "assets/img/productos/ventanas";
			}elseif ($this->input->post('txtTipo') == "Puerta") {
				$config['upload_path'] = "assets/img/productos/puertas";
			}elseif ($this->input->post('txtTipo') == "Cancel") {
				$config['upload_path'] = "assets/img/productos/canceles";
			} 
            $config['allowed_types'] = "*";
            $config['max_size'] = "50000";
            $config['max_width'] = "2000";
            $config['max_height'] = "2000";

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($mi_archivo)) {
                //* ocurrio un error
                $data['uploadError'] = $this->upload->display_errors();
                echo $this->upload->display_errors();
                return;
            }

            $data['uploadSuccess'] = $this->upload->data();

 			$img = $data['uploadSuccess']['file_name'];

			$param['modelo'] = $this->input->post('txtModelo');
			$param['altura'] = $this->input->post('txtAltura');
			$param['base'] = $this->input->post('txtBase');
			$param['material_marco'] = $this->input->post('txtMaterialm');
			$param['material_cristal'] = $this->input->post('txtMaterialc');
			$param['descripcion'] = $this->input->post('txtDescripcion');
			$param['color'] = $this->input->post('txtColor');
			$param['ancho_perfil'] = $this->input->post('txtAnchop');
			$param['acabado'] = $this->input->post('txtAcabado');
			$param['peso'] = $this->input->post('txtPeso');
			$param['imagen'] = $img;
			$param['cantidad'] = $this->input->post('txtCantidad');
			$param['costo_produccion'] = $this->input->post('txtProduccion');
			$param['precio_publico'] = $this->input->post('txtPrecio');
			$res= $this->madmin->guardarproducto($param);

			if ($this->input->post('txtTipo') == "Ventana") {
				$data["p"] = $this->madmin->getVentanas();
		        $data["a"] = null;

		        $this->session->set_flashdata('message',
				'<div class="alert alert-success alert-dismissible">
        			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        			<h4><i class="icon fa fa-check"></i> Exito!</h4>Ventana creada con exito.
        		</div>');

				$this->load->view('layout/header');
				$this->load->view('layout/menuadmin');
				$this->load->view('admin/productos/vtablaventanas',$data);
				$this->load->view('layout/footer');
				
			}else if($this->input->post('txtTipo') == "Cancel"){
				$data["p"] = $this->madmin->getCanceles();
		        $data["a"] = null;

		        $this->session->set_flashdata('message',
				'<div class="alert alert-success alert-dismissible">
        			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        			<h4><i class="icon fa fa-check"></i> Exito!</h4>Cancel creado con exito.
        		</div>');

				$this->load->view('layout/header');
				$this->load->view('layout/menuadmin');
				$this->load->view('admin/productos/vtablacanceles',$data);
				$this->load->view('layout/footer');
			}else if($this->input->post('txtTipo') == "Puerta"){
				$data["p"] = $this->madmin->getPuertas();
		        $data["a"] = null;

		        $this->session->set_flashdata('message',
				'<div class="alert alert-success alert-dismissible">
        			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        			<h4><i class="icon fa fa-check"></i> Exito!</h4>Puerta creada con exito.
        		</div>');

				$this->load->view('layout/header');
				$this->load->view('layout/menuadmin');
				$this->load->view('admin/productos/vtablapuertas',$data);
				$this->load->view('layout/footer');
			}
		}	
	}

	//registro de material btn
	public function guardarmaterial()
	{
		$this->form_validation->set_rules('txtNombre', 'nombre', 'trim|required');
		$this->form_validation->set_rules('txtDescripcion', 'descripcion', 'trim|required');
		$this->form_validation->set_rules('txtCantidad', 'cantidad', 'trim|required');
		$this->form_validation->set_rules('txtUnidad', 'unidad', 'trim|required');
		$this->form_validation->set_rules('txtCosto', 'costo', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header');
			$this->load->view('layout/menuadmin');
			$this->load->view('admin/material/vregistromaterial');
			$this->load->view('layout/footer');
		}else{
			$param['nombre'] = $this->input->post('txtNombre');
			$param['descripcion'] = $this->input->post('txtDescripcion');
			$param['cantidad'] = $this->input->post('txtCantidad');
			$param['unidad'] = $this->input->post('txtUnidad');
			$param['costo'] = $this->input->post('txtCosto');
			$param['tipo'] = $this->input->post('txtTipo');
		
			$res= $this->madmin->guardarmaterial($param);

			if ($res != null) {
				$data["p"] = $this->madmin->getMateriales();
        		$data["a"] = null;

				$this->session->set_flashdata('message',
				'<div class="alert alert-success alert-dismissible">
        			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        			<h4><i class="icon fa fa-check"></i> Exito!</h4>Material creado con exito.
        		</div>');
        		
        		$this->load->view('layout/header');
				$this->load->view('layout/menuadmin');
				$this->load->view('admin/material/vtablamaterial',$data);
				$this->load->view('layout/footer');
			}else{
				$data["p"] = $this->madmin->getMateriales();
        		$data["a"] = null;

        		$this->session->set_flashdata('message',
				'<div class="alert alert-danger alert-dismissible">
            		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               		<h4><i class="icon fa fa-ban"></i> Error!</h4>Material no registrado.
            	</div>');

				$this->load->view('layout/header');
				$this->load->view('layout/menuadmin');
				$this->load->view('admin/material/vtablamaterial',$data);
				$this->load->view('layout/footer');
			}
		}	
	}
	
	//eliminar usuario btn
	public function eliminarPersona($idP)
	{
		$this->madmin->eliminarPersona($idP);
		$this->session->set_flashdata('message',
				'<div class="alert alert-success alert-dismissible">
        			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        			<h4><i class="icon fa fa-check"></i> Exito!</h4>Usuario eliminado.
        		</div>');

		$data["p"] = $this->madmin->getUsuarios();
		$data["a"] = null;
        
        $this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/personal/vtablausuarios',$data);
		$this->load->view('layout/footer');
	}

	//eliminar usuario btn
	public function eliminarcliente($idC)
	{
		
		$this->madmin->eliminarcliente($idC);
		$this->session->set_flashdata('message',
				'<div class="alert alert-success alert-dismissible">
        			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        			<h4><i class="icon fa fa-check"></i> Exito!</h4>Cliente eliminado.
        		</div>');

		$data["p"] = $this->madmin->getClientes();
		$data["a"] = null;
        
        $this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/clientes/vtablaclientes',$data);
		$this->load->view('layout/footer');
	}

	//eliminar ventana btn
	public function eliminarventana($idC)
	{
		$this->madmin->eliminarventana($idC);
		$this->session->set_flashdata('message',
				'<div class="alert alert-success alert-dismissible">
        			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        			<h4><i class="icon fa fa-check"></i> Exito!</h4>Ventana eliminada.
        		</div>');
        
        $data["p"] = $this->madmin->getVentanas();
        $data["a"] = null;
        
		$this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/productos/vtablaventanas',$data);
		$this->load->view('layout/footer');
	}

	//eliminar cancel btn
	public function eliminarcancel($idC)
	{
		$this->madmin->eliminarcancel($idC);
		$this->session->set_flashdata('message',
				'<div class="alert alert-success alert-dismissible">
        			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        			<h4><i class="icon fa fa-check"></i> Exito!</h4>Cancel eliminado.
        		</div>');
       	
       	$data["p"] = $this->madmin->getCanceles();
        $data["a"] = null;
        
		$this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/productos/vtablacanceles',$data);
		$this->load->view('layout/footer');
	}

	//eliminar puerta btn
	public function eliminarpuerta($idC)
	{
		$this->madmin->eliminarpuerta($idC);
		$this->session->set_flashdata('message',
				'<div class="alert alert-success alert-dismissible">
        			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        			<h4><i class="icon fa fa-check"></i> Exito!</h4>Puerta eliminada.
        		</div>');
        
        $data["p"] = $this->madmin->getPuertas();
        $data["a"] = null;
        
		$this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/productos/vtablapuertas',$data);
		$this->load->view('layout/footer');
	}

	//eliminar material btn
	public function eliminarmaterial($idC)
	{
		$this->madmin->eliminarmaterial($idC);
		$this->session->set_flashdata('message',
				'<div class="alert alert-success alert-dismissible">
        			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        			<h4><i class="icon fa fa-check"></i> Exito!</h4>Material eliminado.
        		</div>');

      	$data["p"] = $this->madmin->getMateriales();
        $data["a"] = null;

        $this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/material/vtablamaterial',$data);
		$this->load->view('layout/footer');

	}

	//actualizar registro de ususario
	public function editarusuario($idP)
	{
		$data["p"] = $this->madmin->getUsuario($idP);
        
		$this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/personal/vadminregistroeditar',$data);
		$this->load->view('layout/footer');
	}
	
	//actualizar registro de ususario
	public function editacliente($idC)
	{
		$data["p"] = $this->madmin->getcliente($idC);
        
		$this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/clientes/vregistroclienteseditar',$data);
		$this->load->view('layout/footer');
	}

	//actualizar registro de ventana
	public function editaventana($idC)
	{
		$data["p"] = $this->madmin->getventana($idC);
        
		$this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/productos/vregistroventanaeditar',$data);
		$this->load->view('layout/footer');
	}

	//actualizar registro de cancel
	public function editacancel($idC)
	{
		$data["p"] = $this->madmin->getcancel($idC);
        
		$this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/productos/vregistrocanceleditar',$data);
		$this->load->view('layout/footer');
	}

	//actualizar registro de puerta
	public function editapuerta($idC)
	{
		$data["p"] = $this->madmin->getpuerta($idC);
        
		$this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/productos/vregistropuertaeditar',$data);
		$this->load->view('layout/footer');
	}

	//actualizar registro de material
	public function editamaterial($idC)
	{
		$data["p"] = $this->madmin->getmaterial($idC);
        
		$this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/material/vregistromaterialeditar',$data);
		$this->load->view('layout/footer');
	}

	//update usuario
	public function updateususarios()
	{
		$id = $this->input->post('id');
		$param['nombre'] = $this->input->post('txtNombre');
		$param['appaterno'] = $this->input->post('txtAppaterno');
		$param['apmaterno'] = $this->input->post('txtApmaterno');
		$param['correo'] = $this->input->post('txtEmail');
		$param['numero'] = $this->input->post('txtNumero');
		$param['puesto'] = $this->input->post('txtPuesto');
	
		$res= $this->madmin->updateususario($param,$id);


		if ($res != null) {

		$this->session->set_flashdata('message',
		'<div class="alert alert-success alert-dismissible">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    	<h4><i class="icon fa fa-check"></i> Exito!</h4>Usuario actualizado con exito.
    	</div>');

		$data["p"] = $this->madmin->getUsuarios();
		$data["a"] = $this->madmin->getUsuario($id);
        
		$this->load->view('layout/header');
		$this->load->view('layout/menuadmin');
		$this->load->view('admin/personal/vtablausuarios',$data);
		$this->load->view('layout/footer');
		
    	
		}
	}

	//update cliente
	public function updatecliente()
	{
		$id = $this->input->post('id');
		$param['nombre'] = $this->input->post('txtNombre');
		$param['contacto'] = $this->input->post('txtContacto');
		$param['ciudad'] = $this->input->post('txtCiudad');
		$param['numero'] = $this->input->post('txtNumero');
		$param['direccion'] = $this->input->post('txtDireccion');
		$param['correo'] = $this->input->post('txtEmail');
	
		$res= $this->madmin->updatecliente($param,$id);

		if ($res != null) {

			$this->session->set_flashdata('message',
			'<div class="alert alert-success alert-dismissible">
    			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    			<h4><i class="icon fa fa-check"></i> Exito!</h4>Cliente actualizado con exito.
    		</div>');
    		
    		$data["p"] = $this->madmin->getClientes();
	        $data["a"] = $this->madmin->getcliente($id);

	         
			$this->load->view('layout/header');
			$this->load->view('layout/menuadmin');
			$this->load->view('admin/clientes/vtablaclientes',$data);
			$this->load->view('layout/footer');
		}
	}

	//update ventana
	public function updateventana()
	{
		$id = $this->input->post('id');
		$mi_archivo = 'txtImagen';
		$respuesta;

		if ($_FILES['txtImagen']['name'] != null) {
		$respuesta = "lleno";
		}else{
		$respuesta = "vacio";
		}

		if ( $respuesta == "vacio" ) {
			$img = "vacio";
		}else{
			$config['upload_path'] = "assets/img/productos/ventanas/";
	        $config['allowed_types'] = "*";
	        $config['max_size'] = "50000";
	        $config['max_width'] = "2000";
	        $config['max_height'] = "2000";
	        $this->load->library('upload', $config);

			if (!$this->upload->do_upload($mi_archivo)) {
				$respuesta = "vacio";
		       	$data["p"] = $this->madmin->getventana($id);
		        $data["a"] = null;
		        $this->session->set_flashdata('message',
		        '<div class="alert alert-danger alert-dismissible">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		            <h4><i class="icon fa fa-ban"></i> Error!</h4>La imagen que intenta cargar no se ajusta a las dimensiones permitidas.
		        </div>');

		        $this->load->view('layout/header');
		        $this->load->view('layout/menuadmin');
		        $this->load->view('admin/productos/vregistroventanaeditar',$data);
		        $this->load->view('layout/footer');
		        return;
			}
			$data['uploadSuccess'] = $this->upload->data();
			$img = $data['uploadSuccess']['file_name'];
		}

		$param['modelo'] = $this->input->post('txtModelo');
		$param['altura'] = $this->input->post('txtAltura');
		$param['base'] = $this->input->post('txtBase');
		$param['material_marco'] = $this->input->post('txtMaterialm');
		$param['material_cristal'] = $this->input->post('txtMaterialc');
		$param['descripcion'] = $this->input->post('txtDescripcion');
		$param['color'] = $this->input->post('txtColor');
		$param['ancho_perfil'] = $this->input->post('txtAnchop');
		$param['acabado'] = $this->input->post('txtAcabado');
		$param['peso'] = $this->input->post('txtPeso');
		$param['imagen'] = $img;
		$param['cantidad'] = $this->input->post('txtCantidad');
		$param['costo_produccion'] = $this->input->post('txtProduccion');
		$param['precio_publico'] = $this->input->post('txtPrecio');
		$param['tipo'] = $this->input->post('txtTipo');
	
		$res= $this->madmin->updateventana($param,$id);

		if ($res != null) {
			$this->session->set_flashdata('message',
			'<div class="alert alert-success alert-dismissible">
    			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    			<h4><i class="icon fa fa-check"></i> Exito!</h4>Ventana actualizado con exito.
    		</div>');
    		
    		$data["p"] = $this->madmin->getVentanas();
	        $data["a"] = $this->madmin->getventana($id);
	        
			$this->load->view('layout/header');
			$this->load->view('layout/menuadmin');
			$this->load->view('admin/productos/vtablaventanas',$data);
			$this->load->view('layout/footer');
		}
	
	}

	//update cancel
	public function updatecancel()
	{
		$id = $this->input->post('id');
		$mi_archivo = 'txtImagen';
		$respuesta;

		if ($_FILES['txtImagen']['name'] != null) {
		$respuesta = "lleno";
		}else{
		$respuesta = "vacio";
		}

		if ( $respuesta == "vacio" ) {
			$img = "vacio";
		}else{
			$config['upload_path'] = "assets/img/productos/canceles/";
	        $config['allowed_types'] = "*";
	        $config['max_size'] = "50000";
	        $config['max_width'] = "2000";
	        $config['max_height'] = "2000";
	        $this->load->library('upload', $config);

			if (!$this->upload->do_upload($mi_archivo)) {
		       	$data["p"] = $this->madmin->getcancel($id);
		        $data["a"] = null;
		        $this->session->set_flashdata('message',
		        '<div class="alert alert-danger alert-dismissible">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		            <h4><i class="icon fa fa-ban"></i> Error!</h4>La imagen que intenta cargar no se ajusta a las dimensiones permitidas.
		        </div>');
		        
		        $this->load->view('layout/header');
		        $this->load->view('layout/menuadmin');
		        $this->load->view('admin/productos/vregistrocanceleditar',$data);
		        $this->load->view('layout/footer');
		        return;
			}
			$data['uploadSuccess'] = $this->upload->data();
			$img = $data['uploadSuccess']['file_name'];
		}

		$id = $this->input->post('id');
		$param['modelo'] = $this->input->post('txtModelo');
		$param['altura'] = $this->input->post('txtAltura');
		$param['base'] = $this->input->post('txtBase');
		$param['material_marco'] = $this->input->post('txtMaterialm');
		$param['material_cristal'] = $this->input->post('txtMaterialc');
		$param['descripcion'] = $this->input->post('txtDescripcion');
		$param['color'] = $this->input->post('txtColor');
		$param['ancho_perfil'] = $this->input->post('txtAnchop');
		$param['acabado'] = $this->input->post('txtAcabado');
		$param['peso'] = $this->input->post('txtPeso');
		$param['imagen'] = $img;
		$param['cantidad'] = $this->input->post('txtCantidad');
		$param['costo_produccion'] = $this->input->post('txtProduccion');
		$param['precio_publico'] = $this->input->post('txtPrecio');
		$param['tipo'] = $this->input->post('txtTipo');
	
		$res= $this->madmin->updatecancel($param,$id);

		if ($res != null) {
			$this->session->set_flashdata('message',
			'<div class="alert alert-success alert-dismissible">
    			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    			<h4><i class="icon fa fa-check"></i> Exito!</h4>Cancel actualizado con exito.
    		</div>');
    		
    		$data["p"] = $this->madmin->getCanceles();
	        $data["a"] = $this->madmin->getcancel($id);
	        
			$this->load->view('layout/header');
			$this->load->view('layout/menuadmin');
			$this->load->view('admin/productos/vtablacanceles',$data);
			$this->load->view('layout/footer');
		}
	}

	//update puerta
	public function updatepuerta()
	{
		$id = $this->input->post('id');
		$mi_archivo = 'txtImagen';
		$respuesta;

		if ($_FILES['txtImagen']['name'] != null) {
		$respuesta = "lleno";
		}else{
		$respuesta = "vacio";
		}

		if ( $respuesta == "vacio" ) {
			$img = "vacio";
		}else{
			$config['upload_path'] = "assets/img/productos/puertas/";
	        $config['allowed_types'] = "*";
	        $config['max_size'] = "50000";
	        $config['max_width'] = "2000";
	        $config['max_height'] = "2000";
	        $this->load->library('upload', $config);

			if (!$this->upload->do_upload($mi_archivo)) {
		       	$data["p"] = $this->madmin->getpuerta($id);
		        $data["a"] = null;
		        $this->session->set_flashdata('message',
		        '<div class="alert alert-danger alert-dismissible">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		            <h4><i class="icon fa fa-ban"></i> Error!</h4>La imagen que intenta cargar no se ajusta a las dimensiones permitidas.
		        </div>');
		        
		        $this->load->view('layout/header');
		        $this->load->view('layout/menuadmin');
		        $this->load->view('admin/productos/vregistropuertaeditar',$data);
		        $this->load->view('layout/footer');
		        return;
			}
			$data['uploadSuccess'] = $this->upload->data();
			$img = $data['uploadSuccess']['file_name'];
		}


		$id = $this->input->post('id');
		$param['modelo'] = $this->input->post('txtModelo');
		$param['altura'] = $this->input->post('txtAltura');
		$param['base'] = $this->input->post('txtBase');
		$param['material_marco'] = $this->input->post('txtMaterialm');
		$param['material_cristal'] = $this->input->post('txtMaterialc');
		$param['descripcion'] = $this->input->post('txtDescripcion');
		$param['color'] = $this->input->post('txtColor');
		$param['ancho_perfil'] = $this->input->post('txtAnchop');
		$param['acabado'] = $this->input->post('txtAcabado');
		$param['peso'] = $this->input->post('txtPeso');
		$param['imagen'] = $img;
		$param['cantidad'] = $this->input->post('txtCantidad');
		$param['costo_produccion'] = $this->input->post('txtProduccion');
		$param['precio_publico'] = $this->input->post('txtPrecio');
		$param['tipo'] = $this->input->post('txtTipo');
	
		$res= $this->madmin->updatepuerta($param,$id);

		if ($res != null) {
			$this->session->set_flashdata('message',
			'<div class="alert alert-success alert-dismissible">
    			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    			<h4><i class="icon fa fa-check"></i> Exito!</h4>Puerta actualizado con exito.
    		</div>');
    		
    		$data["p"] = $this->madmin->getPuertas();
	        $data["a"] = $this->madmin->getpuerta($id);
	        
			$this->load->view('layout/header');
			$this->load->view('layout/menuadmin');
			$this->load->view('admin/productos/vtablapuertas',$data);
			$this->load->view('layout/footer');
		}
	}

	//update material
	public function updatematerial()
	{
		$id = $this->input->post('id');
		$param['nombre'] = $this->input->post('txtNombre');
		$param['descripcion'] = $this->input->post('txtDescripcion');
		$param['cantidad'] = $this->input->post('txtCantidad');
		$param['unidad'] = $this->input->post('txtUnidad');
		$param['costo'] = $this->input->post('txtCosto');
		$param['tipo'] = $this->input->post('txtTipo');
	
		$res= $this->madmin->updatematerial($param,$id);

		if ($res != null) {
			$this->session->set_flashdata('message',
			'<div class="alert alert-success alert-dismissible">
    			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    			<h4><i class="icon fa fa-check"></i> Exito!</h4>Material actualizado con exito.
    		</div>');
    		
    		$data["p"] = $this->madmin->getMateriales();
	       	$data["a"] = $this->madmin->getmaterial($id);
	        
			$this->load->view('layout/header');
			$this->load->view('layout/menuadmin');
			$this->load->view('admin/material/vtablamaterial',$data);
			$this->load->view('layout/footer');
		}
    }

    function cargar_archivo() {

    	$mi_archivo = 'upload';
        $config['upload_path'] = "assets/img/productos/";
        $config['allowed_types'] = "*";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($mi_archivo)) {
            //* ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }

        $data['uploadSuccess'] = $this->upload->data();
        $img = $data['uploadSuccess']['file_name'];
        return $img;
    }

}

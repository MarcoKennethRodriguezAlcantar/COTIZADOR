<?php
/**
 * 
 */
class Clogin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mlogin');
	}

	//index_view_login
	public function index(){
		$this->load->view('vlogin');
	}

	//view_recuperacion de contraseña
	public function vrecuperarclave()
	{
		$this->load->view('vrecuperarclave');
	}

	//view_cambio de contraseña
	public function vcambiarclave()
	{
		$this->load->view('vcambiarclave');
	}

	//iniciar session
	public function ingresar()
	{
		$this->form_validation->set_rules('txtUsuario', 'Usuario', 'trim|required' );
		$this->form_validation->set_rules('txtClave', 'Password', 'trim|required' );
		if ($this->form_validation->run() == false) {
			$this->load->view('vlogin');
			
		}else{
			$usu = $this->input->post('txtUsuario');
			$pass =  sha1($this->input->post('txtClave'));

			$res = $this->mlogin->ingresar($usu,$pass);

			if($res == 1){
				//direcionar tipo de usuario
				if ($this->session->userdata('s_puesto') == "Admin") {
					redirect('cadmin/index');
				}else if ($this->session->userdata('s_puesto') == "Vendedor") {
					redirect('cvendedor/index');
				}else if ($this->session->userdata('s_puesto') == "Produccion") {
					$this->load->view('layout/header');
					$this->load->view('layout/menuproduccion');
					$this->load->view('admin/vupdatepersona');
					$this->load->view('layout/footer');
				}else{
					$data['mensaje'] = 'Error';
					$this->load->view('vlogin',$data);
				}
			}else{
				$this->session->set_flashdata('message',
				'<div class="alert alert-danger alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                	<h4><i class="icon fa fa-ban"></i> Error!</h4>Usuario o contraseña incorrecta.
              	</div>');
				redirect('clogin');					
			}
		}
		
	}

	//cerrar session
	public function logout()
	{
		$s_usuario = array();
		session_destroy();
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('s_usuario');
		$this->session->set_flashdata('message',
		'<div class="alert alert-success alert-dismissible">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        	<h4><i class="icon fa fa-check"></i> Exito!</h4>Session cerrada.
        </div>');
		redirect('clogin');
	}

	//recuperacion de contraseña por correo
	public function recuperarclave()
	{
		$this->form_validation->set_rules('txtUsuario', 'Usuario', 'trim|required' );
		if ($this->form_validation->run() == false) {
			$this->load->view('vrecuperarclave');
		}else{
			$usu = $this->input->post('txtUsuario');
			$res = $this->mlogin->verificarusuario($usu);
			if ($res == 1) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'user' => $usu,
					'token' => $token,
					'date_create' =>time()
				];
				$res = $this->mlogin->inserttoken($user_token);
				$this->_sendEmail($token, 'forgot');
				$this->session->set_flashdata('message',
				'<div class="alert alert-warning alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                	<h4><i class="icon fa fa-warning"></i> Alerta!</h4>Porfavor revisa tu correo para recuperar contraseña.
              	</div>');
              	redirect('clogin/vrecuperarclave');
			}else{
				$this->session->set_flashdata('message',
				'<div class="alert alert-danger alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                	<h4><i class="icon fa fa-ban"></i> Error!</h4>El usuario no esta registrado.
              	</div>');
				redirect('clogin/vrecuperarclave');
			}
		}
	}

	//enviar email
	private function _sendEmail($token, $type)
	{
		$config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => '2018371081@uteq.edu.mx',
            'smtp_pass' => '2018371081',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset'  => 'utf-8',
            'newline'  => "\r\n"
        ];

		$this->email->initialize($config);
        $this->email->from('2018371081@uteq.edu.mx', ' Cotizador');
        $this->email->to($this->input->post('txtUsuario'));
        if ($type == 'verify') {
            $this->email->subject('Verificacion de Cotizador');
            $this->email->message('Haga clic en este enlace para verificar su cuenta : <a href="' . base_url() . 'clogin/verify?email=' . $this->input->post('txtUsuario') . '&token=' . urlencode($token) . '">Activar</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Restablecer la contraseña');
            $this->email->message('Haga clic en este enlace para restablecer tu contraseña : <a href="' . base_url() . 'clogin/restablecercontra?email=' . $this->input->post('txtUsuario') . '&token=' . urlencode($token) . '">Restablecer contraseña</a>');
        }
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
	}

	//cambio de contraseña vista
	public function restablecercontra()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $resultado = $this->mlogin->get_correo($email);
		$user = $resultado->row_array();
        if ($user) {
            $resultadotoken = $this->mlogin->get_token($token);
			$user_token = $resultadotoken->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->cambiarcontra();
            } else {
                $this->session->set_flashdata('message',
				'<div class="alert alert-danger alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                	<h4><i class="icon fa fa-ban"></i> Error!</h4>Este token ya ha sido utilizado.
              	</div>');
                redirect('clogin/vrecuperarclave');
            }
        } else {
            $this->session->set_flashdata('message',
				'<div class="alert alert-danger alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                	<h4><i class="icon fa fa-ban"></i> Error!</h4>¡Error al restablecer contraseña falló!
              	</div>');
            redirect('clogin/vrecuperarclave');
        }
    }


    public function cambiarcontra()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('clogin');
        }
        $this->form_validation->set_rules(
            'password1',
            'contraseña',
            'trim|required|matches[password2]'
        );
        $this->form_validation->set_rules(
            'password2',
            'contraseña repetida',
            'trim|required|matches[password1]'
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('vcambiarclave');
        } else {
            $password = sha1($this->input->post('password1'));
            $email = $this->session->userdata('reset_email');
            $this->mlogin->update_clave($email,$password);
            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message',
				'<div class="alert alert-success alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                	<h4><i class="icon fa fa-check"></i> Exito!</h4>¡La contraseña ha sido cambiada! </strong> <br> Felicidades.
              	</div>');
            redirect('clogin');
        }
    }

}
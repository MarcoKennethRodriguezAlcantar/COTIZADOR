<?php  
/**
 * 
 */
class Cvendedor extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mvendedor');
		$this->load->model('madmin');
	}

	//index view vendedor
	public function index()
	{
		$data["p"] = $this->madmin->getVentanas();
        $data["a"] = null;

        $this->session->set_flashdata('message','');
        $data["c"] = $this->mvendedor->getClientes();
   
        $this->session->set_flashdata('message','');
        
		$this->load->view('layout/header');
		$this->load->view('layout/menuvendedor');
		$this->load->view('vendedor/vcotizador',$data);
		$this->load->view('layout/footer');
	}

	public function clienteDetails(){
	    // POST data
	    $postData = $this->input->post();

	    // get data
	    $data = $this->mvendedor->getCliente($postData);

	    echo json_encode($data);
  	}

  	public function viewtabla()
	{
        
		$this->load->view('layout/header');
		$this->load->view('layout/menuvendedor');
		$this->load->view('vendedor/vtablacotizaciones');
		$this->load->view('layout/footer');
	}

}
?>
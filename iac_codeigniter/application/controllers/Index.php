<?php
class Index extends MY_Models {

	public function __construct(){
		parent::__construct();
	}
 
    function index(){
			
		$data = array();
		$data['title'] = 'Grupo de Pesquisa IAC';
		$data['noticias'] = $this->Noticia->getall();

		$this->load->view('Frontend/Header', $data);
		$this->load->view('Frontend/Index');
		$this->load->view('Frontend/Footer');
	}
}
?>
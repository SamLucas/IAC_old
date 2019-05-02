<?php

	class Noticias extends MY_Models{

		public function __construct(){
			parent::__construct();
		}

		public function index(){
			
			$data['title'] = 'Grupo de Pesquisa IAC';
	        $data['noticia'] = $this->Noticia->getnoticia($this->input->get('id'));
	       
			$this->load->view('Frontend/Header', $data);
			$this->load->view('Frontend/Noticias/Index',$data);
			$this->load->view('Frontend/Footer');
		}
	}
?>
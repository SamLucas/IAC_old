<?php

	class Linha extends MY_Models{

		public function __construct(){
			parent::__construct();
		}

		public function index(){
			
			$data['title'] = 'Linha de Pesquisa';
	        $data['artigos'] = $this->Pesquisa->getall();
	        $data['papers'] = $this->Papers->getall();

			$this->load->view('Frontend/Header', $data);
			$this->load->view('Frontend/Linha/Index');
			$this->load->view('Frontend/Footer');
		}
	}
?>
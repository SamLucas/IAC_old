<?php

	class Membros extends MY_Models {

		public function __construct(){
			parent::__construct();
		}

		public function index(){
			
			$data = array();
	        $data['title'] = 'Membros';
	        $data['membros'] = $this->Membros->select();
	        $data['download'] = $this->Download->getall();

			$this->load->view('Frontend/Header', $data);
			$this->load->view('Frontend/Membros/Index', $data);
			$this->load->view('Frontend/Footer');
		}
	}

?>
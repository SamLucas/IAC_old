<?php

	class Download extends MY_Models{

		public function __construct(){
			parent::__construct();
		}

		public function index(){
			
			$data['title'] = 'Ferramentas';
	        $data['download'] = $this->Download->getall();
	       
			$this->load->view('Frontend/Header', $data);
			$this->load->view('Frontend/Download/Index',$data);
			$this->load->view('Frontend/Footer');
		}
	}
?>
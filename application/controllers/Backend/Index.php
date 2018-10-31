<?php
	class Index extends MY_Login{

		public function __construct(){
			parent::__construct();
		} 

		public function index(){
			
			$data = array();
			$data['title'] = 'Grupo de Pesquisa IAC';
			$data['dados'] = $this->Contato->select();
			$data['mensagens'] = $this->Contato->getmensagens();

			$this->load->view('Backend/Header', $data);
			$this->load->view('Backend/Footer');
			$this->load->view('Backend/Contato/Index');
		}
	}
?>
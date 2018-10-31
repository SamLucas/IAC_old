<?php

	class Contato extends MY_Models{

		public function __construct(){
			parent::__construct();
		}

		public function index($data = null){
			
			$data['title'] = 'Formulario de contato';
			$data['dados'] = $this->Contato->select();
			$data['download'] = $this->Download->getall();
			$this->load->view('Frontend/Header', $data);
			$this->load->view('Frontend/Contato/Index',$data);
			$this->load->view('Frontend/Footer');
		}

		public function mensagem(){
			$this->Contato->nome = $this->input->post('nome');
			$this->Contato->assunto = $this->input->post('assunto');
			$this->Contato->email = $this->input->post('email'); 
			$this->Contato->mensagem = $this->input->post('mensagem');
			$this->Contato->mensagem();

			$data['titulo'] = "Sucesso!";
            $data['type'] = "alert alert-success";
            $data['mensage'] = "O email foi enviado com sucesso.";

			$this->index($data);
		}
	}
?>
<?php

	class Contato extends MY_Login{

		public function __construct(){
			parent::__construct();
		}

		public function index(){

			$data = array();
	        $data['title'] = 'Grupo de Pesquisa IAC';
	        $data['dados'] = $this->Contato->select();

			$this->load->view('Backend/Header', $data);	
			$this->load->view('Backend/Footer');
			$this->load->view('Backend/corpo/contato');

		}

		public function resposta(){

			$mensagem = $this->input->post('resposta');
			$email = $this->input->post('email');
		
            $this->load->library('email', $this->config_email);
            $this->email->set_newline("\r\n");
            $this->email->from($this->session->email);
            $this->email->to($email);
            $this->email->subject('IAC (Grupo de Pesquisa Informática Aplicada às Ciências)');
            $this->email->message($mensagem);
            $this->email->send();

            $data = array();
	        $data['title'] = 'Grupo de Pesquisa IAC';
	        $data['dados'] = $this->Contato->select();
	        $data['mensagens'] = $this->Contato->getmensagens();
	        $data['title'] = 'Mensagens';

			$this->load->view('Backend/Header', $data);	
			$this->load->view('Backend/Footer');
			$this->load->view('Backend/Mensagem/Index');
			$this->load->view('Backend/Contato/Index');
		}

		public function view_mensagem(){

			$dados = array();
			$this->Contato->id = $this->input->get('id');
			$dados['mensagem'] = $this->Contato->getmensagemid();
			$this->Contato->msg_vista();
			$data['title'] = 'Mensagens';

			$this->load->view('Backend/Header',$data);	
			$this->load->view('Backend/Footer');
			$this->load->view('Backend/Mensagem/View',$dados);
		}

		public function update(){

			$mensagem = $_GET['mensagem'];
			$titulo = $_GET['titulo'];
			$lates = $_GET['lates'];

			$this->Contato->mensagem = $mensagem;
			$this->Contato->titulo = $titulo;
			$this->Contato->lates = $lates;

			$data = array();
        	$data['title'] = 'Grupo de Pesquisa IAC';
        	$data['msg'] = 'Alteração realizada com sucesso!!';

			if($this->Contato->update() == 1){

				$data = array();
		        $data['title'] = 'Grupo de Pesquisa IAC';
		        $data['dados'] = $this->Contato->select();
	        	$data['mensagens'] = $this->Contato->getmensagens();

				$alert = array(
					"nome" => "asdçasd",
					"mensagem" => "Cadastro efetuado com sucesso!!"
				);

				$this->load->view('Backend/header', $data);		
				$this->load->view('Backend/Footer');
				$this->load->view('Backend/Mensagem/Index');
				$this->load->view('Backend/Contato/Index',$alert);

			}
		}
	}
?>

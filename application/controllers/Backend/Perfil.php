<?php
	class Perfil extends MY_Login{

		public function __construct(){
			parent::__construct();
		}

		public function index($dados = null){

	        $data['title'] = 'Configurações do Perfil';

			$this->load->view('Backend/Header', $data);
			$this->load->view('Backend/Footer');
			if($dados != null) $this->load->view('Backend/Perfil/Index', $dados);
			else $this->load->view('Backend/Perfil/Index');

		}

	    public function senha(){

	    	$dados = null;
			$this->Login->senhaatual = addslashes(md5($this->input->post('senhaatual')));  
			if($this->Login->verificasenhaatual()){
		        $this->Login->senha1 = addslashes(md5($this->input->post('senha1')));
		        $this->Login->altera_senha();

		        $dados['type'] = "alert alert-success";
		        $dados['title'] = "Sucesso!";
		        $dados['memsage'] = "sua senha foi alterada.";
			} else {
		        $dados['type'] = "alert alert-danger";
		        $dados['title'] = "Erro! ";
		        $dados['memsage'] = "A senha digitada nao confere com a senha atual.";
			}

			$this->Index($dados);

	    }

	    public function dados(){

	    	$dados = null;
			$this->Login->senhaatual = addslashes(md5($this->input->post('senhaatual')));  
			if($this->Login->verificasenhaatual()){

				$this->Login->nome = addslashes($this->input->post('nome'));
				$this->Login->email = addslashes($this->input->post('email'));
				$this->Login->altera_dados();

				$this->session->nome = addslashes($this->input->post('nome'));
				$this->session->email = addslashes($this->input->post('email'));

				$dados['type'] = "alert alert-success";
				$dados['title'] = "Sucesso!";
				$dados['memsage'] = "seus dados foram alterados.";
			} else {
		        $dados['type'] = "alert alert-danger";
		        $dados['title'] = "Erro! ";
		        $dados['memsage'] = "A senha digitada nao confere com a senha atual.";
			}

			$this->Index($dados);
	    }
	}
?>
<?php
	class Noticia extends MY_Login{

		public function __construct(){
			parent::__construct();
		}

		public function index(){

	        $data['title'] = 'Grupo de Pesquisa IAC';
	       	$data['noticias'] = $this->Noticia->getall();
	       	$data['type'] = null;

			$this->load->view('Backend/Header', $data);
			$this->load->view('Backend/Footer');
			$this->load->view('Backend/Noticia/Index', $data);
	    }

	    public function ativa(){

	    	$this->Noticia->id = $this->input->get('id');
	    	$this->Noticia->ativa();
	    	redirect(base_url('Backend/Noticia/Index'));
	    }

	    public function adicionar(){
	    	$data['title'] = 'Grupo de Pesquisa IAC';
	    	$data['noticias'] = null;
	    	$data['type'] = null;

			$this->load->view('Backend/Header', $data);
			$this->load->view('Backend/Footer');
			$this->load->view('Backend/Noticia/Adicionar');
	    }

	    public function alterar(){
	    	$data['title'] = 'Grupo de Pesquisa IAC';
	    	$data['noticias'] = $this->Noticia->getnoticia($this->input->get('id'));
	    	$data['type'] = null;

			$this->load->view('Backend/Header', $data);
			$this->load->view('Backend/Footer');
			$this->load->view('Backend/Noticia/Adicionar',$data);
	    }

	    public function cadastrar(){

	    	$this->Noticia->titulo = $this->input->post('titulo');
	    	$this->Noticia->autor = $this->input->post('autor');
	    	$this->Noticia->texto = $this->input->post('texto');
	    	$this->Noticia->descricao = $this->input->post('descricao');
	    	$this->Noticia->cadastrar();

	    	$data['type'] = "alert alert-success";
	    	$data['mensage'] = "Noticia adicionada com sucesso.";
	    	$data['titulo'] = "Cadastro concluido!!";
	    	$data['title'] = 'Grupo de Pesquisa IAC';
	    	$data['noticias'] = null;

	    	$this->load->view('Backend/Header', $data);
			$this->load->view('Backend/Footer');
			$this->load->view('Backend/Noticia/Adicionar',$data);
	    }

	    public function deletar(){

	    	$this->Noticia->id = $this->input->post('id_noticia');
	    	$this->Noticia->deletar();

	    	$data['title'] = 'Grupo de Pesquisa IAC';
	       	$data['noticias'] = $this->Noticia->getall();
	       	$data['type'] = "alert alert-success";
	    	$data['mensage'] = "A noticia foi excluida.";
	    	$data['titulo'] = "Exclusão efetuada!!";
	    	$data['title'] = 'Grupo de Pesquisa IAC';

			$this->load->view('Backend/Header', $data);
			$this->load->view('Backend/Footer');
			$this->load->view('Backend/Noticia/Index', $data);

	    }

	    public function update(){

	    	$this->Noticia->titulo = $this->input->post('titulo');
	    	$this->Noticia->autor = $this->input->post('autor');
	    	$this->Noticia->texto = $this->input->post('texto');
	    	$this->Noticia->descricao = $this->input->post('descricao');
	    	$this->Noticia->id = $this->input->post('id');
	    	$this->Noticia->alterar();

	    	$data['type'] = "alert alert-success";
	    	$data['mensage'] = "Noticia alterada com sucesso.";
	    	$data['titulo'] = "Cadastro alterado!!";
	    	$data['title'] = 'Grupo de Pesquisa IAC';
	    	$data['noticias'] = null;

	    	$this->load->view('Backend/Header', $data);
			$this->load->view('Backend/Footer');
			$this->load->view('Backend/Noticia/Adicionar',$data);
	    }
	}
?>
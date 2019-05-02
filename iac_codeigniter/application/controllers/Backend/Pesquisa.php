<?php
class Pesquisa extends MY_Login {

	public function __construct(){
		parent::__construct();
	}

	public function index($data = null){

		$data['title'] = 'Grupo de Pesquisa IAC';
		$data['artigos'] = $this->Pesquisa->getall();
		$data['papers'] = $this->Papers->getall();

		$this->load->view('Backend/Header', $data);
		$this->load->view('Backend/Footer');
		$this->load->view('Backend/Pesquisa/Index');
	}

	function delTree($dir) { 
		$files = array_diff(scandir($dir), array('.','..')); 
		foreach ($files as $file) { 
			(is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
		} 
		return rmdir($dir); 
	}

	public function adicionar(){

		$data = array();
		$data['title'] = 'Grupo de Pesquisa IAC';
		$data['artigos'] = null;

		$this->load->view('Backend/Header', $data);
		$this->load->view('Backend/Footer');
		$this->load->view('Backend/Pesquisa/Adicionar');
	}

	public function deletar(){

		$this->Pesquisa->id = $this->input->post('id');
		$this->Pesquisa->deletar();

		$this->Papers->deleteall($this->Pesquisa->id);
		$this->delTree("upload/papers/".$this->Pesquisa->id); // deletando a pasta

		$data['type'] = "alert alert-success";
		$data['titulo'] = "Sucesso!";
		$data['mensagem'] = "Pesquisa deletada.";
		$this->Index($data);
	}

	public function alterar(){
		$id = $this->input->get('id');
		$this->Pesquisa->id = $id;

		$data = array();
		$data['title'] = 'Grupo de Pesquisa IAC';
		$data['artigos'] = $this->Pesquisa->getid();

		$this->load->view('Backend/Header', $data);
		$this->load->view('Backend/Footer');
		$this->load->view('Backend/Pesquisa/Adicionar');
	}

	public function cadastrar(){

		$this->Pesquisa->titulo = $this->input->post('titulo');
		$this->Pesquisa->descricao = $this->input->post('descricao');
		$this->Pesquisa->professores = $this->input->post('professores');
		$this->Pesquisa->cadastrar();

			// echo $this->Pesquisa->ultimoid();
		mkdir("upload/papers/".$this->Pesquisa->ultimoid()) or die("erro ao criar diretório");

		$data['type'] = "alert alert-success";
		$data['titulo'] = "Sucesso!";
		$data['mensagem'] = "Pesquisa Cadastrada.";
		$this->Index($data);

	}

	public function update(){
		
		$this->Pesquisa->id = $this->input->post('id');
		$this->Pesquisa->titulo = $this->input->post('titulo');
		$this->Pesquisa->descricao = $this->input->post('descricao');
		$this->Pesquisa->professores = $this->input->post('professores');
		$this->Pesquisa->update();

		$data['type'] = "alert alert-success";
		$data['titulo'] = "Sucesso!";
		$data['mensagem'] = "Pesquisa Alterada.";
		$this->Index($data);

	}
}
?>
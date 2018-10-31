<?php
class Membros extends MY_Login {

	public function __construct(){
		parent::__construct();
	}

	public function index($data = null){

		$data['title'] = 'Grupo de Pesquisa IAC';
		$data['cadastros'] = $this->Membros->select();

		$this->load->view('Backend/Header', $data);
		$this->load->view('Backend/Footer');
		$this->load->view('Backend/Membros/index',$data);
	}

	public function cadastrar(){


		$this->Membros->nome = $this->input->post('nome');
		$this->Membros->descricao = $this->input->post('descricao');
		$this->Membros->lattes = $this->input->post('lattes');

		if($_FILES['foto']['type'] != null){
			$nome_arquivo = $_FILES['foto']['name'];
			$this->Membros->foto = $nome_arquivo;
			$this->load->library('upload',$this->conf_upload("./img/membros",$nome_arquivo));
			$this->upload->do_upload('foto');
		} else $this->Membros->foto = "Sem foto.png";

		$this->Membros->cadastrar();
		$data['type'] = "alert alert-success";
		$data['mensage'] = "Membro cadastrado com sucesso.";
		$data['titulo'] = "Cadastro efetuado!!";

		$this->Index($data);
	}

	public function deletar(){
		$this->Membros->id = $this->input->post('id');
		$this->Membros->delete();

		$data['type'] = "alert alert-success";
		$data['mensage'] = "Membro deletado com sucesso.";
		$data['titulo'] = "Exclusão realizada!!";

		$this->Index($data);
	}

	public function alterar(){

		$this->Membros->nome = $this->input->post('nome');
		$this->Membros->descricao = $this->input->post('descricao_alt');
		$this->Membros->lattes = $this->input->post('lattes');
		$this->Membros->id = $this->input->post('id');

		if($this->input->post('muda_foto') == "1") $this->Membros->foto = "Sem foto.png";
		if($_FILES['foto']['type'] != null){
			$nome_arquivo = $_FILES['foto']['name'];
			$this->Membros->foto = $nome_arquivo;
			$caminho = "./img/membros";

			$this->load->library('upload',$this->conf_upload($caminho,$nome_arquivo));
			if(!$this->upload->do_upload('foto')) {
				$this->erro_no_sistema_dados_usuario("Menbros");
				$data['type'] = "alert alert-warning";
				$data['titulo'] = "Atenção!";
				$data['mensagem'] = "Cadastro alterado cadastrado, porém tivemos um pequeno problema ao fazer o upload da sua foto. Já enviamos um email ao administrador para que o problema seja resolvido, em breve lhe-enviaremos um email notificando-o que o problema foi resolvido, pedimos desculpas pelo o ocorrido!!";
			}
		}

		$this->Membros->update();
		
		$data['type'] = "alert alert-success";
		$data['mensage'] = "Cadastro de membro alterado com sucesso.";
		$data['titulo'] = "Cadastro alterado !!";
		
		$this->Index($data);
	}
}
?>
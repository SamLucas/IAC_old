<?php
class Papers extends MY_Login {

	public function __construct(){
		parent::__construct();
	}

	public function index($data = null){

		$this->Pesquisa->id = $this->input->get('id');
		$data['title'] = 'Grupo de Pesquisa IAC';
		$data['papers'] = $this->Pesquisa->papers();
		$data['id_linha'] = $this->input->get('id');
		$data['linha_nome'] = $this->input->get('nome');

		$this->load->view('Backend/Header', $data);
		$this->load->view('Backend/Footer');
		$this->load->view('Backend/Pesquisa/Papers/Index',$data);
	}

	public function alterar_papers(){

		$this->Papers->id = $this->input->post('id_paper');
		$this->Papers->id_linha = $this->input->post('id_linha');
		$this->Papers->nome = $this->input->post('nome');
		$this->Papers->descricao = $this->input->post('descricao');
		$this->Papers->autor = $this->input->post('autor');
		$this->Papers->arquivo = str_replace(' ','_',$_FILES['arquivo']['name']);;
		$this->Papers->alterar();

		if($_FILES['arquivo'] != null) {
			$nome = str_replace(' ','_',$_FILES['arquivo']['name']);;
			$caminho = "./upload/papers/".$this->input->post('id_linha');
			$configuracao = array(
				'upload_path'   => $caminho,
				'allowed_types' => '*',
				'file_name'     => $nome,
				'overwrite' => TRUE
			);      
			$this->load->library('upload',$configuracao);

			$arquivo = $_FILES['arquivo'];
			if(!$this->upload->do_upload('arquivo')) echo $this->upload->display_errors();
		}


		$data['type'] = "alert alert-success";
		$data['titulo'] = "Sucesso!";
		$data['mensagem'] = "O Paper foi alterado!";

		$data['title'] = 'Grupo de Pesquisa IAC';
		$this->Pesquisa->id = $this->input->post('id_linha');
		$data['papers'] = $this->Pesquisa->papers();
		$data['id_linha'] = $this->input->post('id_linha');
		$data['linha_nome'] = $this->input->post('linha_nome');

		$this->load->view('Backend/Header', $data);
		$this->load->view('Backend/Footer');
		$this->load->view('Backend/Pesquisa/Papers/Index',$data);
	}

	public function cadastro_papers(){

		$this->Papers->id_linha = $this->input->post('id_linha');
		$this->Papers->nome = $this->input->post('nome');
		$this->Papers->descricao = $this->input->post('descricao');
		$this->Papers->autor = $this->input->post('autor');
		$this->Papers->arquivo = str_replace(' ','_',$_FILES['arquivo']['name']);;

		$nome = str_replace(' ','_',$_FILES['arquivo']['name']);;
		$caminho = "./upload/papers/".$this->input->post('id_linha');
		$configuracao = array(
			'upload_path'   => $caminho,
				'allowed_types' => '*',
				'file_name'     => $nome,
				'overwrite' => TRUE
		);      
		$this->load->library('upload',$configuracao);

		$arquivo = $_FILES['arquivo'];
		$this->Papers->cadastrar();
		$this->upload->do_upload('arquivo');
		// ) echo $this->upload->display_errors();

		$this->Pesquisa->id = $this->input->post('id_linha');
		$data['type'] = "alert alert-success";
		$data['titulo'] = "Sucesso!";
		$data['mensagem'] = "O Paper foi adicionado a linha de pesquisa!";
		$data['title'] = 'Grupo de Pesquisa IAC';
		$data['artigos'] = $this->Pesquisa->getid();
		$data['papers'] = $this->Pesquisa->papers();
		$data['id_linha'] = $this->input->post('id_linha');
		$data['linha_nome'] = $this->input->post('linha_nome');

		$this->load->view('Backend/Header', $data);
		$this->load->view('Backend/Footer');
		$this->load->view('Backend/Pesquisa/Papers/Index',$data);

	}

	public function deletar_paper(){

		$this->Papers->id_linha = $this->input->post('id_linha');
		$this->Papers->id = $this->input->post('id_paper');

		// var_dump($_POST);
		$this->Papers->deletar();

		$this->Pesquisa->id = $this->input->post('id_linha');
		$data['type'] = "alert alert-success";
		$data['titulo'] = "Sucesso!";
		$data['mensagem'] = "O Paper foi excluido a linha de pesquisa!";
		$data['papers'] = $this->Pesquisa->papers();
		$data['id_linha'] = $this->input->post('id_linha');
		$data['linha_nome'] = $this->input->post('linha_nome');

		$this->load->view('Backend/Header', $data);
		$this->load->view('Backend/Footer');
		$this->load->view('Backend/Pesquisa/Papers/Index',$data);

	}
}
?>
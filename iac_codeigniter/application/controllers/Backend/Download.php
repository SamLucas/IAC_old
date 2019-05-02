<?php
class Download extends MY_Login{

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		
		$data['title'] = 'Grupo de Pesquisa IAC';
		$data['arquivos'] = $this->Download->getall();	

		$this->load->view('Backend/Header', $data);
		$this->load->view('Backend/Footer');
		$this->load->view('Backend/Download/Index', $data);
	}

	public function deletar(){

		$this->Download->id = $this->input->post('id');
		$this->Download->deletar();
		
		$data['title'] = 'Grupo de Pesquisa IAC';
		$data['arquivos'] = $this->Download->getall();	

		$data['type'] = "alert alert-success";
		$data['titulo'] = "Exclusão efetuada!!";
		$data['mensagem'] = "Arquivo deletado.";

		$this->load->view('Backend/Header', $data);
		$this->load->view('Backend/Footer');
		$this->load->view('Backend/Download/Index', $data);
	}

	public function cadastra(){
		$data = array('arquivos' => null);
		$data['title'] = 'Grupo de Pesquisa IAC';
		$this->load->view('Backend/Header', $data);
		$this->load->view('Backend/Footer');
		$this->load->view('Backend/Download/Adicionar',$data);
	}

	public function busca(){

		$id = $this->input->get('id');
		$data['arquivos'] = $this->Download->buscar($id);
		$data['title'] = 'Grupo de Pesquisa IAC';		

		$this->load->view('Backend/Header', $data);
		$this->load->view('Backend/Footer');	
		$this->load->view('Backend/Download/Adicionar', $data);
	}

	public function dados(){

		$this->Download->identificacao = $this->input->post('nome');
		$this->Download->descricao = $this->input->post('mensagem');

		$data['type'] = null;
		$data['titulo'] = null;
		$data['mensagem'] = null;

		if(empty($_FILES['arquivo'])){

			$nome_arquivo = str_replace(' ','_',$_FILES['arquivo']['name']);
			$this->load->library('upload',conf_upload("./upload/download",$nome_arquivo));
			if(!$this->upload->do_upload('arquivo')) {
				erro_no_sistema_dados_usuario("Download");
				$data['type'] = "alert alert-warning";
				$data['titulo'] = "Atenção!";
				$data['mensagem'] = "Download cadastrado, porém tivemos um pequeno problema ao fazer o upload do seu arquivo. Já enviamos um email ao administrador para que o problema seja resolvido, em breve lhe-enviaremos um email notificando-o que o problema foi resolvido, pedimos desculpas pelo o ocorrido!!";
			}

			$info_arquivo = $this->upload->data();
			$nome = $info_arquivo["file_name"];
			$type = $info_arquivo["file_ext"];
			$size = $info_arquivo["file_size"];

			$size = $size / 1000;

			$this->Download->nome = $nome;
			$this->Download->type = $type;
			$this->Download->size = $size;
		}

		$this->Download->cadastrar();

		if($data['type'] == null){
			$data['type'] = "alert alert-success";
			$data['titulo'] = "Cadastro efetuada!!";
			$data['mensagem'] = "Download cadastrado.";
		}

		
		$data['title'] = 'Grupo de Pesquisa IAC';
		$data['arquivos'] = $this->Download->getall();		
		$this->load->view('Backend/Header', $data);
		$this->load->view('Backend/Footer');
		$this->load->view('Backend/Download/Index', $data);
	}

	public function update(){

		$identificacao = $this->input->post('nome');
		$descricao = $this->input->post('mensagem');
		$id = $this->input->post('id');

		if(empty($_FILES['arquivo'])){
			
			$nome = str_replace(' ','_',$_FILES['arquivo']['name']);;
			$arquivo = $_FILES['arquivo'];
			$tamanho  = 5e+6;
			$configuracao = array(
				'upload_path'   => './upload/download',
				'allowed_types' => '*',
				'file_name'     => $tamanho,
				'file_name'     => $nome,
				'overwrite' => TRUE
			);      

			$this->load->library('upload',$configuracao);
			$this->upload->do_upload('arquivo');

			$info_arquivo = $this->upload->data();
			$nome = $info_arquivo["file_name"];
			$type = $info_arquivo["file_ext"];
			$size = $info_arquivo["file_size"];

			$size = $size / 1000;

			$this->Download->nome = $nome;
			$this->Download->type = $type;
			$this->Download->size = $size;
		}

		$this->Download->id =$id;
		$this->Download->identificacao = $identificacao; 
		$this->Download->descricao = $descricao;
		$this->Download->update();

		$data['type'] = "alert alert-success";
		$data['titulo'] = "Cadastro atualizado!!";
		$data['mensagem'] = "Download atualizado.";

		
		$data['title'] = 'Grupo de Pesquisa IAC';
		$data['alert'] = 'Alteração realizada com sucesso!!';
		$data['arquivos'] = $this->Download->getall();

		$this->load->view('Backend/Header', $data);
		$this->load->view('Backend/Footer');
		$this->load->view('Backend/Download/Index', $data);
	}
}
?>

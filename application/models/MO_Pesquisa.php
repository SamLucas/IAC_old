<?php 

	class MO_Pesquisa extends CI_Model {
	
		public $id;
		public $titulo;
		public $descricao;
		public $professores;

		public function __construct(){
			parent::__construct();
		}

		public function papers(){
			$this->db->where('ldp_id',$this->id);
			return $this->db->get('papers')->result();
		}

		public function update(){
			$dados = array();
			$dados['ldp_titulo'] = $this->titulo;
			$dados['ldp_descricao'] = $this->descricao;
			$dados['ldp_professores'] = $this->professores;

			$this->db->where('ldp_id', $this->id);
			return $this->db->update('linhas_de_pesquisa', $dados);
		}

		public function cadastrar(){
			$dados = array();
			$dados['ldp_titulo'] = $this->titulo;
			$dados['ldp_descricao'] = $this->descricao;
			$dados['ldp_professores'] = $this->professores;
			return $this->db->insert('linhas_de_pesquisa', $dados);
		}

		public function getall(){
			$query = $this->db->get('linhas_de_pesquisa');
            return $query->result();
		}

		public function getid(){
			$this->db->where('ldp_id', $this->id);
			return $this->db->get('linhas_de_pesquisa')->result_array();   
		}

		public function ultimoid(){
			return $this->db->query("select ldp_id from linhas_de_pesquisa order by ldp_id DESC limit 1")->result()[0]->ldp_id;
		}

		public function deletar(){
			$this->db->where('ldp_id', $this->id);
			$this->db->delete('linhas_de_pesquisa');
		}
	}
	
 ?>

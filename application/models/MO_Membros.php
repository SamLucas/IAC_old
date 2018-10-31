<?php 

	class MO_Membros extends CI_Model {
	
		public $id;
		public $nome;
		public $descricao;
		public $lattes;
		public $foto;

		public function __construct(){
			parent::__construct();
		}
		
		public function cadastrar(){

			$dados = array();
			$dados['mem_nome'] = $this->nome;
			$dados['mem_descricao'] = $this->descricao;
			$dados['mem_lattes'] = $this->lattes;
			$dados['mem_foto'] = $this->foto;

			$this->db->insert('membros', $dados);
		}

		public function update(){
			$dados = array();
			$dados['mem_nome'] = $this->nome;
			$dados['mem_descricao'] = $this->descricao;
			$dados['mem_lattes'] = $this->lattes;
			if($this->foto!=null) $dados['mem_foto'] = $this->foto;

			$this->db->where('mem_id', $this->id);
			$this->db->update('membros', $dados);
		}

		public function delete(){
			$this->db->where('mem_id', $this->id);
			$this->db->delete('membros');	
		}

		public function select(){
			$query = $this->db->get('membros')->result();
			return $query;
		}
	}
	
 ?>

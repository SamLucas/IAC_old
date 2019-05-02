<?php 

	class MO_Papers extends CI_Model {
	
		public $id;
		public $nome;
		public $descricao;
		public $autor;
		public $arquivo;
		public $id_linha;

		public function __construct(){
			parent::__construct();
		}

		public function deletar(){
			$this->db->where('pap_id',$this->id);
			$this->db->where('ldp_id',$this->id_linha);
			$this->db->delete('papers');
		}

		public function alterar(){
			
			$dados['pap_nome'] = $this->nome;
			$dados['pap_descricao'] = $this->descricao;
			$dados['pap_autor'] = $this->autor;
			
			if($this->arquivo != NULL) $dados['pap_arquivo'] = $this->arquivo;

			$this->db->where('pap_id', $this->id);
			$this->db->update('papers', $dados);
		}

		public function cadastrar(){

			$dados['pap_nome'] = $this->nome;
			$dados['pap_descricao'] = $this->descricao;
			$dados['pap_autor'] = $this->autor;
			$dados['pap_arquivo'] = $this->arquivo;
			$dados['ldp_id'] = $this->id_linha;
			$this->db->insert('papers', $dados);
		}

		public function	deleteall($id){
			$this->db->where('ldp_id', $id);
			$this->db->delete('papers');	
		}

		public function getall(){
			$query = $this->db->get('papers');
            return $query->result_array();
		}

		public function getid(){
			$this->db->where('ldp_id', $this->id);
			return $this->db->get('linhas_de_pesquisa')->result();   
		}
	}
	
 ?>

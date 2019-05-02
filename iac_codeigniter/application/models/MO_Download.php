<?php
	class MO_Download extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public $id,$nome,$tipo,$size,$descricao,$identificacao;


		public function cadastrar(){
			
			$dados = array(
				"dow_identificacao" => $this->identificacao,
				"dow_descricao" => $this->descricao,
				"dow_nome" => $this->nome,
				"dow_tipo" => $this->type,
				"dow_tamanho" => $this->size
			);

			$this->db->insert('download', $dados);
		}

		public function deletar(){
			$this->db->where('dow_id',$this->id);
			$this->db->delete('download');
		}

		public function update(){
			
			$dados = array(
				"dow_identificacao" => $this->identificacao,
				"dow_descricao" => $this->descricao
			);

			if(!empty($this->nome)){
				$dados['dow_nome'] = $this->nome;
				$dados['dow_tipo'] = $this->type;
				$dados['dow_tamanho'] = $this->size;
			}

			$this->db->where('dow_id', $this->id);
			$this->db->update('download', $dados);
		}


		public function buscar($id){

			$query = $this->db->get_where('download', array('dow_id' => $id), 1);
			return $query->result_array();
		}

		public function getall(){
			$query = $this->db->get('download');
			return $query->result();
		}
	}
?>
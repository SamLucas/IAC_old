<?php 

	class MO_Noticia extends CI_Model {
		
		public $id;
		public $titulo;
		public $autor;
		public $texto;
		public $decricao;

		public function __construct(){
			parent::__construct();
		}

		public function cadastrar(){

			$dados = array(
				'not_titulo' => $this->titulo,
				'not_autor' => $this->autor,
				'not_texto' => $this->texto,
				'not_descri' => $this->descricao
			);

			$this->db->insert('noticias',$dados);
		}

		public function deletar(){
			$this->db->where('not_id',$this->id);
			$this->db->delete('noticias');
		}

		public function ativa(){
			$this->db->where('not_id',$this->id);
			$dados = $this->db->get('noticias')->result_array();
			$dados[0]['not_ativo'] += 1;
			$altera = array('not_ativo' => $dados[0]['not_ativo']);
			$this->db->where('not_id',$this->id);
			$this->db->update('noticias',$altera);			
		}

		public function alterar(){

			$dados = array(
				'not_titulo' => $this->titulo,
				'not_autor' => $this->autor,
				'not_texto' => $this->texto,
				'not_descri' => $this->descricao
			);

			$this->db->where('not_id',$this->id);
			$this->db->update('noticias',$dados);
		}

		public function getall(){
			return $this->db->get('noticias')->result();
		}

		public function getnoticia($id){
	    	$this->db->where('not_id',$id);
	    	return $this->db->get('noticias')->result_array();
	    }

	}
	
 ?>

<?php 

	class MO_Contato extends CI_Model {
	
		public $id;
		public $titulo;
		public $mensagem;
		public $lates;

		public $nome;
		public $assunto;
		public $email;


		public function __construct(){
			parent::__construct();
		}

		public function update(){

			$dados = array();
			$dados['perfil_textocontato'] = $this->mensagem;
			$dados['perfil_titulo'] = $this->titulo;
			$dados['perfil_lates'] = $this->lates;

			$this->db->where('perfil_id', 1);
			return $this->db->update('perfil_iac', $dados);

		}

		public function msg_vista(){
			$dados = array();
			$dados['con_visto'] = 1;
			$this->db->where('con_id',$this->id);
			$this->db->update('contato', $dados);
		}

		public function mensagem(){
			$dados = array(
				'con_nome' => $this->nome,
				'con_email' => $this->email,
				'con_assunto' => $this->assunto,
				'con_mensagem' => $this->mensagem
			);

			$this->db->insert('contato', $dados);

		}

		public function getmensagemid(){
			$this->db->where('con_id', $this->id);
			$query = $this->db->get('contato',1);
            return $query->result_array();
		}

		public function getmensagens(){
			$query = $this->db->get('contato');
            return $query->result();
		}

		public function select(){
			$query = $this->db->get('perfil_iac', 1);
            return $query->result();
		}
	}
	
 ?>

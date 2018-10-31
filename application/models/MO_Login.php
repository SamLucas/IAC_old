<?php

class MO_Login extends CI_Model {

	public $email;
	public $senha;
	public $nome;
	public $senha1;
	public $senhaatual;

	public function verificasenhaatual(){
		$this->db->where('adm_senha',$this->senhaatual);
		$dados = $this->db->get("administrador",1)->result_array();
		return $dados == null ? false:true;
	}

	public function altera_senha(){
		$dados['adm_senha'] = $this->senha1;
		$this->db->where('adm_id',$this->session->id);
		$this->db->update("administrador",$dados);
	}

	public function verifica_email($email){
		$this->db->where('adm_email',$email);
		$dados = $this->db->get("administrador")->result();
		return sizeof($dados);
	}	

	public function altera_senhaemail(){
		$dados['adm_senha'] = $this->senha;
		$this->db->where('adm_email',$this->email);
		$this->db->update("administrador",$dados);
	}

	public function altera_dados(){
		$dados['adm_email'] = $this->email;
		$dados['adm_nome'] = $this->nome;
		$this->db->where('adm_id',$this->session->id);
		$this->db->update("administrador",$dados);
	}

	public function confere(){
		$this->db->where("adm_email",$this->email);
		$this->db->where("adm_senha",$this->senha);
		$dados = $this->db->get("administrador",1)->result_array();
		return $dados;
	}
}

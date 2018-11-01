<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct(){
    	parent::__construct();

    }

    public $config_email = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'email@gmail.com',
        'smtp_pass' => 'senha',
        'mailtype'  => 'html', 
        'charset'   => 'utf-8'
    );

    public function conf_upload($caminho, $nome){
        $configuracao = array(
            'upload_path'   => $caminho,
            'allowed_types' => '*',
            'file_name'     => '5e+6',
            'file_name'     => $nome,
            'overwrite' => TRUE
        );
        return $configuracao;
    }

    public function erro_no_sistema_dados_usuario($identificacao){
        $this->load->library('email', $this->config_email);
        $this->email->set_newline("\r\n");
        $this->email->from('samuellucas0603@gmail.com');
        $this->email->to($this->input->post('email'));
        $this->email->subject('Erro no sistema IAC');
        $this->email->message("Erro no upload do arquivo no controller: ". $identificacao."\nNome do Usuario: ". $this->session->nome . "\nEmail do usuario: ".$this->session->email);
        $this->email->send();
    }
}

class MY_Models extends MY_Controller {

    function __construct(){
        parent::__construct();
        
        $this->load->model('MO_Contato','Contato');
        $this->load->model('MO_Download','Download');
        $this->load->model('MO_Membros','Membros');
        $this->load->model('MO_Noticia','Noticia');
        $this->load->model('MO_Papers','Papers');
        $this->load->model('MO_Pesquisa','Pesquisa');
        $this->load->model('MO_Login','Login');
    }
}

class MY_Login extends MY_Models {

    function __construct(){
    	parent::__construct();
        if($this->session->logado == null)
            header("location:".base_url("Backend/Login"));
    }
}

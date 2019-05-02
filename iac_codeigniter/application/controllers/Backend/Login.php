<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Models {

    function __construct() {
        parent::__construct();
    }

    function index($alert = null) {

        $data['title'] = 'Login';
        $this->load->view('Backend/Header',$data);
        $this->load->view('Backend/Footer'); 
        if($alert == null) $this->load->view('Backend/Login/Index');
        else $this->load->view('Backend/Login/Index',$alert);
    }

    public function altsenha(){
        $data['title'] = 'Login';
        $this->load->view('Backend/Header',$data);
        $this->load->view('Backend/Footer'); 
        $this->load->view('Backend/Login/RecebeEmail');
    }

    public function MandaCodigo(){

        if($this->Login->verifica_email($this->input->post('email'))){

            for ($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != 10; $x = rand(0,$z), $s .= $a{$x}, $i++); 
            $this->Login->email = $this->input->post('email');
            $this->Login->senha = md5($s);
            $this->Login->altera_senhaemail();

            $link = base_url("Backend/Login/Index");

            $mensagem = "
                <html xmlns='http://www.w3.org/1999/xhtml'>
                <head>
                    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
                    <title>A Simple Responsive HTML Email</title>
                    <style type='text/css'>
                    * {text-decoration: none;}
                    body {background: url('../../img/bacgroud/map.png') 60px center;
                    background-repeat: no-repeat;
                    background-attachment: fixed;}
                    .content {width: 100%; max-width: 600px;}
                    a {color: white;}
                    .div-whithe {background-color: white;}
                    .btn-enviar {background-color: #92C949; color: white; padding:10px;display:block; margin: 0 auto;width:50%;}
                    .title {color: white;padding:20px;}
                    
                </style>
                </head>
                <body yahoo>
                    <body yahoo>
                        <table width='40%' style='margin: 0 auto;' bgcolor='' border='0' alling='center' cellpadding='0' allincellspacing='0'>
                            <tr>
                                <td bgcolor='#92C949' class='title'>Confirmação!</td>
                            </tr>
                            <tr>
                                <td style='padding: 10px;'>
                                    <p>Senha alterada!<br></p>
                                    <p>Sua senha foi alterar, para entrar faça o login novamente.
                                    <br>Sua nova senha: <span>".$s."</span><br><br>
                                    <a href=".$link." class='btn-enviar' style='text-align:center;color: white;'>Login</a>
                                    <p>Caso nao seja você, por favor desconsidere esse email.</p>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor='#92C949' class='title' style='text-align:center;'>Painel administrativo</td>
                            </tr>
                        </table>
                    </body>
                </html>
            ";

            $this->load->library('email', $this->config_email);
            $this->email->set_newline("\r\n");
            $this->email->from($this->Login->email);
            $this->email->to($this->input->post('email'));
            $this->email->subject('Alteração de senha');
            $this->email->message($mensagem);
            $this->email->send();

            $data['title'] = "Login";

            $this->load->view('Backend/Header',$data);
            $this->load->view('Backend/Footer');
            $this->load->view("Backend/Login/Index");
        }

        else {

            $data['title'] = "Login";

            $data['title'] = "Erro!";
            $data['type'] = "alert alert-danger";
            $data['mensagem'] = "O email inserido não consta na base de dados.";

            $this->load->view('Backend/Header',$data);
            $this->load->view('Backend/Footer');
            $this->load->view("Backend/Login/RecebeEmail",$data);

        }

    }

    public function verificar(){

        $this->Login->email = addslashes($this->input->post("email"));
        $this->Login->senha = addslashes(md5($this->input->post("senha")));

        if($this->Login->verifica_email($this->input->post('email'))){
            $dados = $this->Login->confere();
            if(!empty($dados)){ 
                $this->session->set_userdata("tipo", "Administrador");
                $this->session->set_userdata("logado", 1);
                $this->session->set_userdata("id", $dados[0]['adm_id']);
                $this->session->set_userdata("nome", $dados[0]['adm_nome']);
                $this->session->set_userdata("email", $dados[0]['adm_email']);
                $this->session->set_userdata("foto", $dados[0]['adm_foto']);
                redirect(base_url('Backend'));
            } else {
                $alert = array();
                $alert['title'] = "Erro!";
                $alert['type'] = "alert alert-danger";
                $alert['mensagem'] = "Senha incorreta";
                $this->Index($alert);
            }
        } else {
            $alert = array();
            $alert['title'] = "Erro!";
            $alert['type'] = "alert alert-danger";
            $alert['mensagem'] = "Nenhum usuario foi cadastrado com esse email";
            $this->Index($alert);
        }
    }

    public function Logout(){
        $this->session->unset_userdata("logado");
        redirect(base_url());   
    }
}
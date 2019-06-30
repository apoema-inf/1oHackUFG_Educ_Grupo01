<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Autenticar extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->helper('url');
    }
    
    function index(){

        // validação do formulário
        $this->form_validation->set_message('required','Campo %s obrigatório');
        $this->form_validation->set_rules('usuarios_email','E-mail ou CPF','trim|required');
        $this->form_validation->set_rules('usuarios_senha','Senha','trim|required');

        // se tentar logar
        if($this->form_validation->run() == FALSE){
            redirect('index.php/login', 'refresh');
            
        } else{

            $usuarios_email = $this->input->post('usuarios_email');
            $usuarios_senha = $this->input->post('usuarios_senha');

            
            
            $result = $this->usuarios_model->login($usuarios_email,$usuarios_senha);
            
            // se usuário for cadastrado, então verifica o nível de acesso e entra no sistema
            if(isset($result) && (!empty($result))){
                
                foreach($result as $usuario){
                    $sess_array = array(
                        'usuarios_id' => $usuario->usuarios_id,
                        'usuarios_nome' => $usuario->usuarios_nome,
                        'usuarios_sobrenome' => $usuario->usuarios_sobrenome,
                        'usuarios_email' => $usuario->usuarios_email,
                        'usuarios_nivel' => $usuario->usuarios_nivel_acesso,
                        'usuarios_sexo' => $usuario->usuarios_sexo,
                        
                    );
                    
                }
                
                // cria a sessão do usuário
                $this->session->set_userdata('logged_in',$sess_array);
                
                // acessa a area de administrador 
                if($sess_array['usuarios_nivel'] == 0){
                    redirect('index.php/administrativo', 'refresh');

                // acessa a area de médicos
                } else if($sess_array['usuarios_nivel'] == 1){
                    redirect('index.php/medico', 'refresh');
                
                // acessa a area de secretárias
                }else if($sess_array['usuarios_nivel'] == 2){
                    redirect('index.php/atendente', 'refresh');
                
                // acessa a area de pacientes
                }else if($sess_array['usuarios_nivel'] == 3){
                    redirect('index.php/paciente', 'refresh');
                
                // senão retorna para a area de login
                }else{
                    redirect('index.php/login','refresh'); 
                }
            
            // se o usuário não for cadastrado redireciona para o login
            } else {
                redirect('index.php/login','refresh');
            }
            
        }

    }

}
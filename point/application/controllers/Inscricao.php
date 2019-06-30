<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscricao extends CI_Controller {
    public function __construct() {
        parent::__construct();
		$this->load->model('inscricao_model');
		$this->load->model('usuarios_model');
		$this->load->model('eventos_model');       
    }    

	public function index()	{
        $data['page_title'] = 'Eventos';
		$data['pagina'] = 'inscricao/index';
		$data['eventos'] = $this->eventos_model->get_eventos();
        $this->parser->parse('view_administrador', $data);           
    }
    	
    public function inscrever($evento, $usuario){
		$data['page_title'] = 'Eventos';
		$data['pagina'] = 'inscricao/index';
		$this->inscricao_model->set_inscricao($evento, $usuario);
		$data['eventos'] = $this->eventos_model->get_eventos();
        $this->parser->parse('view_administrador', $data); 
		$this->session->set_flashdata('msg_ok', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Atualização realizada com sucesso!</div>');
	
	}

	public function deletar($id){
		$this->inscricao_model->delete_inscricao($id);
        $this->session->set_flashdata('msg_ok', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>A informação foi removida com sucesso!</div>');
        redirect('index.php/inscricao');	

	}


}
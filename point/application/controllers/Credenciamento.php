<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class credenciamento extends CI_Controller {
    public function __construct() {
        parent::__construct();
		$this->load->model('credenciamento_model');
		$this->load->model('usuarios_model');
		$this->load->model('eventos_model');       
    }    

	public function index()	{
        $data['page_title'] = 'Evento';
		$data['pagina'] = 'credenciamento/index';
		$data['eventos'] = $this->eventos_model->get_select_eventos();
        $this->parser->parse('view_administrador', $data);           
    }
    
    	
    public function inscritos() {

		$data['page_title'] = 'Credenciar';
		$data['pagina'] = 'credenciamento/credenciar';
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
            
        # Dados do formulário
		$this->form_validation->set_rules('eventos_id', 'evento');
		$data['eventos'] = $this->eventos_model->get_eventos_by_id($this->input->post('eventos_id'));
		$data['usuarios'] = $this->eventos_model->get_usuarios_evento($this->input->post('eventos_id'));
        $this->parser->parse('view_administrador', $data);
		
	}

	public function credenciar() {

		$data['page_title'] = 'Credenciar';
		$data['pagina'] = 'credenciamento/credenciar';
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
            
        # Dados do formulário
		$this->form_validation->set_rules('eventos_id', 'evento');
		$this->form_validation->set_rules('usuario_id', 'usuario');
		$this->form_validation->set_rules('credenciador_id', 'credenciador');
		
		$this->credenciamento_model->set_credenciamento();
		$this->session->set_flashdata('msg_ok', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Atualização realizada com sucesso!</div>');
		$data['eventos'] = $this->eventos_model->get_eventos_by_id($this->input->post('eventos_id'));
		$data['usuarios'] = $this->eventos_model->get_usuarios_evento($this->input->post('eventos_id'));
        $this->parser->parse('view_administrador', $data);
		
	}

	public function deletar($id){
		$this->credenciamento_model->delete_credenciamento($id);
        $this->session->set_flashdata('msg_ok', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>A informação foi removida com sucesso!</div>');
        redirect('index.php/credenciamento');	

	}
}
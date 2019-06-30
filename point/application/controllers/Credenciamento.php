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
        $data['page_title'] = 'Selecionar Evento';
		$data['pagina'] = 'credenciamento/index';
		$data['eventos'] = $this->eventos_model->get_select_eventos();
        $this->parser->parse('view_administrador', $data);           
    }
    
    	
    public function credenciar() {

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
            
        # Dados do formulário
		$this->form_validation->set_rules('eventos_id', 'Id do médico', 'required|min_length[1]|max_length[100]');
		
		echo $this->input->post('credenciamento_eventos_id');
        $data['page_title'] = 'Credenciar';
		$data['pagina'] = 'credenciamento/credenciar';
		$data['eventos'] = $this->eventos_model->get_eventos_by_id($this->input->post('eventos_id'));
		$data['usuarios'] = $this->eventos_model->get_usuarios_evento($this->input->post('eventos_id'));
        $this->parser->parse('view_administrador', $data); 
	}


	public function editar($id){
		
		$data['page_title'] = 'Credenciamento';
		$data['credenciamento'] = $this->credenciamento_model->get_credenciamento_by_id($id);
		$data['areas'] = $this->areas_model->get_select_areas();

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
        
        # Dados do formulário
		$this->form_validation->set_rules('credenciamento_participante_usuarios_id','Participante');
		$this->form_validation->set_rules('credenciamento_eventos_id', 'Eventos','required');

        
		if ($this->form_validation->run() === FALSE){
			$data['pagina'] = 'credenciamento/editar';
			$data['usuarios'] = $this->usuarios_model->get_select_usuario();
			$data['eventos'] = $this->eventos_model->get_select_eventos();
            $this->parser->parse('view_administrador', $data);
		
		}else {	
			# insere os dados
			$this->credenciamento_model->set_credenciamento($id);
			$this->session->set_flashdata('msg_ok', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Atualização realizada com sucesso!</div>');
			redirect('index.php/credenciamento');
		}
	}

	public function deletar($id){

		$this->credenciamento_model->delete_credenciamento($id);
        $this->session->set_flashdata('msg_ok', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>A informação foi removida com sucesso!</div>');
        redirect('index.php/credenciamento');	

	}
	public function pesquisar(){

		$this->form_validation->set_rules('buscar');
        $data['page_title'] = 'Credenciamento';
		$data['pagina'] = 'credenciamento/index';
		$data["results"] = $this->credenciamento_model->search_credenciamento($this->input->post('buscar'));
        $data["links"] = '';
        $this->parser->parse('view_administrador', $data);
           
    }


	public function view($id){
	
		$data['page_title'] = 'Credenciamento';
		$data['credenciamento'] = $this->credenciamento_model->get_credenciamento_by_id($id);
		$data['usuarios'] = $this->usuarios_model->get_select_usuario();
		$data['eventos'] = $this->eventos_model->get_select_eventos();
		$data['usuarios_cred'] = $this->usuarios_model->get_select_usuario();
		$data['pagina'] = 'credenciamento/view';
		$this->parser->parse('view_administrador', $data);

	}

}
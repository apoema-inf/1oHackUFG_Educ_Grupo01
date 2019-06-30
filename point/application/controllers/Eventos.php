<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class eventos extends CI_Controller {
    public function __construct() {
        parent::__construct();
		$this->load->model('eventos_model');
		$this->load->model('usuarios_model');
		$this->load->model('areas_model');

                
    }    

	public function index()	{
        $data['page_title'] = 'Eventos';
		$data['pagina'] = 'eventos/index';
		$config = array();
        $config["base_url"] = site_url() . "index.php/eventos/index";
        $config["total_rows"] = $this->eventos_model->record_count();
        $config["per_page"] = 12;
        $config["uri_segment"] = 3;
		
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->eventos_model->fetch_eventos($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $this->parser->parse('view_administrador', $data);           
    }
    
    	
    public function novo() {
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
		
		# Dados do formulário
        $this->form_validation->set_rules('eventos_descricao', 'Nome do Evento', 'required|min_length[2]|max_length[100]');
		$this->form_validation->set_rules('eventos_valor', 'Valor', 'required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('eventos_responsavel_usuarios_id','Responsável');
		$this->form_validation->set_rules('eventos_areas_id', 'Areas','required');
		$this->form_validation->set_rules('eventos_data_inicial', 'Data', 'required|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('eventos_data_final', 'Data', 'required|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('eventos_horario_inicial', 'Hora', 'required|min_length[8]|max_length[8]');
		$this->form_validation->set_rules('eventos_horario_final', 'hora', 'required|min_length[8]|max_length[8]');
		$this->form_validation->set_rules('eventos_carga_horaria', 'carga horária', 'required|min_length[1]|max_length[3]');
		$this->form_validation->set_rules('eventos_vagas', 'vagas', 'required|min_length[1]|max_length[5]');
		$this->form_validation->set_rules('eventos_info', 'Informações', 'required');
		

		if ($this->form_validation->run() === FALSE){
            $data['page_title'] = 'Eventos';
			$data['pagina'] = 'eventos/cadastro';
			$data['usuarios'] = $this->usuarios_model->get_select_usuario();
			$data['areas'] = $this->areas_model->get_select_areas();
			$this->parser->parse('view_administrador', $data);
		
		}else{	
			# insere os dados
			$this->eventos_model->set_eventos();
			$this->session->set_flashdata('msg_ok', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Cadastrado com sucesso!</div>');
			redirect('index.php/eventos');
		}
	}


	public function editar($id){
		
		$data['page_title'] = 'Eventos';
		$data['eventos'] = $this->eventos_model->get_eventos_by_id($id);
		$data['areas'] = $this->areas_model->get_select_areas();

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
        
        # Dados do formulário
        $this->form_validation->set_rules('eventos_descricao', 'Nome do Evento', 'required|min_length[2]|max_length[100]');
		$this->form_validation->set_rules('eventos_valor', 'Valor', 'required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('eventos_responsavel_usuarios_id','Responsável');
		$this->form_validation->set_rules('eventos_areas_id', 'Areas','required');
		$this->form_validation->set_rules('eventos_data_inicial', 'Data', 'required|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('eventos_data_final', 'Data', 'required|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('eventos_horario_inicial', 'Hora', 'required|min_length[8]|max_length[8]');
		$this->form_validation->set_rules('eventos_horario_final', 'hora', 'required|min_length[8]|max_length[8]');
		$this->form_validation->set_rules('eventos_carga_horaria', 'carga horária', 'required|min_length[1]|max_length[3]');
		$this->form_validation->set_rules('eventos_vagas', 'vagas', 'required|min_length[1]|max_length[5]');
		$this->form_validation->set_rules('eventos_info', 'Informações', 'required');

        
		if ($this->form_validation->run() === FALSE){
			$data['pagina'] = 'eventos/editar';
			$data['usuarios'] = $this->usuarios_model->get_select_usuario();
			$data['areas'] = $this->areas_model->get_select_areas();
            $this->parser->parse('view_administrador', $data);
		
		}else {	
			# insere os dados
			$this->eventos_model->set_eventos($id);
			$this->session->set_flashdata('msg_ok', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Atualização realizada com sucesso!</div>');
			redirect('index.php/eventos');
		}
	}

	public function deletar($id){

		$this->eventos_model->delete_eventos($id);
        $this->session->set_flashdata('msg_ok', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>A informação foi removida com sucesso!</div>');
        redirect('index.php/eventos');	

	}
	public function pesquisar(){

		$this->form_validation->set_rules('buscar');
        $data['page_title'] = 'Eventos';
		$data['pagina'] = 'eventos/index';
		$data["results"] = $this->eventos_model->search_eventos($this->input->post('buscar'));
        $data["links"] = '';
        $this->parser->parse('view_administrador', $data);
           
    }


	public function view($id){
	
		$data['page_title'] = 'Eventos';
		$data['eventos'] = $this->eventos_model->get_eventos_by_id($id);
		$data['usuarios'] = $this->usuarios_model->get_select_usuario();
		$data['areas'] = $this->areas_model->get_select_areas();
		$data['usuarios_atendente'] = $this->usuarios_model->get_select_usuario();
		$data['pagina'] = 'eventos/view';
		$this->parser->parse('view_administrador', $data);

	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class areas extends CI_Controller {
    public function __construct() {
        parent::__construct();
		$this->load->model('areas_model');
           
    }    

	public function index()	{
        $data['page_title'] = 'areas';
		$data['pagina'] = 'areas/index';
		$config = array();
        $config["base_url"] = site_url() . "index.php/areas/index";
        $config["total_rows"] = $this->areas_model->record_count();
        $config["per_page"] = 12;
        $config["uri_segment"] = 3;
		
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->areas_model->fetch_areas($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $this->parser->parse('view_administrador', $data);           
	}

    	
    public function novo() {
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
		
		# Dados do formulário
		$this->form_validation->set_rules('areas_descricao', 'areas', 'required|min_length[2]|max_length[100]');

		if ($this->form_validation->run() === FALSE){
            $data['page_title'] = 'areas';
            $data['pagina'] = 'areas/cadastro';
			$this->parser->parse('view_administrador', $data);
		
		}else{

			$check = $this->areas_model->check_areas_existe($this->input->post('areas_descricao'), $this->input->post('areas_medico_id'));
			if($check == FALSE){
				# insere os dados
				$this->areas_model->set_areas();
				$this->session->set_flashdata('msg_ok', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Cadastrado com sucesso!</div>');
				redirect('index.php/areas');

			}else{
				$this->session->set_flashdata('msg_ok', '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> Já está cadastrado!</div>');
				redirect('index.php/areas');
			}	
			
		}
	}


	public function editar($id){
		
		$data['page_title'] = 'areas';
		$data['areas'] = $this->areas_model->get_areas_by_id($id);

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
        
        # Dados do formulário
		$this->form_validation->set_rules('areas_descricao', 'areas', 'required|min_length[2]|max_length[100]');

        
		if ($this->form_validation->run() === FALSE){
			$data['pagina'] = 'areas/editar';
            $this->parser->parse('view_administrador', $data);
		
		}else {	
			# insere os dados
			$this->areas_model->set_areas($id);
			$this->session->set_flashdata('msg_ok', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Atualização realizada com sucesso!</div>');
			redirect('index.php/areas');
		}
	}

	public function deletar($id){

		$this->areas_model->delete_areas($id);
        $this->session->set_flashdata('msg_ok', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>A informação foi removida com sucesso!</div>');
        redirect('index.php/areas');	

	}
	public function pesquisar(){

		$this->form_validation->set_rules('buscar');
        $data['page_title'] = 'areas';
		$data['pagina'] = 'areas/index';
		$data["results"] = $this->areas_model->search_areas($this->input->post('buscar'));
        $data["links"] = '';
        $this->parser->parse('view_administrador', $data);
           
    }


	public function view($id){
	
		$data['page_title'] = 'areas';
		$data['areas'] = $this->areas_model->get_areas_by_id($id);
		$data['pagina'] = 'areas/view';
		$this->parser->parse('view_administrador', $data);

	}

}
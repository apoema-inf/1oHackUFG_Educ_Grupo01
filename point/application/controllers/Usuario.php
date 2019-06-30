<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
    public function __construct() {
        parent::__construct();
		$this->load->model('usuarios_model');             
    }    

	public function index(){
		
        $data['page_title'] = 'Usuários';
		$data['pagina'] = 'usuario/index';
		$config = array();
        $config["base_url"] = site_url() . "index.php/usuario/index";
        $config["total_rows"] = $this->usuarios_model->record_count();
        $config["per_page"] = 12;
        $config["uri_segment"] = 3;
		
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->usuarios_model->fetch_usuario($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $this->parser->parse('view_administrador', $data);
           
	}
	
    public function novo() {
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
		
		# Dados do usuário
		$this->form_validation->set_rules('usuarios_nome', 'Usuário', 'required|min_length[2]|max_length[100]');
		$this->form_validation->set_rules('usuarios_sobrenome', 'Sobrenome', 'required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('usuarios_cpf', 'CPF', 'required|min_length[14]|max_length[14]');
        $this->form_validation->set_rules('usuarios_email', 'E-mail', 'required|min_length[4]|max_length[100]');
		$this->form_validation->set_rules('usuarios_data_nasc', 'Data de Nascimento', 'required|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('usuarios_sexo', 'Sexo', 'required|min_length[1]|max_length[1]');
        $this->form_validation->set_rules('usuarios_fone1', 'Tel. Móvel', 'required|min_length[4]|max_length[100]');
		$this->form_validation->set_rules('usuarios_fone2', 'Tel. Fixo');
		
			

		if ($this->form_validation->run() === FALSE){
			$data['page_title'] = 'Usuários';
			$data['pagina'] = 'usuario/cadastro';
			$this->parser->parse('view_administrador', $data);
		
		}else{	
			
			$check = $this->usuarios_model->check_usuario_existe($this->input->post('usuarios_cpf'));
			if($check == FALSE){
				# insere os dados do usuário
				$this->usuarios_model->set_usuario();
				$this->session->set_flashdata('msg_ok', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Cadastrado com sucesso!</div>');
				redirect(site_url().'index.php/usuario');

			}else{
				$this->session->set_flashdata('msg_ok', '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Já está cadastrado!</div>');
				redirect(site_url().'index.php/usuario');
			}
		}
	}

	public function editar($id){
		
		$data['page_title'] = 'Usuários';
		$data['usuarios'] = $this->usuarios_model->get_usuario_by_id($id);

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
		# Dados do usuário
		$this->form_validation->set_rules('usuarios_nome', 'Usuário', 'required|min_length[2]|max_length[100]');
		$this->form_validation->set_rules('usuarios_sobrenome', 'Sobrenome', 'required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('usuarios_cpf', 'CPF', 'required|min_length[14]|max_length[14]');
        $this->form_validation->set_rules('usuarios_email', 'E-mail', 'required|min_length[4]|max_length[100]');
		$this->form_validation->set_rules('usuarios_data_nasc', 'Data de Nascimento', 'required|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('usuarios_sexo', 'Sexo', 'required|min_length[1]|max_length[1]');
        $this->form_validation->set_rules('usuarios_fone1', 'Tel. Móvel', 'required|min_length[4]|max_length[100]');
		$this->form_validation->set_rules('usuarios_fone2', 'Tel. Fixo');

        
		if ($this->form_validation->run() === FALSE){
			$data['pagina'] = 'usuario/editar';
            $this->parser->parse('view_administrador', $data);
		
		}else {	
			# insere os dados do usuário
			$this->usuarios_model->set_usuario($id);
			
			$this->session->set_flashdata('msg_ok', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Atualização realizada com sucesso!</div>');
			redirect('index.php/usuario');
		}
	}

	public function deletar($id){

		$this->usuarios_model->delete_usuario($id);
        $this->session->set_flashdata('msg_ok', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>A informação foi removida com sucesso!</div>');
        redirect('index.php/usuario');	

	}
	public function pesquisar(){

		$this->form_validation->set_rules('buscar');
        $data['page_title'] = 'Usuários';
		$data['pagina'] = 'usuario/index';
		$data["results"] = $this->usuarios_model->search_usuario($this->input->post('buscar'));
        $data["links"] = '';
        $this->parser->parse('view_administrador', $data);
           
    }


	public function view($id){
	
		$data['page_title'] = 'Usuários';
		$data['usuarios'] = $this->usuarios_model->get_usuario_by_id($id);
		$data['pagina'] = 'usuario/view';
		$this->parser->parse('view_administrador', $data);

	}

    // Função callback para validações, neste caso estaria chechando se já existe um dado com a mesma descrição
	public function existe_usuario($desc){
		if(!$this->usuarios_model->get_usuario_by_desc($desc))
		{
			return TRUE;
		}
		
		$this->form_validation->set_message('existe', 'Já está cadastrado!');
		return FALSE;
	}


}
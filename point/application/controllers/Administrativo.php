<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrativo extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');
        date_default_timezone_set('America/Sao_Paulo');
                
    }    

	public function index()	{
        $data['page_title'] = 'Painel Administrador';
        $data['pagina'] = 'pagina/home_adm';
		
		// $config = array();
        // $config["base_url"] = site_url() . "/pagina/home";
        // #$config["total_rows"] = $this->cidades_model->record_count();
        // #$config["per_page"] = 3;
        // $config["uri_segment"] = 3;
		
        // #$this->pagination->initialize($config);
 
        // $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        // #$data["results"] = $this->cidades_model->fetch_cidades($config["per_page"], $page);
        
        // $data["links"] = $this->pagination->create_links();

        $this->parser->parse('view_administrador', $data);
        //$this->load->view('cidades/index', $data);    
    }

}
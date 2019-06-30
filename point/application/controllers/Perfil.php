<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('foto_perfil_model');
                
    }    

	public function index()	{
        $data['page_title'] = 'Perfil';
        $data['pagina'] = 'perfil/index';
        $data['error'] = '';
        $this->parser->parse('view_administrador', $data);
           
    }

    
    function upload($id) {
        $data['page_title'] = 'Perfil';
        $data['pagina'] = 'perfil/index';
        $data['error'] = '';

        //parametriza as preferências
        $config["upload_path"] = "assets/upload/perfil";
        $config["allowed_types"] = "gif|jpg|png";
        $config["overwrite"] = TRUE;
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;

        $this->load->library("upload", $config);
        //em caso de sucesso no upload
        if ($this->upload->do_upload('foto_perfil_descricao')) {
            //renomeia a foto
            $nomeorig = $config["upload_path"] . "/" . $this->upload->file_name;
            $nomedestino = $config["upload_path"] . "/pfl_$id" .  $this->upload->file_ext;
            rename($nomeorig, $nomedestino);
           
            $this->session->set_flashdata('msg_ok', '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Cadastrado com sucesso!</div>');
			$this->parser->parse('view_administrador', $data);
           
        } else {

            $this->session->set_flashdata('msg_ok', '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.$this->upload->display_errors().'</div>');
            $this->parser->parse('view_administrador', $data);

        }

    }
}
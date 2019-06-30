<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
	    parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');
        date_default_timezone_set('America/Sao_Paulo');
	}

	public function index()	{
        $this->load->helper(array('form'));
        $this->load->view('view_login');     
    }

    public function sair() {
        if(session_destroy()){
            $this->session->unset_userdata($sess['logged_in']);
            $this->session->unset_userdata('username');   
            $this->session->unset_userdata($result);    
            $this->session->sess_destroy();

        }
            redirect('index.php/login');  
	}
}

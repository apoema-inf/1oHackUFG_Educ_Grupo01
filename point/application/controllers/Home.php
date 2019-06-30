<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
        public function __construct() {
                parent::__construct();
                $this->load->helper('url');
                $this->load->library('form_validation');
                $this->load->helper('form');
                date_default_timezone_set('America/Sao_Paulo');
                
        }

	public function index()	{
                $this->load->view('home');    
        }
        public function login()	{
                $data['teste'] = 'teste';
                $this->load->view('view_login', $data);
                    
        }


        public function logout(){
                $this->session->unset_userdata('logged_in');
                session_destroy();
                redirect('home', 'refresh');
        }

        public function dashboard(){
                if($this->session->unset_userdata('logged_in')){
                        $this->load->view('view_home');
                }else{
                        redirect('login', 'refresh');
                }
                

        }

}
?>

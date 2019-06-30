<?php

class Usuarios_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function login($usuarios_email, $usuarios_senha){
        $this->db->select('*');
        $this->db->from("usuarios");
        $this->db->where("usuarios_email", $usuarios_email);
        $this->db->where("usuarios_senha", md5($usuarios_senha));
        # $this->db->where("usuarios_status",'1');
        #$this->db->limit(1);
        
        $query = $this->db->get();
        if ($query->num_rows() == 1){
            return $query->result();
        }else {
            return FALSE;
        }
        
    }
    public function get_usuario_by_id($id)	{
	
		$query = $this->db->get_where('usuarios', array('usuarios_id' => $id));
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
    }
    public function get_id_usuario($cpf)	{
	
		$query = $this->db->get_where('usuarios', array('usuarios_cpf' => $cpf));
		if ($query->num_rows() > 0) {
            $usuario = $query->row_array();
			return $usuario['usuarios_id'];
		}
		return false;
    }
    public function get_select_usuario()	{
        $this->db->select('usuarios_id, usuarios_nome, usuarios_sobrenome, usuarios_cpf');
        $this->db->order_by('usuarios_nome', 'ASC');
        $query = $this->db->get('usuarios');
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}

	public function get_usuario_by_desc($desc)	{
		strtoupper($desc);
		$query = $this->db->get_where('usuarios', array('usuarios_nome' => $desc));
		if ($query->num_rows() > 0) {

			return $query->row_array();
		}
		return false;
	}
	
	public function get_usuario()
	{
        $query = $this->db->get("usuarios");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function check_usuario_existe($cpf){
        $this->db->select('usuarios_cpf');
            $query = $this->db->get_where('usuarios', array('usuarios_cpf' => $cpf));
     
            if ($query->num_rows() > 0) {
                return TRUE;
            }else{
            return FALSE;
        }
    }

	public function set_usuario($id = null){
        
		# Funciona para update caso seja passado um id e para inserção caso contrário
		if ($id == null) {
            $senha = $this->input->post('usuarios_cpf');
            $senha = preg_replace("/\D+/", "", $senha);
            $data = array(
                'usuarios_nome' => $this->input->post('usuarios_nome'), 
                'usuarios_sobrenome' => $this->input->post('usuarios_sobrenome'),	
                'usuarios_nivel_acesso' => 3, 
                'usuarios_cpf' 	=> $this->input->post('usuarios_cpf'),
                'usuarios_email' => $this->input->post('usuarios_email'),
                'usuarios_senha' => md5($senha),
                'usuarios_data_nasc' => $this->input->post('usuarios_data_nasc'),
                'usuarios_sexo' => $this->input->post('usuarios_sexo'),
                'usuarios_fone1' => $this->input->post('usuarios_fone1'),
                'usuarios_fone2' => $this->input->post('usuarios_fone2')

            );
            return $this->db->insert('usuarios', $data);
            
		} else {
            // alterar
            $data = array(
                'usuarios_nome' => $this->input->post('usuarios_nome'), 
                'usuarios_sobrenome' => $this->input->post('usuarios_sobrenome'),	
                'usuarios_cpf' 	=> $this->input->post('usuarios_cpf'),
                'usuarios_email' => $this->input->post('usuarios_email'),
                'usuarios_data_nasc' => $this->input->post('usuarios_data_nasc'),
                'usuarios_sexo' => $this->input->post('usuarios_sexo'),
                'usuarios_fone1' => $this->input->post('usuarios_fone1'),
                'usuarios_fone2' => $this->input->post('usuarios_fone2')

            );
			$this->db->where('usuarios_id', $id);
			return $this->db->update('usuarios', $data);
		}

    }
    public function update_senha_usuario($id){

        $data = array(
            'usuarios_senha' => md5($this->input->post('usuarios_senha'))
        );

		$this->db->where('usuarios_id', $id);
		return $this->db->update('usuarios', $data);

    }
    
    public function delete_usuario($id){
		return $this->db->delete('usuarios', array('usuarios_id' => $id)); 
	}

	public function record_count() {
        return $this->db->count_all("usuarios");
    }    
 
    public function fetch_usuario($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("usuarios");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
   public function search_usuario($busca){
        $this->db->like('usuarios_nome', $busca);
        $this->db->or_like('usuarios_cpf', $busca);
        $query = $this->db->get("usuarios");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
}
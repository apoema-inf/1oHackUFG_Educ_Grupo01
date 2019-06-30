<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Foto_perfil_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	
	public function get_foto_perfil_by_id($id)	{
	
		$query = $this->db->get_where('foto_perfil', array('foto_perfil_id' => $id));
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	public function get_foto_perfil_by_desc($desc)	{
		strtoupper($desc);
		$query = $this->db->get_where('foto_perfil', array('foto_perfil_descricao' => $desc));
		if ($query->num_rows() > 0) {

			return $query->row_array();
		}
		return false;
	}
	
	public function get_foto_perfil()
	{
        $query = $this->db->get("foto_perfil");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}

	public function set_foto_perfil($id = null)
	{

		$data = array(
            'foto_perfil_descricao'	=> $this->input->post('foto_perfil_descricao'),
            'foto_perfil_horario_inicial'	=> $this->input->post('foto_perfil_usuario_id')

		);

		# Funciona para update caso seja passado um id e para inserção caso contrário
		if ($id == null) {
			return $this->db->insert('foto_perfil', $data);
		} else {
			$this->db->where('foto_perfil_id', $id);
			return $this->db->update('foto_perfil', $data);
		}

	}

	public function delete_foto_perfil($id)
	{
		return $this->db->delete('foto_perfil', array('foto_perfil_id' => $id)); 
	}
	 
    public function record_count() {
        return $this->db->count_all("foto_perfil");
    }    
 
    public function fetch_foto_perfil($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("foto_perfil");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   public function search_foto_perfil($busca){
		$this->db->like('foto_perfil_descricao', $busca);
		$query = $this->db->get("foto_perfil");

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;	
	}	
}
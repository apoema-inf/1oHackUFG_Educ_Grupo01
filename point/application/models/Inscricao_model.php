<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inscricao_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_inscricao_by_id($id)	{
	
		$query = $this->db->get_where('inscricao', array('inscricao_id' => $id));
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	public function get_inscricao_by_desc($desc)	{
		strtoupper($desc);
		$query = $this->db->get_where('inscricao', array('inscricao_data' => $desc));
		if ($query->num_rows() > 0) {

			return $query->row_array();
		}
		return false;
	}
	
	public function get_inscricao()
	{
        $query = $this->db->get("inscricao");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}

	public function set_inscricao($evento, $usuario, $id = null){	

		$data = array(
			'inscricao_eventos_id'	=> $evento,
			'inscricao_usuarios_id'	=> $usuario,
		);

		# Funciona para update caso seja passado um id e para inserção caso contrário
		if ($id == null) {
			return $this->db->insert('inscricao', $data);
		} else {
			$this->db->where('inscricao_id', $id);
			return $this->db->update('inscricao', $data);
		}

	}

	public function delete_inscricao($id)
	{
		return $this->db->delete('inscricao', array('inscricao_id' => $id)); 
	}
	 
    public function record_count() {
        return $this->db->count_all("inscricao");
    }    
 
}
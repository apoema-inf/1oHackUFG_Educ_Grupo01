<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Areas_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	
	public function get_areas_by_id($id)	{
	
		$query = $this->db->get_where('areas', array('areas_id' => $id));
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	public function check_areas_existe($areas_descricao){
		$this->db->select('areas_descricao');
			$query = $this->db->get_where('areas', array('areas_descricao' => $areas_descricao));
	 
			if ($query->num_rows() > 0) {
				return TRUE;
			}else{
			return FALSE;
		}
	}

	public function get_select_areas(){
        $this->db->select('areas_id, areas_descricao');
        $this->db->order_by('areas_descricao', 'ASC');
        $query = $this->db->get('areas');
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}

	public function get_areas_by_desc($desc)	{
		strtoupper($desc);
		$query = $this->db->get_where('areas', array('areas_descricao' => $desc));
		if ($query->num_rows() > 0) {

			return $query->row_array();
		}
		return false;
	}
	

	public function set_areas($id = null)
	{

		$data = array(
			'areas_descricao'	=> $this->input->post('areas_descricao'),
		);

		# Funciona para update caso seja passado um id e para inserção caso contrário
		if ($id == null) {
			return $this->db->insert('areas', $data);
		} else {
			$this->db->where('areas_id', $id);
			return $this->db->update('areas', $data);
		}

	}

	public function delete_areas($id)
	{
		return $this->db->delete('areas', array('areas_id' => $id)); 
	}
	 
    public function record_count() {
        return $this->db->count_all("areas");
    }    
 
    public function fetch_areas($limit, $start) {
		$this->db->limit($limit, $start);
		
		$query = $this->db->get('areas');
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   public function search_areas($busca){
		$this->db->like('areas_descricao', $busca);
		$query = $this->db->get('areas');

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
		return $data;
		}
	return false;	
	}
}   
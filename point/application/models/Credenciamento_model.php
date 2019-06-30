<?php defined('BASEPATH') OR exit('No direct script access allowed');

class credenciamento_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	
	public function get_credenciamento_by_id($id)	{
	
		$query = $this->db->get_where('credenciamento', array('credenciamento_id' => $id));
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	public function get_credenciamento_by_desc($desc)	{
		strtoupper($desc);
		$query = $this->db->get_where('credenciamento', array('credenciamento_data' => $desc));
		if ($query->num_rows() > 0) {

			return $query->row_array();
		}
		return false;
	}
	
	public function get_credenciamento()
	{
        $query = $this->db->get("credenciamento");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}

	public function set_credenciamento($id = null){	

		$valor = formato_dinheiro_usa($this->input->post('credenciamento_valor'));

		$data = array(
			'credenciamento_eventos_id'	=> $this->input->post('credenciamento_eventos_id'),
			'credenciamento_participante_usuarios_id'	=> $this->input->post('credenciamento_participante_usuarios_id'),
			'credenciamento_credenciador_usuarios_id'	=> $this->input->post('credenciamento_credenciador_usuarios_id')
		);

		# Funciona para update caso seja passado um id e para inserção caso contrário
		if ($id == null) {
			return $this->db->insert('credenciamento', $data);
		} else {
			$this->db->where('credenciamento_id', $id);
			return $this->db->update('credenciamento', $data);
		}

	}

	public function delete_credenciamento($id)
	{
		return $this->db->delete('credenciamento', array('credenciamento_id' => $id)); 
	}
	 
    public function record_count() {
        return $this->db->count_all("credenciamento");
    }    
 
    public function fetch_credenciamento($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("credenciamento");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
//    public function search_credenciamento($busca){
// 		$this->db->like('credenciamento_eventos_id', $busca);
// 		$query = $this->db->get("credenciamento");

// 		if ($query->num_rows() > 0) {
// 			foreach ($query->result() as $row) {
// 				$data[] = $row;
// 			}
// 			return $data;
// 		}
// 		return false;
// 	}	
}
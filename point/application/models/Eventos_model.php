<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	
	public function get_eventos_by_id($id)	{
	
		$query = $this->db->get_where('eventos', array('eventos_id' => $id));
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	public function get_select_eventos(){
        $this->db->select('eventos_id, eventos_descricao');
        $this->db->order_by('eventos_descricao', 'ASC');
        $query = $this->db->get('eventos');
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}

	public function get_eventos_by_desc($desc)	{
		strtoupper($desc);
		$query = $this->db->get_where('eventos', array('eventos_data' => $desc));
		if ($query->num_rows() > 0) {

			return $query->row_array();
		}
		return false;
	}
	
	public function get_eventos()
	{
        $query = $this->db->get("eventos");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}

	public function set_eventos($id = null){	

		$valor = formato_dinheiro_usa($this->input->post('eventos_valor'));

		$data = array(
            'eventos_descricao'	=> $this->input->post('eventos_descricao'),
			'eventos_valor'	=> $valor,
			'eventos_data_inicial'	=> $this->input->post('eventos_data_inicial'),
			'eventos_data_final'	=> $this->input->post('eventos_data_final'),
			'eventos_horario_inicial'	=> $this->input->post('eventos_horario_inicial'),
			'eventos_horario_final'	=> $this->input->post('eventos_horario_final'),
			'eventos_responsavel_usuarios_id'	=> $this->input->post('eventos_responsavel_usuarios_id'),
			'eventos_areas_id'	=> $this->input->post('eventos_areas_id'),
			'eventos_carga_horaria'	=> $this->input->post('eventos_carga_horaria'),
			'eventos_vagas'	=> $this->input->post('eventos_vagas'),
			'eventos_info'	=> $this->input->post('eventos_info')
		);

		# Funciona para update caso seja passado um id e para inserção caso contrário
		if ($id == null) {
			return $this->db->insert('eventos', $data);
		} else {
			$this->db->where('eventos_id', $id);
			return $this->db->update('eventos', $data);
		}

	}

	public function get_usuarios_evento($evento){
        $this->db->select('usuarios_id, usuarios_nome, usuarios_sobrenome');
        $this->db->from('inscricao');
        $this->db->join('usuarios', 'usuarios_id = inscricao_usuarios_id');
        $this->db->join('eventos', 'eventos_id = inscricao_eventos_id');
        $this->db->where('inscricao_eventos_id', $evento);
        $this->db->order_by('usuarios_nome', 'ASC');
        $query = $this->db->get();
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}


	public function delete_eventos($id)
	{
		return $this->db->delete('eventos', array('eventos_id' => $id)); 
	}
	 
    public function record_count() {
        return $this->db->count_all("eventos");
    }    
 
    public function fetch_eventos($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("eventos");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   public function search_eventos($busca){
	$this->db->like('eventos_descricao', $busca);
	$query = $this->db->get("eventos");

	if ($query->num_rows() > 0) {
		foreach ($query->result() as $row) {
			$data[] = $row;
		}
		return $data;
	}
	return false;
}	
}
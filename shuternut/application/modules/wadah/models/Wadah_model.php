<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wadah_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();			
			$this->load->database();
		}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('wadah');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}	

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('wadah');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	public function add($data)
	{
		$this->db->insert('wadah', $data);
	}

	public function update($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('wadah', $data);
	}

	public function delete($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('wadah', $data);
	}

}

/* End of file Wadah_model.php */
/* Location: ./application/modules/wadah/models/Wadah_model.php */
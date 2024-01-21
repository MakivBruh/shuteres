<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pupuk_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();			
			$this->load->database();
		}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('pupuk');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}	

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('pupuk');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	public function add($data)
	{
		$this->db->insert('pupuk', $data);
	}

	public function update($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('pupuk', $data);
	}

	public function delete($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('pupuk', $data);
	}

}

/* End of file Pupuk_model.php */
/* Location: ./application/modules/pupuk/models/Pupuk_model.php */
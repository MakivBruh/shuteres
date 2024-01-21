<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crop_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();			
			$this->load->database();
		}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('crop');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}	

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('crop');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	public function add($data)
	{
		$this->db->insert('crop', $data);
	}

	public function update($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('crop', $data);
	}

	public function delete($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('crop', $data);
	}

}

/* End of file Crop_model.php */
/* Location: ./application/modules/crop/models/Crop_model.php */
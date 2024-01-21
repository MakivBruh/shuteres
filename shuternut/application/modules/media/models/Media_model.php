<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();			
			$this->load->database();
		}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('media');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}	

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('media');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	public function add($data)
	{
		$this->db->insert('media', $data);
	}

	public function update($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('media', $data);
	}

	public function delete($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('media', $data);
	}

}

/* End of file Media_model.php */
/* Location: ./application/modules/media/models/Media_model.php */
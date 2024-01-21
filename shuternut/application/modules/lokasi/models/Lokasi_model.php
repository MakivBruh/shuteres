<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();			
			$this->load->database();
		}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('lokasi');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}	

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('lokasi');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	public function add($data)
	{
		$this->db->insert('lokasi', $data);
	}

	public function update($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('lokasi', $data);
	}

	public function delete($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('lokasi', $data);
	}

}

/* End of file Lokasi_model.php */
/* Location: ./application/modules/lokasi/models/Lokasi_model.php */
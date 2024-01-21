<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
			$this->load->database();
		}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->result();
	}	

	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user', $id_user);
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('user', $data);
	}

	public function update($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('user', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('user', $data);
	}
}
?>
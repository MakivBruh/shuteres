<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nutrisi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$sql = "
			SELECT 
				nutrisi.id,
				crop.id as crop_id, crop.nama_crop,
				nutrisi.komponen,
				pupuk.id as pupuk_id, pupuk.kode, pupuk.nama_pupuk,
				nutrisi.larutan_stock,
				round(nutrisi.larutan_stock / 100000, 2) as larutan_aplikasi

			FROM 
				nutrisi
			INNER JOIN crop ON crop.id = nutrisi.crop_id
			INNER JOIN pupuk ON pupuk.id = nutrisi.pupuk_id

		";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function detail($id)
	{
		$sql = "
			SELECT 
				nutrisi.id,
				crop.id as crop_id, crop.nama_crop,
				nutrisi.komponen,
				pupuk.id as pupuk_id, pupuk.kode, pupuk.nama_pupuk,
				nutrisi.larutan_stock,
				round(nutrisi.larutan_stock / 100000, 2) as larutan_aplikasi

			FROM 
				nutrisi
			INNER JOIN crop ON crop.id = nutrisi.crop_id
			INNER JOIN pupuk ON pupuk.id = nutrisi.pupuk_id
			WHERE nutrisi.id = $id

		";
		$query = $this->db->query($sql);
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('nutrisi', $data);
	}

	public function update($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('nutrisi', $data);
	}

	public function delete($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('nutrisi', $data);
	}
	

}

/* End of file Nutrisi_model.php */
/* Location: ./application/modules/nutrisi/models/Nutrisi_model.php */
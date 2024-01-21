<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karakter_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{		
		$sql = "SELECT 
				karakter_tanah.id AS id,						
				crop.id AS crop_id, nama_crop,
				media.id AS media_id, media.jenis_media,
				wadah.id AS wadah_id, wadah.wadah,
				lokasi.id as lokasi_id, lokasi.nama_lokasi,
				ROUND(media.kering_angin * wadah.bbt_tnh_krg_mutlak_t / 100,2) AS ka_krg_angin_t,
				ROUND(media.kering_angin * wadah.bbt_tnh_krg_mutlak_l / 100,2) AS ka_krg_angin_l,
				ROUND(media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100,2) AS ka_kps_lpg_l
				FROM
				karakter_tanah
				INNER JOIN crop ON crop.id = karakter_tanah.crop_id
				INNER JOIN media ON media.id = karakter_tanah.media_id
				INNER JOIN wadah ON wadah.id = karakter_tanah.wadah_id
				INNER JOIN lokasi on lokasi.id = karakter_tanah.lokasi_id
				";

		$query = $this->db->query($sql);
		return $query->result();
	}	

	public function detail($id)
	{		
		$sql = "SELECT 
				karakter_tanah.id AS id,						
				crop.id AS crop_id, nama_crop,
				media.id AS media_id, media.jenis_media,
				wadah.id AS wadah_id, wadah.wadah,
				lokasi.id as lokasi_id, lokasi.nama_lokasi,
				ROUND(media.kering_angin * wadah.bbt_tnh_krg_mutlak_t / 100,2) AS ka_krg_angin_t,
				ROUND(media.kering_angin * wadah.bbt_tnh_krg_mutlak_l / 100,2) AS ka_krg_angin_l,
				ROUND(media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100,2) AS ka_kps_lpg_l
				FROM
				karakter_tanah
				INNER JOIN crop ON crop.id = karakter_tanah.crop_id
				INNER JOIN media ON media.id = karakter_tanah.media_id
				INNER JOIN wadah ON wadah.id = karakter_tanah.wadah_id
				INNER JOIN lokasi on lokasi.id = karakter_tanah.lokasi_id
				WHERE karakter_tanah.id = $id ";
		$query = $this->db->query($sql);	
		return $query->row();
	}
	
	public function add($data)
	{
		$this->db->insert('karakter_tanah', $data);
	}

	public function update($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('karakter_tanah', $data);
	}

	public function delete($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('karakter_tanah', $data);
	}
	

}

/* End of file Karakter_model.php */
/* Location: ./application/modules/karakter/models/Karakter_model.php */
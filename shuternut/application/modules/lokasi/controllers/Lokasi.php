<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('lokasi_model');

	}

	// List all your items
	public function index( $offset = 0 )
	{
		$lokasi = $this->lokasi_model->listing();
		$valid = $this->form_validation;
		$valid->set_rules('id', 'ID Lokasi', 'required',
							array('required' => 'ID Lokasi Harus Diisi'));
		$valid->set_rules('nama_lokasi', 'Nama Lokasi', 'required',
							array('required' => 'Nama Lokasi Harus Diisi'));
		if($valid->run() === false) {
			$data = array(	'title'			=> 'Master Data Lokasi',
							'title2'		=> 'Data Lokasi ('.count($lokasi). ')',
							'lokasi'		=> $lokasi,
							'isi'			=> 'lokasi/list');
			$this->load->view('layout/wrapper', $data, FALSE);
		} else {
			$data = array(	'id'			=> $this->input->post('id'),
							'nama_lokasi'	=> $this->input->post('nama_lokasi'),
							'ket_lokasi'	=> $this->input->post('ket_lokasi'),
							'et_suhu'		=> $this->input->post('et_suhu'),
							'et_lembab'		=> $this->input->post('et_lembab')
						);
			$this->lokasi_model->add($data);
			$this->session->set_flashdata('sukses', 'Data Lokasi telah ditambahkan');
			redirect(base_url('lokasi'),'refresh');
		}			
	}
	
	//Update one item
	public function update( $id)
	{

		$lokasi = $this->lokasi_model->detail($id);
		$valid = $this->form_validation;
		$valid->set_rules('id', 'ID Lokasi', 'required',
							array('required' => 'ID Lokasi Harus Diisi'));
		$valid->set_rules('nama_lokasi', 'Nama Lokasi', 'required',
							array('required' => 'Nama Lokasi Harus Diisi'));
		if($valid->run() === false) {
			$data = array(	'title'			=> 'Master Data Lokasi',
							'title2'		=> 'Data Lokasi',
							'lokasi'		=> $lokasi,
							'isi'			=> 'lokasi/update');
			$this->load->view('layout/wrapper', $data, FALSE);
		} else {
			$data = array(	'id'			=> $id,
							'nama_lokasi'	=> $this->input->post('nama_lokasi'),
							'ket_lokasi'	=> $this->input->post('ket_lokasi'),
							'et_suhu'		=> $this->input->post('et_suhu'),
							'et_lembab'		=> $this->input->post('et_lembab')
						);
			$this->lokasi_model->update($data);
			$this->session->set_flashdata('sukses', 'Data Lokasi telah diupdate');
			redirect(base_url('lokasi'),'refresh');
		}		
	}

	//Delete one item
	public function delete( $id = NULL )
	{
		$data = array(		'id'	=> $id);
		$this->lokasi_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('lokasi'),'refresh');
	}
}

/* End of file Lokasi.php */
/* Location: ./application/modules/lokasi/controllers/Lokasi.php */

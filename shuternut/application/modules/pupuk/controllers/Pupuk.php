<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pupuk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pupuk_model');

	}

	// List all your items
	public function index( $offset = 0 )
	{
		$pupuk = $this->pupuk_model->listing();	
		$this->_rules();
		if ($this->form_validation->run() === FALSE) {
				$data = array(	'title'			=> 'Master Data Pupuk',
								'title2'		=> 'Data Pupuk ('.count($pupuk). ')',
								'pupuk'			=> $pupuk,
								'isi'			=> 'pupuk/list');
				$this->load->view('layout/wrapper', $data, FALSE);	
		} else {
			$data = array(	'kode'			=> $this->input->post('kode'),
							'nama_pupuk'	=> $this->input->post('nama_pupuk'),
							'kemasan'		=> $this->input->post('kemasan'),
							'harga_pupuk'	=> $this->input->post('harga_pupuk')
					);
			$this->pupuk_model->add($data);
			$this->session->set_flashdata('sukses', 'Data Pupuk Telah Ditambahkan');
			redirect(base_url('pupuk'),'refresh');
		}	
				
	}
	
	//Update one item
	public function update( $id = NULL )
	{
		$pupuk = $this->pupuk_model->detail($id);	
		$this->_rules();
		if ($this->form_validation->run() === FALSE) {
				$data = array(	'title'			=> 'Master Data Pupuk',
								'title2'		=> 'Data Pupuk',
								'pupuk'			=> $pupuk,
								'isi'			=> 'pupuk/update');
				$this->load->view('layout/wrapper', $data, FALSE);	
		} else {
			$data = array(	'id'			=> $id,
							'kode'			=> $this->input->post('kode'),
							'nama_pupuk'	=> $this->input->post('nama_pupuk'),
							'kemasan'		=> $this->input->post('kemasan'),
							'harga_pupuk'	=> $this->input->post('harga_pupuk')
					);
			$this->pupuk_model->update($data);
			$this->session->set_flashdata('sukses', 'Data Pupuk Telah Diupdate');
			redirect(base_url('pupuk'),'refresh');
		}	
	}

	//Delete one item
	public function delete( $id = NULL )
	{
		$data = array(		'id'	=> $id);
		$this->pupuk_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('pupuk'),'refresh');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode', 'Kode Pupuk', 'required',array('required'=>'Kode Pupuk Harus Diisi'));
		$this->form_validation->set_rules('nama_pupuk', 'Nama Pupuk', 'required',array('required'=>'Nama Pupuk Harus Diisi'));
	}
}

/* End of file Pupuk.php */
/* Location: ./application/modules/pupuk/controllers/Pupuk.php */

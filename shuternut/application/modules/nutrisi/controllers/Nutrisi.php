<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nutrisi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('nutrisi_model');
		$this->load->model('crop/crop_model');
		$this->load->model('pupuk/pupuk_model');

	}

	// List all your items
	public function index( $offset = 0 )
	{
		$crop = $this->crop_model->listing();
		$pupuk = $this->pupuk_model->listing();
		$nutrisi = $this->nutrisi_model->listing();
		$this->_rules();
		if ($this->form_validation->run() === FALSE) {
			$data = array(	'title'		=> 'Data Nutrisi',
						'title2'	=> 'Data Nutrisi Tanah ('.count($nutrisi). ')',
						'nutrisi'	=> $nutrisi,
						'crop'		=> $crop,
						'pupuk'		=> $pupuk,
						'isi'		=> 'nutrisi/list'
				);
		$this->load->view('layout/wrapper', $data, FALSE);
		} else {
			$data = array(	'crop_id' 		=> $this->input->post('crop_id'),
							'pupuk_id' 		=> $this->input->post('pupuk_id'),
							'larutan_stock' => $this->input->post('larutan_stock'),
							'komponen' 		=> $this->input->post('komponen')
			);
			$this->nutrisi_model->add($data);
			$this->session->set_flashdata('sukses', 'Data Nutrisi Telah Ditambahkan');
			redirect(base_url('nutrisi'),'refresh');
		}
		
	}
	
	//Update one item
	public function update( $id = NULL )
	{
		$crop = $this->crop_model->listing();
		$pupuk = $this->pupuk_model->listing();
		$nutrisi = $this->nutrisi_model->detail($id);
		$this->_rules();
		if ($this->form_validation->run() === FALSE) {
			$data = array(	'title'		=> 'Data Nutrisi',
						'title2'	=> 'Data Nutrisi Tanah',
						'nutrisi'	=> $nutrisi,
						'crop'		=> $crop,
						'pupuk'		=> $pupuk,
						'isi'		=> 'nutrisi/update'
				);
		$this->load->view('layout/wrapper', $data, FALSE);
		} else {
			$data = array(	'id'			=> $id,
							'crop_id' 		=> $this->input->post('crop_id'),
							'pupuk_id' 		=> $this->input->post('pupuk_id'),
							'larutan_stock' => $this->input->post('larutan_stock'),
							'komponen' 		=> $this->input->post('komponen')
			);
			$this->nutrisi_model->update($data);
			$this->session->set_flashdata('sukses', 'Data Nutrisi Telah Diupdate');
			redirect(base_url('nutrisi'),'refresh');
		}
	}

	//Delete one item
	public function delete( $id = NULL )
	{
		$data = array(		'id'	=> $id);
		$this->nutrisi_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('nutrisi'),'refresh');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('larutan_stock', 'Larutan Stock', 'required', array('required' => 'Larutan Stock Harus Diisi'));
	}
}

/* End of file Nutrisi.php */
/* Location: ./application/modules/nutrisi/controllers/Nutrisi.php */

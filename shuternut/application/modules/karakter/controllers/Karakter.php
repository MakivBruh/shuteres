<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karakter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('karakter/karakter_model');
		$this->load->model('crop/crop_model');
		$this->load->model('lokasi/lokasi_model');
		$this->load->model('media/media_model');
		$this->load->model('wadah/wadah_model');

	}

	// List all your items
	public function index( $offset = 0 )
	{
		$crop = $this->crop_model->listing();
		$lokasi = $this->lokasi_model->listing();
		$media = $this->media_model->listing();
		$wadah = $this->wadah_model->listing();		
		$karakter = $this->karakter_model->listing();
		$this->_rules();
		if ($this->form_validation->run() === FALSE) {
			$data = array(	'title'			=> 'Data Karakter Tanah',
							'title2'		=> 'Data Karakter Tanah ('.count($karakter). ')',
							'karakter'		=> $karakter,
							'crop'			=> $crop,
							'lokasi'		=> $lokasi,
							'media'			=> $media,
							'wadah'			=> $wadah,
							'isi'			=> 'karakter/list');
			$this->load->view('layout/wrapper', $data, FALSE);
		} else {
			$data = array(	'crop_id'		=> $this->input->post('crop_id'),
							'media_id'		=> $this->input->post('media_id'),
							'wadah_id'		=> $this->input->post('wadah_id'),
							'lokasi_id'		=> $this->input->post('lokasi_id')
					);
			$this->karakter_model->add($data);
			$this->session->set_flashdata('sukses', 'Data Karakter Tanah Telah Ditambahkan');
			redirect(base_url('karakter'),'refresh');
		}		
	
	}

	public function read()
	{
		$karakter = $this->karakter_model->listing();		
		$data = array(	'title'			=> 'Data Karakter Tanah',
						'title2'		=> 'Data Karakter Tanah ('.count($karakter). ')',
						'karakter'		=> $karakter,
						'isi'			=> 'karakter/read');
		$this->load->view('layout/wrapper', $data, FALSE);	
	}
	
	//Update one item
	public function update( $id = NULL )
	{
		$crop = $this->crop_model->listing();
		$lokasi = $this->lokasi_model->listing();
		$media = $this->media_model->listing();
		$wadah = $this->wadah_model->listing();		
		$karakter = $this->karakter_model->detail($id);
		$this->_rules();
		if ($this->form_validation->run() === FALSE) {
			$data = array(	'title'			=> 'Data Karakter Tanah',
							'title2'		=> 'Data Karakter Tanah',
							'karakter'		=> $karakter,
							'crop'			=> $crop,
							'lokasi'		=> $lokasi,
							'media'			=> $media,
							'wadah'			=> $wadah,
							'isi'			=> 'karakter/update');
			$this->load->view('layout/wrapper', $data, FALSE);
		} else {
			$data = array(	'id'			=> $id,
							'crop_id'		=> $this->input->post('crop_id'),
							'media_id'		=> $this->input->post('media_id'),
							'wadah_id'		=> $this->input->post('wadah_id'),
							'lokasi_id'		=> $this->input->post('lokasi_id')
					);
			$this->karakter_model->update($data);
			$this->session->set_flashdata('sukses', 'Data Karakter Tanah Telah DiUpdate');
			redirect(base_url('karakter'),'refresh');
		}
	}

	//Delete one item
	public function delete( $id = NULL )
	{
		$data = array(		'id'	=> $id);
		$this->karakter_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('karakter'),'refresh');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('crop_id', 'Crop ID', 'required', array('required'=>'Crop ID Harus Dipilih'));
		$this->form_validation->set_rules('media_id', 'Crop ID', 'required', array('required'=>'Media ID Harus Dipilih'));
		$this->form_validation->set_rules('wadah_id', 'Crop ID', 'required', array('required'=>'Wadah ID Harus Dipilih'));
		$this->form_validation->set_rules('lokasi_id', 'Crop ID', 'required', array('required'=>'Lokasi ID Harus Dipilih'));
	}
}

/* End of file Karakter.php */
/* Location: ./application/modules/karakter/controllers/Karakter.php */

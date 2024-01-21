<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crop extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('crop_model');

	}

	// List all your items
	public function index( $offset = 0 )
	{
		
		$crop = $this->crop_model->listing();
		$valid = $this->form_validation;
		$valid->set_rules('nama_crop', 'Nama Crop', 'required',
						array('required'	=> 'Nama Crop Harus Diisi'));
		$valid->set_rules('kc_awal', 'KC Awal', 'required',
						array('required'	=> 'KC Awal Harus Diisi'));
		$valid->set_rules('kc_tengah', 'KC Menengah', 'required',
						array('required'	=> 'KC Menengah Harus Diisi'));
		$valid->set_rules('kc_akhir', 'KC Akhir', 'required',
						array('required'	=> 'KC Akhir Harus Diisi'));
		$valid->set_rules('hr_awal', 'Periode Hari Awal', 'required',
						array('required'	=> 'Periode Hari Awal Harus Diisi'));
		$valid->set_rules('hr_tengah', 'Periode Hari Menengah', 'required',
						array('required'	=> 'Periode Hari Menengah Harus Diisi'));
		$valid->set_rules('hr_akhir', 'Periode Hari Akhir', 'required',
						array('required'	=> 'Periode Hari Akhir Harus Diisi'));
		$valid->set_rules('j_awal', 'Jumlah Hari Periode Awal', 'required',
						array('required'	=> 'Jumlah Hari Periode Awal Harus Diisi'));
		$valid->set_rules('j_tengah', 'Jumlah Hari Periode Menengah', 'required',
						array('required'	=> 'Jumlah Hari Periode Menengah Harus Diisi'));
		$valid->set_rules('j_akhir', 'Jumlah Hari Periode Akhir', 'required',
						array('required'	=> 'Jumlah Hari Periode Akhir Akhir Harus Diisi'));
		$valid->set_rules('p', 'P Tabel', 'required',
						array('required'	=> 'P Tabel Harus Diisi'));
		if($valid->run() === false){
			$data['title'] 		= 'Master Data Crop';
			$data['title2']		= 'Data Crop ('.count($crop). ')';
			$data['crop'] 		= $crop;
			$data['isi'] 		= 'crop/list';
			$this->load->view('layout/wrapper', $data, FALSE);	
		} else {
			$i=$this->input;
			$data = array(	'id'			=> $i->post('id'), 
							'nama_crop'		=> $i->post('nama_crop'),
							'kc_awal'		=> $i->post('kc_awal'),
							'kc_tengah'		=> $i->post('kc_tengah'),
							'kc_akhir'		=> $i->post('kc_tengah'),
							'hr_awal'		=> $i->post('hr_awal'),
							'hr_tengah'		=> $i->post('hr_tengah'),
							'hr_akhir'		=> $i->post('hr_akhir'),
							'j_awal'		=> $i->post('j_awal'),
							'j_tengah'		=> $i->post('j_tengah'),
							'j_akhir'		=> $i->post('j_akhir'),
							'p'				=> $i->post('p')
			);
			$this->crop_model->add($data);
			$this->session->set_flashdata('sukses','Data Crop Telah Ditambahkan');
			redirect(base_url('crop'),'refresh');
		}
		
	}
	
	//Update one item
	public function update( $id )
	{
		$crop = $this->crop_model->detail($id);
		$valid = $this->form_validation;
		$valid->set_rules('nama_crop', 'Nama Crop', 'required',
						array('required'	=> 'Nama Crop Harus Diisi'));
		$valid->set_rules('kc_awal', 'KC Awal', 'required',
						array('required'	=> 'KC Awal Harus Diisi'));
		$valid->set_rules('kc_tengah', 'KC Menengah', 'required',
						array('required'	=> 'KC Menengah Harus Diisi'));
		$valid->set_rules('kc_akhir', 'KC Akhir', 'required',
						array('required'	=> 'KC Akhir Harus Diisi'));
		$valid->set_rules('hr_awal', 'Periode Hari Awal', 'required',
						array('required'	=> 'Periode Hari Awal Harus Diisi'));
		$valid->set_rules('hr_tengah', 'Periode Hari Menengah', 'required',
						array('required'	=> 'Periode Hari Menengah Harus Diisi'));
		$valid->set_rules('hr_akhir', 'Periode Hari Akhir', 'required',
						array('required'	=> 'Periode Hari Akhir Harus Diisi'));
		$valid->set_rules('j_awal', 'Jumlah Hari Periode Awal', 'required',
						array('required'	=> 'Jumlah Hari Periode Awal Harus Diisi'));
		$valid->set_rules('j_tengah', 'Jumlah Hari Periode Menengah', 'required',
						array('required'	=> 'Jumlah Hari Periode Menengah Harus Diisi'));
		$valid->set_rules('j_akhir', 'Jumlah Hari Periode Akhir', 'required',
						array('required'	=> 'Jumlah Hari Periode Akhir Akhir Harus Diisi'));
		$valid->set_rules('p', 'P Tabel', 'required',
						array('required'	=> 'P Tabel Harus Diisi'));
		if($valid->run() === false){

			$data = array(	'title'		=> 'Master Data Crop',
							'title2'	=> 'Update Data Crop',
							'crop'		=> $crop,
							'isi'		=> 'crop/update'
						);			
			$this->load->view('layout/wrapper', $data, FALSE);	
			
		} else {
			$i=$this->input;
			$data = array(	'id'			=> $id, 
							'nama_crop'		=> $i->post('nama_crop'),
							'kc_awal'		=> $i->post('kc_awal'),
							'kc_tengah'		=> $i->post('kc_tengah'),
							'kc_akhir'		=> $i->post('kc_tengah'),
							'hr_awal'		=> $i->post('hr_awal'),
							'hr_tengah'		=> $i->post('hr_tengah'),
							'hr_akhir'		=> $i->post('hr_akhir'),
							'j_awal'		=> $i->post('j_awal'),
							'j_tengah'		=> $i->post('j_tengah'),
							'j_akhir'		=> $i->post('j_akhir'),
							'p'				=> $i->post('p')
			);
			$this->crop_model->update($data);			
			$this->session->set_flashdata('sukses','Data Crop Telah Diupdate');
			redirect(base_url('crop'),'refresh');
		}
	}

	//Delete one item
	public function delete( $id )
	{
		$data = array(		'id'	=> $id);
		$this->crop_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('crop'),'refresh');
	}

	public function _rules()
	{
		
		$this->form_validation->set_value('id','ID Crop','required');
		$this->form_validation->set_value('nama_crop', 'Nama Crop', 'required');		
		$this->form_validation->set_value('kc_awal', 'KC Awal', 'required');
		$this->form_validation->set_value('kc_tengah', 'KC Menengah', 'required');
		$this->form_validation->set_value('kc_akhir', 'KC Akhir', 'required');
		$this->form_validation->set_value('hr_awal', 'HR Awal', 'required');
		$this->form_validation->set_value('hr_tengah', 'HR Menengah', 'required');
		$this->form_validation->set_value('hr_akhir', 'HR Akhir', 'required');
		$this->form_validation->set_value('P', 'P Tabel', 'required');
		$this->form_validation->set_value('j_awal', 'Jumlah Hari Awal', 'required');
		$this->form_validation->set_value('j_tengah', 'Jumlah Hari  Menengah', 'required');
		$this->form_validation->set_value('j_akhir', 'Jumlah Hari  Akhir', 'required');
	}
}

/* End of file Crop.php */
/* Location: ./application/modules/crop/controllers/Crop.php */

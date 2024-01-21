<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wadah extends CI_Controller {

	public function __construct( $offset = 0 )
	{
		parent::__construct();
		$this->load->model('wadah_model');

	}

	// List all your items
	public function index()
	{
		$wadah = $this->wadah_model->listing();	
		$this->_rules();
		if ($this->form_validation->run() === FALSE) {
			$data = array(	'title'			=> 'Master Data Wadah',
							'title2'		=> 'Data Wadah ('.count($wadah). ')',
							'wadah'			=> $wadah,
							'isi'			=> 'wadah/list');
			$this->load->view('layout/wrapper', $data, FALSE);						
		} else {
			$data = array(	'wadah'					=> $this->input->post('wadah'),
							'jml_lubang'			=> $this->input->post('jml_lubang'),
							'luas_permukaan'		=> $this->input->post('luas_permukaan'),
							'bbt_tnh_krg_angin_l'	=> $this->input->post('bbt_tnh_krg_angin_l'),
							'bbt_tnh_krg_mutlak_l'	=> $this->input->post('bbt_tnh_krg_mutlak_l'),
							'bbt_tnh_krg_angin_t'	=> $this->input->post('bbt_tnh_krg_angin_t'),
							'bbt_tnh_krg_mutlak_t'	=> $this->input->post('bbt_tnh_krg_mutlak_t'),
							'ka_kps_lpg_t'			=> $this->input->post('ka_kps_lpg_t')
						);
			$this->wadah_model->add($data);
			$this->session->set_flashdata('sukses', 'Data Wadah telah ditambahkan');			
			redirect(base_url('wadah'),'refresh');
		}
					
	}
	
	//Update one item
	public function update( $id )
	{
		$wadah = $this->wadah_model->detail($id);	
		$this->_rules();
		if ($this->form_validation->run() === FALSE) {
			$data = array(	'title'			=> 'Master Data Wadah',
							'title2'		=> 'Data Wadah',
							'wadah'			=> $wadah,
							'isi'			=> 'wadah/update');
			$this->load->view('layout/wrapper', $data, FALSE);						
		} else {
			$data = array(	'id'					=> $id,
							'wadah'					=> $this->input->post('wadah'),
							'jml_lubang'			=> $this->input->post('jml_lubang'),
							'luas_permukaan'		=> $this->input->post('luas_permukaan'),
							'bbt_tnh_krg_angin_l'	=> $this->input->post('bbt_tnh_krg_angin_l'),
							'bbt_tnh_krg_mutlak_l'	=> $this->input->post('bbt_tnh_krg_mutlak_l'),
							'bbt_tnh_krg_angin_t'	=> $this->input->post('bbt_tnh_krg_angin_t'),
							'bbt_tnh_krg_mutlak_t'	=> $this->input->post('bbt_tnh_krg_mutlak_t'),
							'ka_kps_lpg_t'			=> $this->input->post('ka_kps_lpg_t')
						);
			$this->wadah_model->update($data);
			$this->session->set_flashdata('sukses', 'Data Wadah telah diupdate');			
			redirect(base_url('wadah'),'refresh');
		}
	}

	//Delete one item
	public function delete( $id = NULL )
	{
		$data = array(		'id'	=> $id);
		$this->wadah_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('wadah'),'refresh');
	}

	public function _rules()
	{		
		$this->form_validation->set_rules('wadah', 'Jenis Wadah', 'required', array('required'=>'Jenis Wadah Harus Diisi'));
		$this->form_validation->set_rules('jml_lubang', 'Jumlah Lubang', 'required', array('required'=>'Jumlah Lubang Harus Diisi'));
		$this->form_validation->set_rules('luas_permukaan', 'Luas Permukaan', 'required', array('required'=>'Luas Permukaan Harus Diisi'));
		$this->form_validation->set_rules('bbt_tnh_krg_angin_l', 'Bobot Tanah Kering Angin PerLubang', 'required', array('required'=>'Bobot Tanah Kering Angin PerLubang Harus Diisi'));
		$this->form_validation->set_rules('bbt_tnh_krg_mutlak_l', 'Bobot Tanah Kering Mutlak PerLubang', 'required', array('required'=>'Bobot Tanah Kering Mutlak PerLubang Harus Diisi'));
	}
}

/* End of file Wadah.php */
/* Location: ./application/modules/wadah/controllers/Wadah.php */

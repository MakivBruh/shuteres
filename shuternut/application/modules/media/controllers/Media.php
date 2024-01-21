<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('media_model');

	}

	// List all your items
	public function index( $offset = 0 )
	{
		$media = $this->media_model->listing();	
		$this->_rules();
		if ($this->form_validation->run() === FALSE) {
				$data = array(	'title'			=> 'Master Data Media',
								'title2'		=> 'Data Media ('.count($media). ')',
								'media'			=> $media,
								'isi'			=> 'media/list');
				$this->load->view('layout/wrapper', $data, FALSE);
			} else {
				$data = array(	'id'					=> $this->input->post('id'),
								'jenis_media'			=> $this->input->post('jenis_media'),
								'kering_angin'			=> $this->input->post('kering_angin'),
								'kapasitas_lapang'		=> $this->input->post('kapasitas_lapang'),
								'titik_layu_permanen'	=> $this->input->post('titik_layu_permanen'),
								'air_tanah_tersedia'	=> $this->input->post('air_tanah_tersedia'),
								'berat_jenis'			=> $this->input->post('berat_jenis'),
								'porositas'				=> $this->input->post('porositas')
							);
				$this->media_model->add($data);
				$this->session->set_flashdata('sukses', 'Data Media Telah Ditambahkan');
				redirect(base_url('media'),'refresh');
			}	
					
	}

	//Update one item
	public function update( $id )
	{
		$media = $this->media_model->detail($id);	
		$this->_rules();
		if ($this->form_validation->run() === FALSE) {
				$data = array(	'title'			=> 'Master Data Media',
								'title2'		=> 'Data Media',
								'media'			=> $media,
								'isi'			=> 'media/update');
				$this->load->view('layout/wrapper', $data, FALSE);
			} else {
				$data = array(	'id'					=> $this->input->post('id'),
								'jenis_media'			=> $this->input->post('jenis_media'),
								'kering_angin'			=> $this->input->post('kering_angin'),
								'kapasitas_lapang'		=> $this->input->post('kapasitas_lapang'),
								'titik_layu_permanen'	=> $this->input->post('titik_layu_permanen'),
								'air_tanah_tersedia'	=> $this->input->post('air_tanah_tersedia'),
								'berat_jenis'			=> $this->input->post('berat_jenis'),
								'porositas'				=> $this->input->post('porositas')
							);
				$this->media_model->update($data);
				$this->session->set_flashdata('sukses', 'Data Media Telah Diupdate');
				redirect(base_url('media'),'refresh');
			}
	}

	//Delete one item
	public function delete( $id )
	{
		$data = array(		'id'	=> $id);
		$this->media_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('media'),'refresh');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('id', 'ID Media', 'required', array('id'=>'ID Media Harus Diisi'));
		$this->form_validation->set_rules('jenis_media', 'Jenis Media', 'required', array('required'=>'Jenis Media Harus Diisi'));
		$this->form_validation->set_rules('kering_angin', 'Kering Angin', 'required', array('required'=>'Kering Angin Harus Diisi'));
		$this->form_validation->set_rules('kapasitas_lapang', 'Kapasitas Lapang', 'required', array('required'=>'Kapasitas Lapang Harus Diisi'));
		$this->form_validation->set_rules('titik_layu_permanen', 'Titik Layu Permanen', 'required', array('required'=>'Titik Layu Permanen Harus Diisi'));
		$this->form_validation->set_rules('air_tanah_tersedia', 'Air Tanah Tersedia', 'required', array('required'=>'Air Tanah Tersedia Harus Diisi'));
		$this->form_validation->set_rules('berat_jenis', 'Berat Jenis Media', 'required', array('required'=>'Berat Jenis Media Harus Diisi'));
		$this->form_validation->set_rules('porositas', 'Porositas Media', 'required', array('required'=>'Porositas Media Harus Diisi'));
	}
}

/* End of file Media.php */
/* Location: ./application/modules/media/controllers/Media.php */

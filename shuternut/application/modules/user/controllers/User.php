<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');

	}

	// List all your items
	public function index( $offset = 0 )
	{
		$user = $this->user_model->listing();
		$valid = $this->form_validation;
		$valid->set_rules('nama', 'Nama', 'required',
			array(	'required'	=> 'Nama Harus diisi'));		
		$valid->set_rules('username', 'Username', 'required|is_unique[user.username]',
			array(	'required'		=> 'Username Harus diisi',
					'is_unique'		=> 'Username <strong>'.$this->input->post('username').'</strong> sudah ada. Buat Username Baru'));
		$valid->set_rules('password', 'Password', 'required|min_length[6]',
			array(	'required'		=> 'Password Harus diisi',
					'min_length'	=> 'Password harus berisi minimal 6 karakter'));
		if($valid->run()===false){
				$data = array(	'title'			=> 'Master Data User',
								'title2'		=> 'Data User ('.count($user). ')',
								'user'			=> $user,
								'isi'			=> 'user/list');
				$this->load->view('layout/wrapper', $data, FALSE);	
		} else {
			$data = array(	'nama'			=> $this->input->post('nama'),
							'username'		=> $this->input->post('username'),
							'password'		=> sha1($this->input->post('password')),
							'akses_level'	=> 'Admin'
					);
			$this->user_model->add($data);
			$this->session->set_flashdata('sukses', 'Data User Telah Ditambahkan');
			redirect(base_url('user'),'refresh');
		}	
				
	}
	
	//Update one item
	public function update( $id_user = NULL )
	{
		$user = $this->user_model->detail($id_user);	
		$valid = $this->form_validation;
		$valid->set_rules('nama', 'Nama', 'required',
			array(	'required'	=> 'Nama Harus diisi'));				
		if($valid->run()===false){
				$data = array(	'title'			=> 'Master Data User',
								'title2'		=> 'Data User',
								'user'			=> $user,
								'isi'			=> 'user/update');
				$this->load->view('layout/wrapper', $data, FALSE);	
		} else {
			$i=$this->input;
			//Jika input password lebih dari 6 karakter
			if(strlen($i->post('password')) > 6) {
				$data = array(	'id_user'		=> $id_user,
								'nama'			=> $this->input->post('nama'),
								'username'		=> $this->input->post('username'),
								'password'		=> sha1($this->input->post('password')),
								'akses_level'	=> 'Admin'
								);
			} else {
				$data = array(	'id_user'		=> $id_user,
								'nama'			=> $this->input->post('nama'),
								'username'		=> $this->input->post('username'),								
								'akses_level'	=> 'Admin'
								);
			}
			//end if			
			$this->user_model->update($data);
			$this->session->set_flashdata('sukses', 'Data User Telah Diupdate');
			redirect(base_url('user'),'refresh');
		}	
	}

	//Delete one item
	public function delete( $id_user = NULL )
	{
		$data = array(		'id_user'	=> $id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('user'),'refresh');
	}

	
}

/* End of file User.php */
/* Location: ./application/modules/user/controllers/User.php */

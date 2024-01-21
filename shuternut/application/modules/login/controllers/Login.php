<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		//Validation
		$this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'Username harus diisi'));
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]', 
			array(	'required' 		=> 'Password harus diisi',
					'min_length'	=> 'Password harus berisi minimal 6 karakter'));
		if ($this->form_validation->run() === FALSE) {
			$data = array(	'title' 	=> 'Halaman Login');
			$this->load->view('login_v', $data, FALSE);
		} else {
			$username 		= $this->input->post('username');
			$password 		= $this->input->post('password');
			//Check di database
			$check_login	= $this->login_model->login($username, $password);
			//Jika ada record, maka create session dan direct ke halaman dashboard
			if(!empty($check_login)){
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('akses_level', $check_login->akses_level);
				$this->session->set_userdata('id_user', $check_login->id_user);
				$this->session->set_userdata('nama', $check_login->nama);
				redirect(base_url(''),'refresh');
			} else {
				//Jika username / password tidak cocok, error
				$this->session->set_flashdata('sukses', 'Username & Password tidak Cocok');
				redirect(base_url('login'),'refresh');
			}
		}		
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('akses_level');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('nama');
		$this->session->set_flashdata('sukses', 'Anda berhasil Logout');
		redirect(base_url(''),'refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/modules/login/controllers/Login.php */
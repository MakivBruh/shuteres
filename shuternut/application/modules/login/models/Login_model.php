<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->database();
    }
    
    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(array(	'username' 	=> $username,
                                'password'	=> sha1($password)));
        $this->db->order_by('id_user', 'desc');
        $query = $this->db->get();
        return $query->row();
    }
}

?>
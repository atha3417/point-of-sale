<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
		check_not_login();
		check_admin();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->user_m->get()->result_array();
		unset($data['row'][0]);
		$this->template->load('template', 'user/user_data', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('fullname', 'Full Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
			'is_unique' => "Username Already Used!"
		]);
		$this->form_validation->set_rules('city', 'City', 'required|trim');
		$this->form_validation->set_rules('level', 'Level', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'user/user_form_add');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user_m->add($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">New User Added!</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Failed to Add User!</div>');
			}
	    	redirect('user');
		}
	}

	function username_check() {
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('username_check', ' This Username Already Used!');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function deleteUser($user_id)
    {
    	$user = $this->user_m->get($user_id)->row();
        $this->load->model('User_m');
        if ($user->image != 'user-image.jpg') {
        	$target_profile = './assets/img/profile'.$user->image;
			unlink(FCPATH . $target_profile);
        }
        if ($user_id == 1) {
			$this->session->set_flashdata('message', '<div class="alert alert-warning text-center" role="alert">Admin Cannot be Deleted!</div>');
		} else {
	        $this->User_m->deleteDataUser($user_id);
		}
        if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">User Deleted!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-warning text-center" role="alert">Failed to Delete User!</div>');
		}
        redirect('user');
    }
}

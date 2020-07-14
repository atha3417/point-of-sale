<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		check_already_login();
		$this->load->view('login');
	}

	public function proccess()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])) {
			$this->load->model('user_m');
			$query = $this->user_m->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'userid' => $row->user_id,
					'level' => $row->level
				);
				$this->session->set_userdata($params);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Username or Password!</div>');
				redirect('auth/login');
			}
		}
	}

	public function logout()
	{
		$params = array('userid', 'level', 'code');
		$this->session->unset_userdata($params);
		$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">You Have Been Logout!</div>');
		redirect('auth/login');
	}
}

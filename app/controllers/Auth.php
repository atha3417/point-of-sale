<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		check_already_login();
		$this->load->view('auth/login');
	}

	public function register()
	{
		check_already_login();

		$this->load->model('user_m');
		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
			'is_unique' => "Username Already Used!"
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[passconf]|min_length[7]', [
			'matches' => "Password Don't Match!",
			'min_length' => "Password too Short!"
		]);
		$this->form_validation->set_rules('passconf', 'Password', 'required|trim|matches[password]', [
			'matches' => "Password Don't Match!"
		]);
		$this->form_validation->set_rules('city', 'City', 'trim');
		if ($this->form_validation->run() === false) {
			$this->load->view('auth/register');
		} else {
			$this->user_m->register($this->input->post());
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">New user Has been registered!</div>');
			redirect('auth/login');
		}
	}

	public function proccess()
	{
		$this->load->model('user_m');
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])) {
			$user = $this->db->get_where('user', ['username' => $post['username']])->row();
			if ($this->user_m->login($post['username'])->num_rows() > 0) {
				if ($user->is_active > 0) {
					if ($user->password === sha1($post['password'])) {
						$params = array(
							'userid' => $user->user_id,
							'level' => $user->level
						);
						$this->session->set_userdata($params);
						redirect('dashboard');
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Wrong Password!</div>');
						redirect('auth/login');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">This User Has Not Been Activated!</div>');
					redirect('auth/login');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">User Not Found!</div>');
				redirect('auth/login');
			}
		}
	}

	public function activate($user_id)
	{
		$this->load->model('user_m');
		$this->user_m->activate($user_id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">User Has been activated!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Failed to activate this user!</div>');
		}
		redirect('user');
	}

	public function deactivate($user_id)
	{
		$this->load->model('user_m');
		$this->user_m->deactivate($user_id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">User Has been deactivated!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Failed to deactivate this user!</div>');
		}
		redirect('user');
	}

	public function logout()
	{
		$params = array('userid', 'level', 'code');
		$this->session->unset_userdata($params);
		$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">You Have Been Logout!</div>');
		redirect('auth/login');
	}
}

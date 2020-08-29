<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('profile_m');
	}

	public function index()
	{
        $id = $this->fungsi->user_login()->user_id;
		$query = $this->profile_m->get($id);
		$data['row'] = $query->row();
		$this->template->load('template', 'image/profile', $data);
	}


    public function update()
    {
        $id = $this->fungsi->user_login()->user_id;
    	$query = $this->profile_m->get($id);
        $data['row'] = $query->row();

        $this->form_validation->set_rules('fullname', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|callback_username_check');
        $this->form_validation->set_rules('city', 'City', 'required|trim');
        $this->form_validation->set_rules('image', 'Image', 'trim');

        if($this->form_validation->run() == false) {
	        $this->template->load('template', 'image/edit', $data);
        } else {
            $fullname = $this->input->post('fullname');
            $username = $this->input->post('username');
            $city = $this->input->post('city');
            $user_id = $this->fungsi->user_login()->user_id;

            // cek jika ada gambar yang akan diupload
            $upload_image = @$_FILES['image']['name'];

            if($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '3000';
                $config['upload_path']   = './assets/img/profile/';
                $config['file_name']   = 'profile-'.$this->fungsi->user_login()->username.'-'.date('ymd');

                $this->load->library('upload', $config);

                if($this->upload->do_upload('image')) {
                    $old_image = $this->fungsi->user_login()->image;
                    if($old_image != 'user-image.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $fullname);
            $this->db->set('username', $username);
            $this->db->set('city', $city);
            $this->db->where('user_id', $user_id);
            $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Your profile has been changed</div>');
            redirect('profile/my-profile/'.date('dmy'));
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

    public function confirmpass()
    {
        $this->load->view('image/confirm-password');
    }

    public function proccess()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->profile_m->confirm($post);
        $code = sha1($this->fungsi->user_login()->username . uniqid());
        if ($query->num_rows() > 0) {
            $params = [
                'code' => $code
            ];
            $this->session->set_userdata($params);
            redirect('profile/my-profile/change-password');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Wrong Password!</div>');
            redirect('profile/my-profile/confirm-password');
        }
    }

    public function changepassword()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|trim|matches[passconf]', [
            'matches' => "Password Don't Match!",
            'min_length' => "Password too short!"
        ]);
        $this->form_validation->set_rules('passconf', 'Password', 'required|trim|matches[password]');
        if ($this->form_validation->run() == FALSE) {
            $code = sha1($this->fungsi->user_login()->username . uniqid());
            if ($this->session->userdata('code') === $code) {
                $this->template->load('template', 'image/change-password');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning text-center" role="alert">Please Confirm Your Password!</div>');
                redirect('profile/my-profile/confirm-password');
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->profile_m->edit($post);
            $params = array('code');
            $this->session->unset_userdata($params);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Password Updated!</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Failed to Update Password!</div>');
            }
            redirect('profile/my-profile/'.date('dmy'));
        }
    }

    public function cancel()
    {
        $params = array('code');
        $this->session->unset_userdata($params);
        redirect('profile/my-profile/'.date('dmy'));
    }
}
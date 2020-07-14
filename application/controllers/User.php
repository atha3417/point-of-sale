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
		$data['row'] = $this->user_m->get();
		$this->template->load('template', 'user/user_data', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('fullname', 'Full Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
			'is_unique' => "Username Already Used!"
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[passconf]|min_length[5]', [
			'matches' => "Password Don't Match!",
			'min_length' => "Password too Short!"
		]);
		$this->form_validation->set_rules('passconf', 'Password', 'required|trim|matches[password]', [
			'matches' => "Password Don't Match!"
		]);
		$this->form_validation->set_rules('address', 'Address', 'trim');
		$this->form_validation->set_rules('image', 'Sidebar Image', 'required');
		$this->form_validation->set_rules('level', 'Level', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'user/user_form_add');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user_m->add($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">New User Added</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Failed to Add User</div>');
			}
	    	redirect('user/');
		}
	}

	public function proccess()
	{
		if (isset($_POST['import'])) {
	 		$file = @$_FILES['file']['name'];
			$ekstensi = explode(".", $file);
			$file_name = "excel-".round(microtime(true)).".".end($ekstensi);
			$sumber = @$_FILES['file']['tmp_name'];
			$target_dir = "./assets/file/excel/user/";
			$target_file = $target_dir.$file_name;
			move_uploaded_file($sumber, $target_file);

			$obj = PHPExcel_IOFactory::load($target_file);
			$all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

			for ($i = 2; $i <= count($all_data); $i++) {
				$params = array(
					'username' => $all_data[$i]['A'],
					'password' => $all_data[$i]['B'],
					'name' => $all_data[$i]['C'],
					'address' => $all_data[$i]['D'],
					'level' => $all_data[$i]['E'],
					'image' => $all_data[$i]['F']
				);
				$this->db->insert('user', $params);
			}
			// unlink(FCPATH . $target_file);
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">New User Added Saved!</div>');
		redirect('user/');
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('fullname', 'Full Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|callback_username_check');
		$this->form_validation->set_rules('image', 'Sidebar Image', 'required');

		if($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'min_length[5]|trim|matches[passconf]', [
				'matches' => "Password Don't Match!",
				'min_length' => "Password too short!"
			]);
		}
		
		if($this->input->post('passconf')) {
			$this->form_validation->set_rules('passconf', 'Password', 'trim|matches[password]', [
				'matches' => "Password Don't Match!"
			]);
		}
		
		$this->form_validation->set_rules('address', 'Address', 'trim');
		$this->form_validation->set_rules('level', 'Level', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$query = $this->user_m->get($id);
			if($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'user/user_form_edit', $data);
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-warning text-center" role="alert">Data Not Found!</div>');
				redirect('user/');
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user_m->edit($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">User Updated!</div>');
			}
	    	redirect('user/');
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
    	if ($this->fungsi->user_login()->user_id !== 1) {
	    	$user = $this->user_m->get($user_id)->row();
	        $this->load->model('User_m');
	        if ($user->image != 'profile.jpg') {
	        	$target_profile = './assets/img/profile'.$user->image;
				unlink(FCPATH . $target_profile);
	        }
	        if ($user->image2 != 'image.jpg') {
	        	$target_image = './assets/img/profile'.$user->image2;
				unlink(FCPATH . $target_image);
	        }
	        $this->User_m->deleteDataUser($user_id);
        }
        if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">User Deleted!</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-warning text-center" role="alert">Admin Cannot be Deleted!</div>');
			}
        redirect('user/');
    }

    public function import()
    {
    	$this->template->load('template', 'user/import');
    }
}

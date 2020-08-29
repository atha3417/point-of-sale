<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('category_m');
	}

	public function index()
	{
		$data['row'] = $this->category_m->get();
		$this->template->load('template', 'product/category/category_data', $data);
	}

	public function add()
	{
		$category = new stdClass();
		$category->category_id = null;
		$category->name = null;
		$data = array(
			'page' => 'add',
			'row' => $category
		);
		$this->template->load('template', 'product/category/category_form', $data);
	}

	public function edit($id)
	{
		$query = $this->category_m->get($id);
		if ($query->num_rows() > 0) {
			$category = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $category
		);
		$this->template->load('template', 'product/category/category_form', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-warning text-center" role="alert">Data Not Found!</div>');
			redirect('user/');
		}
	}

	public function proccess()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->category_m->add($post);
		} else if (isset($_POST['edit'])) {
			$this->category_m->edit($post);
		} elseif (isset($_POST['import'])) {
			$file = @$_FILES['file']['name'];
			$ekstensi = explode(".", $file);
			$file_name = "excel-".round(microtime(true)).".".end($ekstensi);
			$sumber = @$_FILES['file']['tmp_name'];
			$target_dir = "./assets/file/excel/category/";
			$target_file = $target_dir.$file_name;
			move_uploaded_file($sumber, $target_file);

			$obj = PHPExcel_IOFactory::load($target_file);
			$all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

			for ($i = 2; $i <= count($all_data); $i++) {
				$params['name'] = $all_data[$i]['A'];
				$this->db->insert('p_category', $params);
			}
			// unlink(FCPATH . $target_file);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Saved!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Failed to Save Data!</div>');
		}
		redirect('category/');
	}

	public function deletecategory($category_id)
    {
        $this->load->model('category_m');
        $this->category_m->deleteDatacategory($category_id);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Category deleted!</div>');
        redirect('category/');
    }

    public function deleteAll()
    {
        $this->category_m->deleteAllCategory();
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">All Category Deleted!</div>');
        redirect('category/');
    }

    public function import()
    {
    	$this->template->load('template', 'product/category/import');
    }
}

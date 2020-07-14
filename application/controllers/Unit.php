<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('unit_m');
	}

	public function index()
	{
		$data['row'] = $this->unit_m->get();
		$this->template->load('template', 'product/unit/unit_data', $data);
	}

	public function add()
	{
		$unit = new stdClass();
		$unit->unit_id = null;
		$unit->name = null;
		$data = array(
			'page' => 'add',
			'row' => $unit
		);
		$this->template->load('template', 'product/unit/unit_form', $data);
	}

	public function edit($id)
	{
		$query = $this->unit_m->get($id);
		if ($query->num_rows() > 0) {
			$unit = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $unit
		);
		$this->template->load('template', 'product/unit/unit_form', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-warning text-center" role="alert">Data Not Found!</div>');
			redirect('user/');
		}
	}

	public function proccess()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->unit_m->add($post);
		} else if (isset($_POST['edit'])) {
			$this->unit_m->edit($post);
		} else if (isset($_POST['import'])) {
			$file = @$_FILES['file']['name'];
			$ekstensi = explode(".", $file);
			$file_name = "excel-".round(microtime(true)).".".end($ekstensi);
			$sumber = @$_FILES['file']['tmp_name'];
			$target_dir = "./assets/file/excel/unit/";
			$target_file = $target_dir.$file_name;
			move_uploaded_file($sumber, $target_file);

			$obj = PHPExcel_IOFactory::load($target_file);
			$all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

			for ($i = 2; $i <= count($all_data); $i++) {
				$params['name'] = $all_data[$i]['A'];
				$this->db->insert('p_unit', $params);
			}
			// unlink(FCPATH . $target_file);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Saved!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Failed to Save Data!</div>');
		}
		redirect('unit/');
	}

	public function deleteunit($unit_id)
    {
        $this->unit_m->deleteDataunit($unit_id);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Unit Deleted!</div>');
        redirect('unit/');
    }

    public function deleteAll()
    {
        $this->unit_m->deleteAllUnit();
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">All Unit Deleted!</div>');
        redirect('unit/');
    }

    public function import()
    {
    	$this->template->load('template', 'product/unit/import');
    }
}

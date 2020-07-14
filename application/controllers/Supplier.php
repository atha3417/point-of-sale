<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('supplier_m');
	}

	public function index()
	{
		$data['row'] = $this->supplier_m->get();
		$this->template->load('template', 'supplier/supplier_data', $data);
	}

	public function add()
	{
		$supplier = new stdClass();
		$supplier->supplier_id = null;
		$supplier->name = null;
		$supplier->phone = null;
		$supplier->address = null;
		$supplier->description = null;
		$data = array(
			'page' => 'add',
			'row' => $supplier
		);
		$this->template->load('template', 'supplier/supplier_form', $data);
	}

	public function edit($id)
	{
		$query = $this->supplier_m->get($id);
		if ($query->num_rows() > 0) {
			$supplier = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $supplier
		);
		$this->template->load('template', 'supplier/supplier_form', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-warning text-center" role="alert">Data Not Found!</div>');
			redirect('supplier/');
		}
	}

	public function proccess()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->supplier_m->add($post);
		} else if (isset($_POST['edit'])) {
			$this->supplier_m->edit($post);
		} else if (isset($_POST['import'])) {
	 		$file = @$_FILES['file']['name'];
			$ekstensi = explode(".", $file);
			$file_name = "excel-".round(microtime(true)).".".end($ekstensi);
			$sumber = @$_FILES['file']['tmp_name'];
			$target_dir = "./assets/file/excel/supplier/";
			$target_file = $target_dir.$file_name;
			move_uploaded_file($sumber, $target_file);

			$obj = PHPExcel_IOFactory::load($target_file);
			$all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

			for ($i = 2; $i <= count($all_data); $i++) {
				$params = array(
					'name' => $all_data[$i]['A'],
					'phone' => $all_data[$i]['B'],
					'address' => $all_data[$i]['C'],
					'description' => $all_data[$i]['D']
				);
				$this->db->insert('supplier', $params);
			}
			// unlink(FCPATH . $target_file);
		}

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Saved!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Failed to Save Data!</div>');
		}
		redirect('supplier/');
	}

	public function deleteSupplier($supplier_id)
    {
        $this->load->model('Supplier_m');
        $this->Supplier_m->deleteDataSupplier($supplier_id);
        if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Supplier Deleted!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Supplier Cannot be Deleted, The Supplier is Already Related!</div>');
		}
        redirect('supplier/');
    }

    public function deleteAll()
    {
        $this->load->model('Supplier_m');
        $this->Supplier_m->deleteAllSupplier();
        if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">All Supplier Deleted!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Supplier Cannot be Deleted, The Supplier is Already Related!</div>');
		}
        redirect('supplier/');
    }

    public function import()
    {
    	$this->template->load('template', 'supplier/import');
    }
}

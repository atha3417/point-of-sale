<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mycustomer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('customer_m');
	}

	public function index()
	{
		$data['row'] = $this->customer_m->get();
		$this->template->load('template', 'customer/customer_data', $data);
	}

	public function add()
	{
		$customer = new stdClass();
		$customer->customer_id = null;
		$customer->name = null;
		$customer->gender = null;
		$customer->phone = null;
		$customer->address = null;
		$data = array(
			'page' => 'add',
			'row' => $customer
		);
		$this->template->load('template', 'customer/customer_form', $data);
	}

	public function edit($id)
	{
		$query = $this->customer_m->get($id);
		if ($query->num_rows() > 0) {
			$customer = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $customer
		);
		$this->template->load('template', 'customer/customer_form', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-warning text-center" role="alert">Data Not Found!</div>');
			redirect('customer/');
		}
	}

	public function proccess()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->customer_m->add($post);
		} else if (isset($_POST['edit'])) {
			$this->customer_m->edit($post);
		} else if (isset($_POST['import'])) {
			$file = @$_FILES['file']['name'];
			$ekstensi = explode(".", $file);
			$file_name = "excel-".round(microtime(true)).".".end($ekstensi);
			$sumber = @$_FILES['file']['tmp_name'];
			$target_dir = "./assets/file/excel/customer/";
			$target_file = $target_dir.$file_name;
			move_uploaded_file($sumber, $target_file);

			$obj = PHPExcel_IOFactory::load($target_file);
			$all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

			for ($i = 2; $i <= count($all_data); $i++) {
				$params = array(
					'name' => $all_data[$i]['A'],
					'gender' => $all_data[$i]['B'],
					'phone' => $all_data[$i]['C'],
					'address' => $all_data[$i]['D']
				);
				$this->db->insert('customer', $params);
			}
			// unlink(FCPATH . $target_file);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Saved!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Failed to Save Data!</div>');
		}
		redirect('customer/');
	}

	public function deletecustomer($customer_id)
    {
        $this->customer_m->deleteDatacustomer($customer_id);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Customer Deleted!</div>');
        redirect('customer/');
    }

    public function deleteAll()
    {
        $this->customer_m->deleteAllcustomer();
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">All Customer Deleted!</div>');
        redirect('customer/');
    }

    public function import()
    {
    	$this->template->load('template', 'customer/import');
    }
}

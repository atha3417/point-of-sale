<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model(['sale_m', 'stock_m', 'item_m']);
	}

	public function sale()
	{
		$data['row'] = $this->sale_m->get_sale();
		$this->template->load('template', 'report/sale_report', $data);
	}

	public function sale_detail($sale_id)
	{
		$data['row'] = $this->sale_m->get_sale_details($sale_id);
		if ($this->sale_m->get_sale_details($sale_id)->num_rows() > 0) {
			$this->template->load('template', 'report/sale_detail', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-warning text-center" role="alert">Data Not Found!</div>');
			redirect('report/sale/');
		}
	}

	public function del($sale_id)
	{
        $this->sale_m->del($sale_id);
        if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Sale and Sale Detail deleted!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Failed to Save Data!</div>');
		}
        redirect('report/sale/');
	}

	public function stock()
	{
		$data['row'] = $this->stock_m->get_stock()->result();
		$this->template->load('template', 'report/stock_report', $data);
	}

	public function stockdel($stock_id)
	{
		$this->stock_m->delstock($stock_id);
        if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Stock deleted!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Failed to Delete Stock!</div>');
		}
        redirect('report/stock/');
	}
}

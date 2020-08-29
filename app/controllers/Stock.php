<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['item_m', 'supplier_m', 'stock_m']);
	}

	public function stock_in_data()
	{
		$data['row'] = $this->stock_m->get_stock_in()->result();
		$this->template->load('template', 'transaction/stock_in/stock_in_data', $data);
	}

	public function stock_in_add()
	{
		$item = $this->item_m->get()->result();
		$supplier = $this->supplier_m->get()->result();
		$data = ['item' => $item, 'supplier' => $supplier];
		$this->template->load('template', 'transaction/stock_in/stock_in_form', $data);
	}

	public function stock_in_del()
	{
		$stock_id = $this->uri->segment(4);
		$item_id = $this->uri->segment(5);
		$qty = $this->stock_m->get($stock_id)->row()->qty;
		$data = ['qty' => $qty, 'item_id' => $item_id];
		$this->item_m->update_stock_out($data);
		$this->stock_m->del($stock_id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Stock In Deleted!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Failed to Delete Stock In!</div>');
		}
		redirect('stock/in');
	}

	public function proccess()
	{
		if (isset($_POST['in_add'])) {
			$post = $this->input->post(null, TRUE);
			$this->stock_m->add_stock_in($post);
			$this->item_m->update_stock_in($post);
			if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Saved!</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Failed to Save Data!</div>');
			}
			redirect('stock/in');
		}
	}


	public function stock_out_data()
	{
		$data['row'] = $this->stock_m->get_stock_out()->result();
		$this->template->load('template', 'transaction/stock_out/stock_out_data', $data);
	}

	public function stock_out_add()
	{
		$item = $this->item_m->get()->result();
		$supplier = $this->supplier_m->get()->result();
		$data = ['item' => $item, 'supplier' => $supplier];
		$this->template->load('template', 'transaction/stock_out/stock_out_form', $data);
	}

	public function stock_out_del()
	{
		$stock_id = $this->uri->segment(4);
		$item_id = $this->uri->segment(5);
		$qty = $this->stock_m->gets($stock_id)->row()->qty;
		$data = ['qty' => $qty, 'item_id' => $item_id];
		$this->item_m->update_stock_out_in($data);
		$this->stock_m->delete($stock_id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Stock Out Deleted!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Failed to Delete Stock Out!</div>');
		}
		redirect('stock/out');
	}

	public function proccesss()
	{
		if (isset($_POST['out_add'])) {
			$post = $this->input->post(null, TRUE);
			$this->stock_m->add_stock_out($post);
			$this->item_m->update_stock_in_out($post);
			if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Saved!</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Failed to Save Data!</div>');
			}
			redirect('stock/out');
		}
	}
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['item_m', 'category_m', 'unit_m']);
	}

	function get_ajax() {
        $list = $this->item_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $row = array();
            $row[] = 
            $item->barcode.'&nbsp;&nbsp;
            <a href="'.site_url('item/barcode/'.$item->item_id).'" class="btn btn-xs btn-secondary">
            <i class="fa fa-barcode"></i>
            </a>
            <a href="'.site_url('item/qrcode/'.$item->item_id).'" class="btn btn-xs btn-secondary">
            <i class="fa fa-qrcode"></i>';
            $row[] = $item->name;;
            $row[] = indo_currency($item->price);
            $row[] = $item->stock;
            $row[] = $item->image != null ? '<a target="_blank" title="View Image On New Window" href="'.base_url('assets/img/product/'.$item->image).'">
            <img src="'.base_url('assets/img/product/'.$item->image).'" class=" img-thumbnail" style="width: 80px !important;">
            </a>' : null;
            // add html for action
            $row[] = '<a href="'.site_url('item/edit/'.$item->item_id).'" class="btn btn-xs btn-success"><i class="fas fa-fw fa-edit"></i></a>
                   <a href="'.site_url('item/deleteitem/'.$item->item_id).'" onclick="return confirm(\'Are you sure want to delete this item ?\')"  class="btn btn-xs btn-danger"><i class="fas fa-fw fa-trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->item_m->count_all(),
                    "recordsFiltered" => $this->item_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

	public function index()
	{
		$data['row'] = $this->item_m->get();
		$this->template->load('template', 'product/item/item_data', $data);
	}

	public function add()
	{
		$item = new stdClass();
		$item->item_id = null;
		$item->name = null;
		$item->price = null;
		if ($this->fungsi->user_login()->username = 'Admin') {
			$item->stock = null;
		}
		$item->category_id = null;

		$query_category = $this->category_m->get();

		$query_unit = $this->unit_m->get();
		$unit[null] = '-- Choose Unit --';
		foreach($query_unit->result() as $unt) {
			$unit[$unt->unit_id] = $unt->name;
		}

		$data = array(
			'page' => 'add',
			'row' => $item,
			'category' => $query_category,
			'unit' => $unit, 'selectedunit' => null
		);
		$this->template->load('template', 'product/item/item_form', $data);
	}

	public function edit($id)
	{
		$query = $this->item_m->get($id);
		if ($query->num_rows() > 0) {
			$item = $query->row();
			$query_category = $this->category_m->get();

			$query_unit = $this->unit_m->get();
			$unit[null] = 'Choose Unit';
			foreach($query_unit->result() as $unt) {
				$unit[$unt->unit_id] = $unt->name;
			}

			$data = array(
				'page' => 'edit',
				'row' => $item,
				'category' => $query_category,
				'unit' => $unit,
				'selectedunit' => $item->unit_id
			);
			$this->template->load('template', 'product/item/item_form', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-warning text-center" role="alert">Data Not Found!</div>');
			redirect('item/');
		}
	}

	public function proccess()
	{
		$config['upload_path'] = './assets/img/product';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '2048';
		$config['file_name'] = 'product-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			if ($this->item_m->check_barcode($post['barcode'])->num_rows() > 0) {
				$this->session->set_flashdata('error', '<div class="alert alert-warning text-center" role="alert">This Barcode Already Used! Please Choose Another Barcode!</div>');
				redirect('item/add');
			} else {
				if (@$_FILES['image']['name'] != null) {
					if($this->upload->do_upload('image')) {

						$post['image'] = $this->upload->data('file_name');
						$this->item_m->add($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Saved!</div>');
						} else {	
							$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Failed to Save Data!</div>');
						}
						redirect('item/');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', '<div class="alert alert-danger text-center" role="alert">Failed to Save Data '.$error." !".'</div>');
						redirect('item/add');
					}
				} else {
					$post['image'] = null;
					$this->item_m->add($post);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Saved!</div>');
					} else {	
						$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Failed to Save Data!</div>');
					}
					redirect('item/');
				}
			}
		} else if (isset($_POST['edit'])) {
			if (@$_FILES['image']['name'] != null) {
				if($this->upload->do_upload('image')) {

					$item = $this->item_m->get($post['id'])->row();
					if($item->image != null) {
						$target_file = './assets/img/product/'.$item->image;
						unlink(FCPATH . $target_file);
					}

					$post['image'] = $this->upload->data('file_name');
					$this->item_m->edit($post);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Saved!</div>');
					} else {	
						$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Failed to Save Data!</div>');
					}
					redirect('item/');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Failed to Save Data!</div>');
					redirect('item/edit/'.$data->item_id);
				}
			} else {
				$post['image'] = null;
				$this->item_m->edit($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Saved!</div>');
				} else {	
					$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Failed to Save Data!</div>');
				}
				redirect('item/');
			}
		} elseif (isset($_POST['import'])) {
			$file = @$_FILES['file']['name'];
			$ekstensi = explode(".", $file);
			$file_name = "excel-".round(microtime(true)).".".end($ekstensi);
			$sumber = @$_FILES['file']['tmp_name'];
			$target_dir = "./assets/file/excel/item/";
			$target_file = $target_dir.$file_name;
			move_uploaded_file($sumber, $target_file);

			$obj = PHPExcel_IOFactory::load($target_file);
			$all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

			for ($i = 2; $i <= count($all_data); $i++) {
				$params = array(
					'barcode' => $all_data[$i]['A'],
					'name' => $all_data[$i]['B'],
					'category_id' => $all_data[$i]['C'],
					'unit_id' => $all_data[$i]['D'],
					'price' => $all_data[$i]['E'],
					'stock' => $all_data[$i]['F'],
					'image' => $all_data[$i]['G'],
					'del-key' => $all_data[$i]['H']
				);
				$this->db->insert('p_item', $params);
			}
			// unlink(FCPATH . $target_file);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Saved!</div>');
			} else {	
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Failed to Save Data!</div>');
			}
			redirect('item/');
		}
		
	}

	public function deleteitem($item_id)
    {
    	$item = $this->item_m->get($item_id)->row();
		if($item->image != null) {
			$target_file = './assets/img/product/'.$item->image;
			unlink(FCPATH . $target_file);
		}
		$target_qrcode = './assets/img/qr-code/Qr-code-'.$item->item_id.'.png';
			unlink(FCPATH . $target_qrcode);
        $this->load->model('item_m');
        $this->item_m->deleteDataitem($item_id);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Item Deleted!</div>');
        redirect('item/');
    }

    function barcode($id) {
    	$data['row'] = $this->item_m->get($id)->row();
		$this->template->load('template', 'product/item/barcode/barcode', $data);
    }

    function qrCode($id) {
    	$data['row'] = $this->item_m->get($id)->row();
		$this->template->load('template', 'product/item/qrcode/qr_code', $data);
    }

    function barcode_print($id) {
    	$data['row'] = $this->item_m->get($id)->row();
    	$html = $this->load->view('product/item/barcode/barcode_print', $data, TRUE);
    	$this->fungsi->PdfBarcodeGenerator($html, 'barcode-'.$data['row']->barcode, 'A4', 'Portrait');
    }

    function qrcode_print($id) {
    	$data['row'] = $this->item_m->get($id)->row();
    	$html = $this->load->view('product/item/qrcode/qr_code_print', $data, TRUE);
    	$this->fungsi->PdfBarcodeGenerator($html, 'qrcode-'.$data['row']->barcode, 'A4', 'Portrait');
    }

    public function cancel($item_id)
    {
    	$item = $this->item_m->get($item_id)->row();
    	$target_qrcode = './assets/img/qr-code/Qr-code-'.$item->item_id.'.png';
		unlink(FCPATH . $target_qrcode);
		redirect('item/');
    }

    public function import()
    {
    	$this->template->load('template', 'product/item/import');
    }

    public function deleteAll()
    {
    	$this->item_m->deleteAllData();
    	if ($this->db->affected_rows() > 0) {
    		$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">All Item Deleted!</div>');
    	}
        redirect('item/');
    }
}
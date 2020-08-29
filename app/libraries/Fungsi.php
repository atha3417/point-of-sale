<?php 

class Fungsi {

	protected $ci;

	function __construct() {
		$this->ci =& get_instance();
	}

	function user_login() {
		$this->ci->load->model('user_m');
		$user_id = $this->ci->session->userdata('userid');
		$user_data = $this->ci->user_m->get($user_id)->row();
		return $user_data;
	}

	function PdfBarcodeGenerator($html, $filename, $paper, $orientation) {
		$dompdf = new Dompdf\Dompdf();
		$dompdf->loadHtml($html);
		$dompdf->setPaper($paper, $orientation);
		$dompdf->render();
		$dompdf->stream($filename, array('Attachment' => 0));
	}

	public function count_item()
	{
		$this->ci->load->model('item_m');
		return $this->ci->item_m->get()->num_rows();
	}

	public function count_sale()
	{
		$this->ci->load->model('sale_m');
		return $this->ci->sale_m->get()->num_rows();
	}

	public function count_customer()
	{
		$this->ci->load->model('customer_m');
		return $this->ci->customer_m->get()->num_rows();
	}

	public function count_user()
	{
		$this->ci->load->model('user_m');
		return $this->ci->user_m->get()->num_rows();
	}
}
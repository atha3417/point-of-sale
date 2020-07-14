<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('chat_m');
	}

	public function index()
	{
		$data['row'] = $this->chat_m->gets()->row();
		$this->template->load('template', 'chat/index', $data);
	}

}
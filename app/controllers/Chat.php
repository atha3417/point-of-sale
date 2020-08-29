<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class Chat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('chat_m');
	}

	public function index()
	{
		$data['chats'] = $this->chat_m->get_all_message()->result();
		$data['id'] = $this->session->userdata('userid');
		$this->template->load('template', 'chat/index', $data);
	}

	public function add()
	{
		$options = [
		    'cluster' => 'ap1',
		    'useTLS' => true
		];

		$pusher = new Pusher\Pusher('de659bd2b7a7062bf5b0', '554c6bc42d75f9c431ce', '1056848', $options);

		if ($this->chat_m->insert_chat()) {
			$push = $this->chat_m->get_all_message()->result();
			for ($i = 0; $i < count($push); $i++) {
				$user = get_chat_user($push[$i]->user_id);
				$push[$i]->username = $user->username;
				$push[$i]->image = $user->image;
				$push[$i]->level = $this->session->userdata('level');
			}
			foreach($push as $key) {
				$data[] = $key;
			}
			$pusher->trigger('pos-chat', 'send-message', $data);
		}

	}
}
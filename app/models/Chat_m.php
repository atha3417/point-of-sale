<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_m extends CI_Model {

	public function get_all_message()
	{
		return $this->db->order_by('id', 'ASC')->get('chat');
	}

	public function insert_chat()
	{
		$message = $this->input->post('message', true);

		if ($message == 'clearChatBox(htmlcssjsphp)') {
			if ($this->db->truncate('chat')) {
				echo 2;
			}
		} else {
			date_default_timezone_set("Asia/Jakarta");
			$data = [
				'user_id' => $this->session->userdata('userid'),
				'message' => htmlspecialchars($message),
				'created_at' => date('d M y h:i:s A')
			];

			if ($this->db->insert('chat', $data)) {
				return true;
			}
		}
	}
}
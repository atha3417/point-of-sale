<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_m extends CI_Model {

	public function get($from = null)
	{
		$this->db->from('chat');
		if ($from != null) {
			$this->db->where('from_user', $from);
		}
		$query = $this->db->get();
		return $query;
	}

	public function gets($from = null)
	{
		$this->db->select('chat.chat_id, chat.message, chat.date, chat.time, user.username as user_name, chat.to_user');
		$this->db->from('chat');
		$this->db->join('user', 'chat.from_user = user.user_id');
		if ($from != null) {
			$this->db->where('from_user', $from);
		}
		$query = $this->db->get();
		return $query;
	}

}
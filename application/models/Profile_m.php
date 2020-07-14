<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Profile_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->from('user');
		if ($id != null) {
			$this->db->where('user_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function confirm($post)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('password', sha1($post['password']));
		$query = $this->db->get();
		return $query;
	}

	public function edit($post)
	{
		$params['password'] = sha1($post['password']);
		$params['password_updated'] = date('Y-m-d');
		$params['updated'] = date('H:i:s');
		$this->db->where('user_id', $this->fungsi->user_login()->user_id);
		$this->db->update('user', $params);
}

}
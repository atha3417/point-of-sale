<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

	public function register($post)
	{
		$data = [
			'username' => $post['username'],
			'password' => sha1($post['password']),
			'name' => $post['name'],
			'city' => $post['city'],
			'level' => 2,
			'image' => 'user-image.jpg',
			'is_active' => 0
		];
		$this->db->insert('user', $data);
	}

	public function login($username)
	{
		return $this->db->get_where('user', ['username' => $username]);
	}

	public function get($id = null)
	{
		$this->db->from('user');
		if ($id != null) {
			$this->db->where('user_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params['name'] = $post['fullname'];
		$params['username'] = $post['username'];
		$params['password'] = sha1($post['password']);
		$params['city'] = $post['city'] != "" ? $post['city'] : null;
		$params['level'] = $post['level'];
		$params['image'] = 'user-image.jpg';
		$params['is_active'] = 0;
		$this->db->insert('user', $params);
	}

	public function deleteDataUser($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where('user_id !=', 1);
		$this->db->delete('user');
	}

	public function activate($user_id)
	{
		$this->db->set('is_active', 1);
		$this->db->where('user_id', $user_id);
		$this->db->update('user');
	}

	public function deactivate($user_id)
	{
		$this->db->set('is_active', 0);
		$this->db->where('user_id', $user_id);
		$this->db->update('user');
	}

}
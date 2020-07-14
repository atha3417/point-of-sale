<?php defined('BASEPATH') OR exit('No direct script access allowed');

class customer_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->from('customer');
		if ($id != null) {
			$this->db->where('customer_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'name' => $post['customer_name'],
			'gender' => $post['gender'],
			'phone' => $post['phone'],
			'address' => $post['addr'],
		];
		$this->db->insert('customer', $params);
	}

	public function edit($post)
	{
		$params = [
			'name' => $post['customer_name'],
			'gender' => $post['gender'],
			'phone' => $post['phone'],
			'address' => $post['addr'],
			'updated' => date('Y-m-d H:i:s')
		];
		$this->db->where('customer_id', $post['id']);
		$this->db->update('customer', $params);
	}

	public function deleteDatacustomer($customer_id)
	{
		$this->db->where('customer_id', $customer_id);
		$this->db->delete('customer');
	}

	public function deleteAllcustomer()
	{
		$this->db->where('del_key', 1);
		$this->db->delete('customer');
	}
	
}
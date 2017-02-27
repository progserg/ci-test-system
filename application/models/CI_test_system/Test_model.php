<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Test_model extends CI_model
{
	
	function __construct()
	{
		$this->load->database();
	}

	public function get_all_users()
	{
		return $this->db->get('users')->result_array();
	}

	public function add_user()
	{
		$name = (null != ($this->input->post('name')))?$this->input->post('name'):'user' . mktime();
		$password = (null != ($this->input->post('password')))?$this->input->post('password'):'';
		$user_group = (null != ($this->input->post('user_group')))?$this->input->post('user_group'):'user';

		$data = [
			'name' => $name,
			'password' => $password,
			'user_group' => $user_group
		];
		$this->db->insert('users', $data);
	}

	public function delete_user($id = '')
	{
		$this->db->where('id', $id);
		$this->db->delete('users');

		$this->db->where('user_id', $id);
		$this->db->delete('results');
	}

	public function is_user_exist($name='')
	{
		$this->db->where('name', $name);
		$result = $this->db->get('users')->row_array();
		if($result > 0){
			return true;
		}
		else{
			return false;
		}
	}

	public function get_users_results()
	{
		$this->db->select('name, time_start, time_stop, user_result');
		$this->db->from('results');
		$this->db->join('users', 'results.user_id = users.id');

		$query = $this->db->get();
		return $query->result_array();
	}

	private function get_user_id($fieldName = '', $data = '')
	{
		$this->db->select('id');
		$this->db->where($fieldName, $data);
		$id = $this->db->get('users')->row_array();
		return $id['id'];
	}

	public function start_test($name = '')
	{
		$id = $this->get_user_id('name', $name);

		$data = [
			'user_id' => $id,
			'time_start' => date('Y-m-d h:i:s')
		];

		return $this->db->insert('results', $data);

	}

	public function end_test($id='', $user_result = '')
	{
		$data = [
			'time_stop' => date('Y-m-d h:i:s'),
			'user_result' => $user_result
		];
		$this->db->where('id', $id);
		return $this->db->update('results', $data);
	}
}
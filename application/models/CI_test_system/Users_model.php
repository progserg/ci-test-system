<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Users_model extends CI_model
{
	
	function __construct()
	{
		$this->load->database();
	}

	public function get_all_users()
	{
		return $this->db->get('users')->result_array();
	}

	public function add_user($name='', $password='',$user_group='')
	{
		$name = (null != $name)?$name:'user' . mktime();
		$password = (null != $password)?$password:'';
		$user_group = (null != $user_group)?$user_group:'user';

		$data = [
			'name' => $name,
			'password' => $password,
			'user_group' => $user_group
		];
		return $this->db->insert('users', $data);
	}

	public function delete_user($id = '')
	{
		$this->db->where('id', $id);
		if(!($this->db->delete('users'))){
			return 'delete_user_failed';
		}

		$this->db->where('user_id', $id);
		if(!($this->db->delete('results'))){
			return 'delete_results_failed';
		}
		return true;
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
		$this->db->order_by('user_result', 'desc');

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

		$this->db->insert('results', $data);

		$this->db->select('id');
		$this->db->where('user_id', $id);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('results')->row_array();

		return $query['id'];

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

	public function result_by_id($id='')
	{
		$this->db->select('user_result');
		$this->db->where('id', $id);
		$result = $this->db->get('results')->row_array();
		return $result['user_result'];
	}
}
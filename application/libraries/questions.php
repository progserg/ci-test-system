<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions
{
	private $CI;
	static public $data='';

	function __construct()
	{					
		$this->CI =& get_instance();
		$this->CI->load->database();
	}	

	static public function initialize()
	{
		if(self::$data =='')
		{
			self::$data = new Questions();
		}
	}

	static public function get_all()
	{
		if(self::$data == '')
		{
			self::initialize();
		}
		return self::$data->CI->db->get('questions')->result_array();
	}

	static public function get_by_id($id='')
	{
		self::$data->CI->db->where('id', $id);
		return self::$data->CI->db->get('questions')->row_array();
	}

	static public function get_count()
	{
		self::$data->CI->db->select('id');
		$query = self::$data->CI->db->get('questions')->result_array();
		return count($query);
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once($_SERVER['DOCUMENT_ROOT'] . '/application/controllers/Users.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/application/libraries/questions.php');

//use \Test;
/**
* 
*/
class Start extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->library('form_validation');
		Questions::initialize();
		$this->users = new Users();
	}

	public function index()
	{
		$this->users->index();
	}

	public function login()
	{
		$name = $this->input->post('name');
		$data = Questions::get_by_id(1);
		$this->users->login($name, $data);
	}

	public function testing()
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$number= $this->input->get('number');
		$count = Questions::get_count();
		if($number <= $count){
			$data = Questions::get_by_id($number);
			$this->users->login($name, $data);
		}else{
			var_dump($id);
			$this->users->result_by_id($id, $name);
		}
		

	}

	public function allUsers()
	{
		$this->users->get_all_users();
	}

	public function results()
	{
		/////создает две записи в results ИСПРАВИТЬ!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->users->results();
	}

	public function questions()
	{
		var_dump(Questions::get_all());
	}

	public function questionsById()
	{
		var_dump(Questions::get_by_id(1));
	}

	public function count()
	{
		var_dump(Questions::get_count());
	}

}
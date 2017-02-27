<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Controller
{
	const _mainView = 'CI_test_system/';
	const _indexView = Users::_mainView . 'index';
	const _headerView = Users::_mainView . 'layouts/header';
	const _footerView = Users::_mainView . 'layouts/footer';

	private $CI;
	
	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->helper('url');
		$this->CI->load->helper('form');
		$this->CI->load->helper('date');
		$this->CI->load->library('form_validation');
		
		$this->CI->load->model('CI_test_system/Users_model', 'tm');

	}

	function load_template($view='', $dataHeader = '', $dataBody = '', $dataFooter = '')
	{
		$this->CI->load->view(Users::_headerView, $dataHeader);
		$this->CI->load->view($view, $dataBody);
		$this->CI->load->view(Users::_footerView, $dataFooter);
	}

	public function index($view='')
	{
		if($view==''){
			$view = Users::_indexView;
		}
		$this->load_template($view);
	}

	public function testing()
	{
		$this->load_template(Users::_mainView . 'testing');
	}

	public function add_user($name='', $data = '')
	{
		$this->CI->form_validation->set_rules('name', 'Имя', 'required|max_length[20]',[
			'required' => 'Вы не заполнили поле %s'
			]);

	    if ($this->CI->form_validation->run() === FALSE)
	    {
	        $this->load_template(Users::_indexView);

	    }
	    else
	    {
	        $this->CI->tm->add_user($name);
	        $id = $this->CI->tm->start_test($name);
			$items = [
				'id' => $id,
				'name' => $name,
				'questions' => $data
			];
	        $dataHeader = ['success' => 'Пользователь успешно добавлен!'];
	        $this->load_template(Users::_mainView . 'testing', $dataHeader, $items);
	    }
		
	}

	public function delete_user()
	{
		$id = $this->CI->input->get('id');
		$this->CI->tm->delete_user($id);
	}

	public function get_all_users()
	{
		$users = $this->CI->tm->get_all_users();
		$this->load_template( Users::_mainView . 'user_list', '', ['users' => $users]);
	}

	public function login($name = '', $data = '')
	{
		
		if($this->CI->tm->is_user_exist($name)){
			$id = $this->CI->tm->start_test($name);
			$items = [
				'id' => $id,
				'name' => $name,
				'questions' => $data
			];
			$this->load_template(Users::_mainView . 'testing','', $items);
		}else{
			$this->add_user($name, $data);
		}
	}

	public function results()
	{
		$users = $this->CI->tm->get_users_results();
		$this->load_template(Users::_mainView . 'results', '', ['users' => $users]);
	}

	public function result_by_id($id = '', $name = '')
	{
		$this->CI->tm->end_test($id, 37);

		$result = $this->CI->tm->result_by_id($id);
		$items = [
			'name' => $name,
			'result' => $result
		];
		$this->load_template(Users::_mainView . 'user_result','', $items);
	}

	public function test()
	{
		var_dump($this->CI->tm->end_test(2, 63));
	}
}
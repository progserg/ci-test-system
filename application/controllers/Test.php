<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Test extends CI_Controller
{
	const _mainView = 'CI_test_system/';
	const _indexView = Test::_mainView . 'index';
	const _headerView = Test::_mainView . 'layouts/header';
	const _footerView = Test::_mainView . 'layouts/footer';

	private $CI;
	
	function __construct()
	{
		//parent::__construct();
		$this->CI =& get_instance();
		$this->CI->load->helper('url');
		$this->CI->load->helper('form');
		$this->CI->load->helper('date');
		$this->CI->load->library('form_validation');
		
		$this->CI->load->model('CI_test_system/Test_model', 'tm');

	}

	function load_template($view='', $dataHeader = '', $dataBody = '', $dataFooter = '')
	{
		$this->CI->load->view(Test::_headerView, $dataHeader);
		$this->CI->load->view($view, $dataBody);
		$this->CI->load->view(Test::_footerView, $dataFooter);
	}

	public function index($view='')
	{
		if($view==''){
			$view = Test::_indexView;
		}
		$this->load_template($view);
	}

	public function testing()
	{
		$this->load_template(Test::_mainView . 'testing');
	}

	public function add_user($name='')
	{
		$this->form_validation->set_rules('name', 'Имя', 'required|max_length[20]',[
			'required' => 'Вы не заполнили поле %s'
			]);

	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load_template(Test::_indexView);

	    }
	    else
	    {
	        $this->tm->add_user($name);
	        $this->tm->start_test($name);
	        $dataHeader = ['success' => 'Пользователь успешно добавлен!'];
	        $this->load_template(Test::_mainView . 'testing', $dataHeader, ['name' => $name]);
	    }
		
	}

	public function delete_user()
	{
		$id = $this->input->get('id');
		$this->tm->delete_user($id);
	}

	public function get_all_users()
	{
		$users = $this->tm->get_all_users();
		$this->load_template( Test::_mainView . 'user_list', '', ['users' => $users]);
	}

	public function login()
	{
		$name = $this->input->post('name');

		if($this->tm->is_user_exist($name)){
			$this->tm->start_test($name);
			$this->load_template(Test::_mainView . 'testing','', ['name' => $name]);
		}else{
			$this->add_user($name);
		}
	}

	public function results()
	{
		$users = $this->tm->get_users_results();
		$this->load_template(Test::_mainView . 'results', '', ['users' => $users]);
	}

	public function test()
	{
		var_dump($this->tm->end_test(2, 63));
	}
}
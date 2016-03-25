<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->model('records');
		$this->load->library('session');
	}

	public function index()
	{
		$data['teacher_list'] = $this->records->getTeacher();
		$this->load->view('index', $data);
	}

	public function teacher_info()
	{
		$view['teacher_list'] = $this->records->getTeacherInfo($id);
		$this->load->view('teacher_info', $view);
	}

}
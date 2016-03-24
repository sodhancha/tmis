<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lab extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->model('records');
		$this->load->library('session');
	}

	function _get_navbar(){
		return $this->load->view('backend/navbar',TRUE);
	}

	function _get_sidebar(){
		return $this->load->view('backend/sidebar',TRUE);
	}

	public function index()
	{
		$data['lab_list'] = $this->records->getLab();
		$data['navbar']=$this->_get_navbar();
		$data['sidebar'] = $this->_get_sidebar();
		$this->load->view('backend/lab', $data);
	}

	public function add_lab()
	{
		$data = array(
					'lab_name' => $this->input->post('lab_name'),
			);
			$query = $this->records->addLab($data);
			redirect('backend/lab');
	}

	public function delLab()
	{
		$id = $this->input->post('id');
		$data = $this->records->delLab($id);
		echo json_encode($data);
		die();
	}

}
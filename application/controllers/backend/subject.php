<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subject extends CI_Controller {

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
		$data['subject_list'] = $this->records->getSubject();
		$data['navbar']=$this->_get_navbar();
		$data['sidebar'] = $this->_get_sidebar();
		$this->load->view('backend/subject', $data);
	}

	public function add_subject()
	{
		$data = array(
					'subject_name' => $this->input->post('sub_name'),
					'subject_description' => $this->input->post('sub_desc'),
			);
			$query = $this->records->addSubject($data);
			redirect('backend/subject');
	}

	public function delSub()
	{
		$id = $this->input->post('id');
		$data = $this->records->delSub($id);
		echo json_encode($data);
		die();
	}

	public function editSub()
	{
		$id = $this->input->post('id');
		$data = $this->records->editSub($id);
		echo json_encode($data);
		die();
	}

	public function updateLab()
	{
		$sid=$_POST['subject_id'];
        $subname=$_POST['subject_name'];
        $subdesc=$_POST['subject_description'];
        $query = $this->records->updateSub($sid, $subname, $subdesc);
        if($query){
          $this->session->set_flashdata('updatemsg','<div class="alert alert-success">
                  <strong>Success!</strong>You have updated successfully!!
                  </div>'
                  );
                  redirect('backend/subject');
        }
        else{
          $this->session->set_flashdata('updateunmsg','<div class="alert alert-success">
                  <strong>Sorry!</strong>Cannot be updated!!
                  </div>'
                  );
                  redirect('backend/subject');
        }
	}

}
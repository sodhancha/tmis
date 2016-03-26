<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lab extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->model('records');
		$this->load->library('session');
	}

	/*
		I like what you have done here.
		Maybe in the next vesion you can put _get_navbar and _get_sidebar inside of a BaseController and extend BaseController instead of CI_Controller
	 */
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

	public function editLab()
	{
		$id = $this->input->post('id');
		$data = $this->records->editLab($id);
		echo json_encode($data);
		die();
	}

	public function updateLab()
	{
		/*
			Try putting in spaces after the equals sign
			e.g:- $lid = $_POST['lab_id'];

			Try using codeiginters $this->input->get('lab_id'); methods for security reasons
		 */
		$lid=$_POST['lab_id'];
        $labname=$_POST['lab_name'];
        $query = $this->records->updateLab($lid, $labname);

        if($query){

          //Do not use HTML inside of Controllers or Models it's bad practice
          $this->session->set_flashdata('updatemsg','<div class="alert alert-success">
                  <strong>Success!</strong>You have updated successfully!!
                  </div>'
                  );
                  redirect('backend/lab');
        }
        else{

        	 //Do not use HTML inside of Controllers or Models it's bad practice
          $this->session->set_flashdata('updateunmsg','<div class="alert alert-success">
                  <strong>Sorry!</strong>Cannot be updated!!
                  </div>'
                  );
                  redirect('backend/lab');
        }
	}

}
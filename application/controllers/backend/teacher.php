<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends CI_Controller {

	public function __construct() {

		parent:: __construct();
		$this->load->model('records');
		$this->load->library('session');
	}

public function do_imgupload(){
       $config['upload_path'] = './assets/upload/teacher';

       if(!is_dir($config['upload_path'])) //create the folder if it's not already exists
       {
                 mkdir($config['upload_path'],0755,TRUE);
       } 
       $config['allowed_types'] = 'gif|jpg|png';
       $config['max_size'] = '10000';
       $config['max_width']  = '2000';
       $config['max_height']  = '2000';

       $this->load->library('upload', $config);

       if ( ! $this->upload->do_upload('userfile'))
            {
            $error = array('error' => $this->upload->display_errors());
            }
       else
            {
            $data_img =$this->upload->data(); 

  /* creating thumb of the image situated in the users upload */
  $this->load->library('image_lib');
      $config['source_image']  = './assets/upload/teacher'.$data_img['file_name'];/* select the users source image */
      $config['new_image']  = './assets/upload/thumbs/'.$data_img['file_name']; /* create a thumb of the users immage into thumb folder */
      $config['create_thumb'] = TRUE;
      $config['maintain_ratio'] = FALSE;
      $config['width']   = 150; /* width of the thumb image */
      $config['height'] = 130;  /* height of the thumb image */
      
      $this->image_lib->initialize($config);  /* initialize the config made above */
      $this->image_lib->resize();

            return $data_img;
       }

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
		$data['lab_list'] = $this->records->getLab();
		$data['navbar']=$this->_get_navbar();
		$data['sidebar'] = $this->_get_sidebar();
		$this->load->view('backend/teacher', $data);
	}

  public function add_teacher()
  {
    $image = $this->do_imgupload(); 
    $data = array(
          'teacher_name' => $this->input->post('teacher_name'),
          'subject_id' => $this->input->post('subject_id'),
          'lab_id' => $this->input->post('lab_id'),
          'teacher_salary' => $this->input->post('teacher_salary'),
          'teacher_image' => $this->input->post('file_name'),

      );
      $query = $this->records->addTeacher($data);
      redirect('backend/teacher');
  }
	
}
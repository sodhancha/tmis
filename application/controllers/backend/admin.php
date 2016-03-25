<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->model('records');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('backend/index');
	}

	public function do_imgupload(){
       $config['upload_path'] = './assets/upload/admin';

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
	      $config['source_image']  = './assets/upload/admin'.$data_img['file_name'];/* select the users source image */
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

	public function register()
	{
		$this->form_validation->set_rules('admin_fullname','full_name','required');
		$this->form_validation->set_rules('admin_username','username','required');
		$this->form_validation->set_rules('admin_email','email','required|valid_email|is_unique[tbladmin.email]');
		$this->form_validation->set_rules('admin_password','password','required');
		if($this->input->post('register_admin'))
		{
			$image = $this->do_imgupload(); 
			$data = array(
							'admin_fullname' => $_POST['full_name'],
							'admin_username' => $_POST['username'],
							'admin_email' => $_POST['email'],
							'admin_password' => $_POST['password'],
							'admin_image' => $image['file_name']
						);
			$query = $this->records->getRegister($data);
			$this->load->view('backend/index');
		}
	}

	public function sign_in()	
	{
		$this->form_validation->set_rules('admin_email','admin_email','required');
		$this->form_validation->set_rules('admin_password','admin_password','required');
		if($this->input->post('sign_in'))
		{
			if($this->form_validation->run() == false)
			{
				$this->load->view('backend/index');
				
			}
			else{
				$email = $_POST['admin_email'];
				$password = $_POST['admin_password'];
				$query = $this->records->getAdminLogin($email, $password);
				if($query){
						foreach($query as $value)
						{
							$user_name = $value->admin_username;
							$image = $value->admin_image;
						}
						$sessiondata=array(
							'username' => $user_name,
							'image' => $image,
							'loggedin' => true
							);
						$this->session->set_userdata($sessiondata);
						$this->session->set_flashdata('loggedinsuc','<div class="alert alert-success">
					 		<strong>Success!</strong>Logged in!!
					 		</div>');
						redirect('backend/admin/dash');
				}
				else{
					$this->session->set_flashdata('tmessage','<div class="alert alert-warning">
					 		<strong>Failed!</strong>Username or password mismatch!!
					 		</div>'
					 		);
						$this->load->view('backend/index');
					 	
					}
			}
		}
	}

	public function dash(){
		$this->load->view('backend/dashboard');
	}

	public function sign_out()
	{
		$this->session->set_userdata(array(
			'username' => '',
			'loggedin' => false ));
		$this->session->sess_destroy();
		redirect('backend/admin');
	}

	public function user()
	{
		$this->laod->view('backend/user');
	}
}
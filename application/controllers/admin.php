<?php

class Admin extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('freeter_model');
	}
	
	public function index()
	{
		$data['profiles'] = $this->freeter_model->get_profiles();
		$data['tags'] = $this->freeter_model->get_tags();


		if($this->session->userdata['user_data']['id'] == 1)
		{
			$session_id = $this->session->userdata['user_data']['id'];
			$data['logged_in_profile'] = $this->freeter_model->select_profile($session_id);
			
			//echo "admin";
			$this->load->view('templates/header');
			$this->load->view('main_logged_in', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			header('Location: '.base_url());
		}
	}
	
	public function delete_profile()
	{
		if($this->session->userdata['user_data']['id'] == 1)
		{
			$id = $this->input->post('id');
		
			if($this->freeter_model->delete_user($id))
			{
				header('Location: '.base_url('index.php/admin'));
			}
			else
			{
				header('Location: '.base_url());
			}
		}
		else
		{
			header('Location: '.base_url());
		}
	}

}

?>
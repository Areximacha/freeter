<?php

	class Freeter extends CI_Controller{
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('freeter_model');
		}
		
		public function index()
		{
						
			$data['profiles'] = $this->freeter_model->get_profiles();
			$data['tags'] = $this->freeter_model->get_tags();
			
			
			$this->load->view('templates/header');
			$this->load->view('main', $data);
			$this->load->view('templates/footer');
		}
		
		public function get_profile($id)
		{
						
			$data['profile'] = $this->freeter_model->select_profile($id);
			
			$this->load->view('profile_modal', $data);
			
		}
		
		public function register()
		{
			$this->form_validation->set_rules('reg_name', 'Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('reg_email', 'Email address', 'strtolower|trim|required|valid_email|is_unique[users.email]|xss_clean');
			$this->form_validation->set_rules('reg_password', 'Password', 'trim|required|matches[reg_password_confirm]|sha1');
			$this->form_validation->set_rules('reg_password_confirm', 'Password Confirmation', 'trim|required');
			
			if ($this->form_validation->run() == FALSE)
			{
				//take me back to the form
				//echo validation_errors();
				//$this->index();
				$this->load->view('registration_form');
			}
			else
			{
				//put data into database and close form
				echo "worked";
			}
		}
	
	}

?>
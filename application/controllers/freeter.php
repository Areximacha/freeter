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
			$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email address', 'strtolower|trim|required|valid_email|is_unique[users.email]|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password_confirm]|sha1');
			$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required');
			
			if ($this->form_validation->run() == FALSE)
			{
				//take me back to the form
				$this->load->view('registration_form');
			}
			else
			{
				//put data into database and close form
				$reg_name = $this->input->post('name');
				$reg_email = $this->input->post('email');
				$reg_password = $this->input->post('password');
				
				$this->freeter_model->add_user($reg_name, $reg_email, $reg_password);
				
				$this->load->view('edit_profile');
			}
		}
	
	}

?>
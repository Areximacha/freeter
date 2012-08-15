<?php

	class Freeter extends CI_Controller{
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('freeter_model');
		}
		
		public function index()
		{
			$this->load->helper('url');
			
			$data['profiles'] = $this->freeter_model->get_profiles();
			$data['tags'] = $this->freeter_model->get_tags();
			//$data['profile_tags'] = $this->freeter_model->get_profiletags();
			
			$this->load->view('templates/header');
			$this->load->view('main', $data);
			$this->load->view('templates/footer');
		}
	
	}

?>
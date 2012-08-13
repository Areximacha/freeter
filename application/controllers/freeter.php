<?php

	class Freeter extends CI_Controller{
	
		function index()
		{
			$this->load->helper('url');
			
			$this->load->view('templates/header');
			$this->load->view('main');
			$this->load->view('templates/footer');
		}
	
	}

?>
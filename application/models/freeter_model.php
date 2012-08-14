<?php

	class Freeter_model extends CI_Model {
	
		public function __construct()
		{
			$this->load->database();
		}
		
		public function get_profiles()
		{
			$this->db->where('id >', '1');
			$this->db->order_by('id','random');
			
			$query = $this->db->get('users');
			return $query->result_array();
		}
	
	}

?>
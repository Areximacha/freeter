<?php

	class Freeter_model extends CI_Model {
	
		public function __construct()
		{
			$this->load->database();
		}
		
		public function get_profiles()
		{
			// find some way of returning the tag info from here so they end up in 'profiles'
			
			$this->db->where('id >', '1');
			$this->db->order_by('id','random');
			
			$users = $this->db->get('users');
			$users = $users->result_array();
			
			$this->db->select('users_tags.user_id, tags.*');
			$this->db->join('users_tags', 'users_tags.tag_id = tags.id');
			
			$query = $this->db->get('tags');
			foreach ($query->result() as $row)
			{
				$tags[$row->user_id][] = array(
					'id' => $row->id,
					'tag' => $row->tag
				);
			}
			
			foreach ($users as $key => $item)
				$users[$key]['tags'] = isset($tags[$item['id']]) ? $tags[$item['id']] : array();
			
			
			return $users;
		}
		
		public function get_tags()
		{
			$this->db->order_by('id', 'asc');
			
			$query = $this->db->get('tags');
			return $query->result_array();
		}
		
		public function get_profiletags()
		{
			$query = $this->db->get('users_tags');
			return $query->result_array();
		}
		
		public function select_profile($id)
		{
			$this->db->where('id', $id);
			
			$user = $this->db->get('users');
			$user = $user->result_array();
			
			$this->db->select('tags.tag');
			$this->db->join('users_tags', 'users_tags.tag_id = tags.id');
			$this->db->where('users_tags.user_id = '.$id);
			
			$query = $this->db->get('tags');
			$tags = $query->result_array();
			
			$user['tags'] = $tags;
			
			return $user;
		}
		
		public function add_user($reg_name, $reg_email, $reg_password)
		{
			$data = array(
				'name' => $reg_name,
				'email' => $reg_email,
				'password' => $reg_password
			);
			
			$this->db->insert('users', $data);
		}
	
	}

?>
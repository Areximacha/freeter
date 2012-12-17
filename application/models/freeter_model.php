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
		
		// unused
//		public function get_profiletags()
//		{
//			$query = $this->db->get('users_tags');
//			return $query->result_array();
//		}
		
		public function select_profile($id)
		{
			$this->db->where('id', $id);
			
			$user = $this->db->get('users');
			$user = $user->result_array();
			
			$this->db->select('tags.tag');
			$this->db->join('users_tags', 'users_tags.tag_id = tags.id');
			$this->db->where('users_tags.user_id', $id);
			
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
		
		public function login($email, $password)
		{
			$this->db->where('email', $email);
			$this->db->where('password', $password);
			$this->db->limit(1);
			
			$query = $this->db->get('users');
			
			if($query -> num_rows() == 1)
			{
				return $query->result();
			}
			else
			{
				return false;
			}
		}
		
		public function update_user($id, $name, $title, $tel, $url, $bio, $tags, $new_tags)
		{
			$data = array(
				'name' => $name,
				'title' => $title,
				'tel' => $tel,
				'url' => $url,
				'bio' => $bio
			);
			
			$this->db->where('id', $id);
			$this->db->update('users', $data);
			
			// insert new tags into database
			if($new_tags)
			{
				$this->add_tags($new_tags);
			}
			
			// update relationship between tags and users in link table
			// first delete all instances of user tags
			$this->db->delete('users_tags', array('user_id' => $id));
			
			$new_tags_id = array();
			if($new_tags)
			{
				
				
				foreach ($new_tags as $key)
				{
					$this->db->select('id');
					$this->db->where('tag =', $key);
					
					$query = $this->db->get('tags');
					
					$new_tag_id = $query->result_array();
					
					array_push($new_tags_id, $new_tag_id[0]['id']);
					
				}
			}
			
			// Then add all the new ones in
			if ($tags)
			{
				$this->add_users_tags($id, $tags);
			}
			
			if ($new_tags_id)
			{
				$this->add_users_tags($id, $new_tags_id);
			}
			
			//return $new_tag_id[0]['id'];
			
			//return $tags;

		}
		
		public function update_profilepic($id, $profilepic)
		{
			$this->db->where('id', $id);
			$this->db->update('users', array('profilepic' => $profilepic));
		}
		
		public function add_tags($new_tags)
		{
			foreach ($new_tags as $new_tag)
			{
				if($new_tag)
				{
					$this->db->where('tag', $new_tag);
					$query = $this->db->get('tags');
					if ($query->num_rows() == 0)
					{
						$this->db->insert('tags', array('tag' => $new_tag));
					}
				}
				
			}
		}
		
		public function add_users_tags($id, $tags)
		{
			foreach ($tags as $tag_id)
				{
					if($tag_id !== NULL)
					{
						$this->db->insert('users_tags', array('user_id' => $id, 'tag_id' => $tag_id));
					}
				}
		}
		
		public function delete_user($id)
		{
			$this->db->where('id', $id);
			
			if($this->db->delete('users'))
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
	
	}

?>
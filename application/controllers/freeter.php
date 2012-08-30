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


		if($this->session->userdata['user_data'])
		{
			$session_id = $this->session->userdata['user_data']['id'];
			$data['logged_in_profile'] = $this->freeter_model->select_profile($session_id);
			
			$this->load->view('templates/header');
			$this->load->view('main_logged_in', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->load->view('templates/header');
			$this->load->view('main', $data);
			$this->load->view('templates/footer');
		}
	}

	public function get_profile($id)
	{

		$data['profile'] = $this->freeter_model->select_profile($id);

		$this->load->view('profile_modal', $data);

	}

	public function register()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('email', 'Email address', 'strtolower|trim|required|valid_email|is_unique[users.email]|xss_clean|htmlspecialchars');
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

			$this->check_login($reg_password);

			$session_id = $this->session->userdata['user_data']['id'];

			$data['logged_in_profile'] = $this->freeter_model->select_profile($session_id);
			$data['tags'] = $this->freeter_model->get_tags();

			$this->load->view('edit_profile', $data);
		}
	}

	public function open_edit_profile()
	{
		$session_id = $this->session->userdata['user_data']['id'];

		$data['logged_in_profile'] = $this->freeter_model->select_profile($session_id);
		$data['tags'] = $this->freeter_model->get_tags();

		//echo '<pre>';
		//echo print_r($data);
		//echo '</pre>';
		$this->load->view('edit_profile', $data);
	}

	public function edit_profile()
	{
		
		$this->form_validation->set_rules('editname', 'Name', 'trim|required|xss_clean|htmlspecialchars');

		if($this->input->post('edittitle')):
			$this->form_validation->set_rules('edittitle', 'Title', 'trim|xss_clean|htmlspecialchars');
		endif;

		if($this->input->post('edittel')):
			$this->form_validation->set_rules('edittel', 'Tel', 'trim|xxs_clean|htmlspecialchars');
		endif;

		if($this->input->post('editurl')):
			$this->form_validation->set_rules('editurl', 'URL', 'trim|prep_url|valid_url|xxs_clean|htmlspecialchars');
		endif;

		if($this->input->post('editbio')):
			$this->form_validation->set_rules('editbio', 'Bio', 'trim|xxs_clean|htmlspecialchars');
		endif;

		if($this->input->post('addtags')):
			$this->form_validation->set_rules('addtags', 'New tags', 'strtolower|alpha_dash|trim|xxs_clean|htmlspecialchars');
		endif;

		if($this->input->post('tags')):
			$this->form_validation->set_rules('tags', 'Tags', 'xxs_clean');
		endif;

		$id = $this->session->userdata['user_data']['id'];

			// upload profile pic if submitted
			if (!empty($_FILES['profilepic']) && $_FILES['profilepic']['size'] > 0)
			{
				//get file name
				$file = basename($_FILES['profilepic']['name']);
				//get file extension
				$extension = substr($file, strripos($file, '.'));
				//change file name to comic id and add extension
				$file = $id.$extension;

				$config['file_name'] = $file;
				$config['upload_path'] = './assets/profilepics/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '250';
				$config['overwrite'] = TRUE;

				$this->load->library('upload', $config);

				$profilepic = 'profilepic';
				
				if ($this->upload->do_upload($profilepic))
				{
					$edit_profilepic = 'assets/profilepics/'.$file;

					$this->freeter_model->update_profilepic($id, $edit_profilepic);
				}
				else
				{
					$profilepic_fail = TRUE;
				}

			}
		
		
		if ($this->form_validation->run() == FALSE OR $profilepic_fail == TRUE)
		{
			$this->load->view('templates/header');
			$this->load->view('error_view');
			$this->load->view('templates/footer');
		}
		else
		{
			

			

			$edit_name = $this->input->post('editname');
			$edit_title = $this->input->post('edittitle');
			$edit_tel = $this->input->post('edittel');
			$edit_url = $this->input->post('editurl');
			$edit_bio = $this->input->post('editbio');
			$edit_tags = $this->input->post('tags');

			$new_tags = array();
			if($this->input->post('addtags')):
				$new_tags = explode(',', $this->input->post('addtags'));
			endif;

			foreach($new_tags as $key => $item)
			{
				$new_tags[$key] = trim($item);
			}

			//echo '<pre>';
			//echo print_r($edit_tags);
			//echo '</pre>';

			$this->freeter_model->update_user($id, $edit_name, $edit_title, $edit_tel, $edit_url, $edit_bio, $edit_tags, $new_tags);
			
			header('Location: '.base_url());

		}

	}

	public function login_user()
	{
		$this->form_validation->set_rules('email', 'Email address', 'strtolower|trim|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|sha1|callback_check_login');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('login_error');
			$this->load->view('templates/footer');
		}
		else
		{
			$session_id = $this->session->userdata['user_data']['id'];
			$data['logged_in_profile'] = $this->freeter_model->select_profile($session_id);

			header('Location: '.base_url());
			
			//$this->load->view('templates/logged_in_box', $data);

			//echo '<pre>';
			//echo print_r($data['logged_in_profile']);
			//echo '</pre>';
		}
	}

	function check_login($login_password)
	{
		$login_email = $this->input->post('email');

		$result = $this->freeter_model->login($login_email, $login_password);

		if($result)
		{
			$sess_array = array();
			foreach($result as $row)
			{
				$sess_array = array(
					'id' => $row->id,	
				);
				$this->session->set_userdata('user_data', $sess_array);
			}
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_login', 'Invalid email or password');
			return false;
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		
		header('Location: '.base_url());
	}

}

?>
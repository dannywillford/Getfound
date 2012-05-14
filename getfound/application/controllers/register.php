<?php

class Register extends CI_Controller {
	

	function __construct()
		{
			parent::__construct();
			$this->is_logged_in();
		}
		
	function index()
		{
				if ($this->is_logged_in())
					{
						redirect('members_area');
					}
				else
					{
						$data['main_content'] = 'register_form';
						$this->load->view('includes/template', $data);
					}
		}
		
	function create_member()
		{
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');

			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password]');
			
			$firstname = $this->input->post('first_name');
			
			if($this->form_validation->run() == FALSE)
				{
					$this->index();
				}
			else
				{
					
					$this->load->model('membership_model');
					if($query = $this->membership_model->create_member())
						{
							$data['main_content'] = 'signup_successful';
							$this->load->view('includes/template', $data);
							
						}
					else
						{
							$this->load->view('register_form');
						}
				}
		}
		
	function login()
		{
				if ($this->is_logged_in())
					{
						redirect('members_area');
					}
				else
					{
						$data['main_content'] = 'login_form';
						$this->load->view('includes/template', $data);
					}
		}
		
	function validate_credentials()
		{
			$this->load->model('membership_model');
			$query = $this->membership_model->validate();
			
			if($query)
				{
					$data = array(
						'username' => $this->input->post('username'),
						'is_logged_in' => true
							);
					
					$this->session->set_userdata($data);
					redirect('members_area');
				}
				
			else
				{
					$this->login();
				}
		}
		
	function is_logged_in()
		{
			$is_logged_in = $this->session->userdata('is_logged_in');
			
			if($is_logged_in)
				{
					return TRUE; 
				}
			else
				{
					return FALSE;
				}
		}
		
	function logout()
		{
			$this->session->sess_destroy();
			$this->index();
		}
}

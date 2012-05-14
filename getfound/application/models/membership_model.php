<?php

class Membership_model extends CI_Model {
	
	function create_member()
		{
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$firstinitial = $first_name[0];
			$secondinitial = $last_name[0];
			$initials = strtolower($firstinitial . $secondinitial);
			
			$query = $this->db->query("SELECT gfid FROM users WHERE initials = '$initials' ORDER by id DESC");
			$numrows = $query->num_rows();
			$row = $query->row_array();
			$plusone = "1";
			if ($numrows == 0)
				{
			$newtotal = '1';
				}
			else
				{
					$newtotal = $row['gfid'] + $plusone;
				}
			$lengthoftotal = strlen($newtotal);
				if ($lengthoftotal == "1")
				{
				$numstart = "00" . $newtotal;
				}
				
				if ($lengthoftotal == "2")
				{
				$numstart = "0" . $newtotal;
				}
				
				if ($lengthoftotal >= "3")
				{
				$numstart = $newtotal;
				}

			$username = $initials . $numstart;
			$email = $this->input->post('email_address');
			$new_member_insert_data = array(
				'initials' => $initials,
				'gfid' => $newtotal,
				'username' => $username,
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email_address' => $this->input->post('email_address'),
				'password' => md5($this->input->post('password'))
					);
					
			$insert = $this->db->insert('users', $new_member_insert_data);
			

			return $insert;
			$this->output->set_output($username);
		}
		
	function validate()
		{
			$this->db->where('username', $this->input->post('username'));
			$this->db->where('password', md5($this->input->post('password')));
			$query = $this->db->get('users');
			
			if($query->num_rows == 1)
				{
					return true;
				}
		}
		
	function update_user()
		{
			$facebook_raw = explode('/', $this->input->post('facebook'));
			$facebook_new = end($facebook_raw);
			$twitter_raw = explode('/', $this->input->post('twitter'));
			$twitter_new = end($twitter_raw);			
			$aboutme_raw = explode('/', $this->input->post('aboutme'));
			$aboutme_new = end($aboutme_raw);
			$linkedin_raw = explode('/', $this->input->post('linkedin'));
			$linkedin_new = end($linkedin_raw);
			
			
			$password = md5($this->input->post('password2'));
			$username = $this->session->userdata('username');
			$query = $this->db->query("SELECT * FROM users WHERE username = '$username'");
			$row = $query->row_array();
			$id = $row['id'];
			
			$newpassword = $this->input->post('password');
			if ($newpassword == '')
				{
					$newpassword = md5($this->input->post('password2'));
				}
			else
				{
					$newpassword = md5($this->input->post('password'));
				}
			
			if ($password == $row['password'])
				{
			$new_member_update_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'tagline' => $this->input->post('tagline'),
				'facebook' => $facebook_new,
				'linkedin' => $linkedin_new,
				'aboutme' => $aboutme_new,
				'twitter' => $twitter_new,
				'email_address' => $this->input->post('email_address'),
				'password' => $newpassword
					);
			$this->db->where('id', $id);		
			$insert = $this->db->update('users', $new_member_update_data);
			return $insert;
		}
			else
				{
					echo "incorrect password";
				}
		}
}
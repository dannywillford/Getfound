	
	<?php 		
		$subject = $this->input->post('subject');
		$from = $this->input->post('name');
		$message = $this->input->post('message');
		$email = $this->input->post('email');
		
		$this->email->from($email, $from);
		$this->email->to('contact@getfound.ly');		
		$this->email->subject($subject);		
		$this->email->message($message);
		
		$path = $this->config->item('server_root');
		

		
		if($this->email->send())
		{
		
			echo '<div id="userdata">Thank you for taking the time to contact us.  We will respond as soon as we can!</div>';
		}
		
		else
		{
			show_error($this->email->print_debugger());
		}
		
	?>
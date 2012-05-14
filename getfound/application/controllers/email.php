<?php

/**
* SENDS EMAIL WITH GMAIL
*/
class Email extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index() 
	{	
		
		$this->email->from('dannyfo@gmail.com', 'Getfound Contact');
		$this->email->to('dannyfo@gmail.com');		
		$this->email->subject('This is an email test');		
		$this->email->message('It is working. Great!');
		
		$path = $this->config->item('server_root');
		

		
		if($this->email->send())
		{
			echo 'Your email was sent, fool.';
		}
		
		else
		{
			show_error($this->email->print_debugger());
		}
	}
}


      
<div id="contact_form">
	<h1>Contact Us!</h1>
	
	<?php
	$name = array(
              'name'        => 'name',
              'id'          => 'name',
              'value'       => 'Name',
              'maxlength'   => '100',
			  'onclick'		=> "this.value='';",
			  'onfocus'		=> "this.value='';"
            );
			
	$subject = array(
              'name'        => 'subject',
              'id'          => 'subject',
              'value'       => 'Subject',
              'maxlength'   => '100',
			  'onclick'		=> "this.value='';",
			  'onfocus'		=> "this.value='';"
            );
			
	$email = array(
              'name'        => 'email',
              'id'          => 'email',
              'value'       => 'Email',
              'maxlength'   => '100',
			  'onclick'		=> "this.value='';",
			  'onfocus'		=> "this.value='';"
            );
			
	$message = array(
              'name'        => 'message',
              'id'          => 'message',
              'value'       => 'Message',
              'maxlength'   => '100',
			  'onclick'		=> "this.value='';",
			  'onfocus'		=> "this.value='';"
            );
	$contact_form_id = array('id'=>'contact_form_id');
	echo form_open('email', $contact_form_id);
	echo form_input($name);
	echo form_input($email);
	echo form_input($subject);
	echo form_textarea($message);
	echo form_submit('submit', 'Send');
	echo form_close();
	
	?>

</div>
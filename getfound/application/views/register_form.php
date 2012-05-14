		<div id="login"><?php echo anchor('login', 'Already a Member? Login!'); ?>
			</div>

<div id='register_form'>
<h1>Create an Account</h1>

<fieldset>
	<legend>Personal Information</legend>
		
	<?php
	$register_form_id = array('id'=>'register_form_id');
	echo form_open('create_member', $register_form_id);
	echo form_input('first_name', set_value('first_name', 'First Name'));
	echo form_input('last_name', set_value('last_name', 'Last Name'));
	echo form_input('email_address', set_value('email_address', 'Email Address'));
	
	echo form_input('password', set_value('password', 'Password'));
	echo form_input('password2', set_value('password2', 'Password Confirm'));
	
	echo form_submit('submit', 'Create Account');
	echo form_close();
	
	?>
	
	<?php echo validation_errors('<p class="error">'); ?>
		
</fieldset>

</div>
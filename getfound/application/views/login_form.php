<div id="login_form">
	<h1>Login!</h1>
	
	<?php
	$login_form_id = array('id'=>'login_form_id');
	echo form_open('validate_credentials', $login_form_id);
	echo form_input('username', 'Username');
	echo form_password('password', 'Password');
	echo form_submit('submit', 'Login');
	echo anchor('index', 'Sign Up!');
	echo form_close();
	
	?>
</div>
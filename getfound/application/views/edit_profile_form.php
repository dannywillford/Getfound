<div id='edit_profile_form'>
<h1>Edit Your Profile</h1>

<fieldset>
	<legend>User Information</legend>
		
	<?php
	
	$username = $this->session->userdata('username');
	$query = $this->db->query("SELECT * FROM users WHERE username = '$username'");
	$row = $query->row_array();
	
	$edit_profile_form_id = array('id'=>'edit_profile_form_id');
	echo form_open('update_user_info', $edit_profile_form_id);
		echo "<font size=1>First Name</font>";
	echo form_input('first_name', set_value('first_name', $row['first_name']));
		echo "<font size=1>Last Name</font>";
	echo form_input('last_name', set_value('last_name', $row['last_name']));
		echo "<font size=1>Title</font>";
	echo form_input('tagline', set_value('tagline', $row['tagline']));
		echo "<font size=1>Email</font>";
	echo form_input('email_address', set_value('email_address', $row['email_address']));
		echo "<font size=1>http://www.facebook.com/</font>";
	echo form_input('facebook', set_value('facebook', $row['facebook']));
		echo "<font size=1>http://www.linkedin.com/in/</font>";
	echo form_input('linkedin', set_value('linkedin', $row['linkedin']));
		echo "<font size=1>http://www.about.me/</font>";
	echo form_input('aboutme', set_value('aboutme', $row['aboutme']));
		echo "<font size=1>http://www.twitter.com/</font>";
	echo form_input('twitter', set_value('twitter', $row['twitter']));
		echo "<font size=1>New Password</font>";
	echo form_password('password', set_value('password', ''));
		echo "<font size=1>Confirm Old Password</font>";
	echo form_password('password2', set_value('password2', ''));

	
	echo form_submit('submit', 'Update');
	echo form_close();
	
	?>
	
	<?php echo validation_errors('<p class="error">'); ?>
		
</fieldset>

</div>
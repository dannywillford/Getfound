<html lang="en">
<head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" media="screen" charset="utf-8">
	<title>Getfound!</title>
</head>
<body>
	
	<div id="heading_bar">
		<div id="search">
				<?php
				
				$search_form_id = array('id'=>'search_form_id');
				echo form_open('search',$search_form_id);
				echo form_input('username',  set_value('username', '#gfid'));
				echo '&nbsp;';
				echo form_submit('search', 'Search');
				echo form_close();
				
				?>			
		</div>
		
		
		<?php
		
		if($this->session->userdata('username') != '')
			{
				?><div id="login">
				<?php echo anchor('edit_profile', 'Edit Profile'); ?>
				<?php echo "&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;"; ?>
				<?php echo anchor('members_area', 'View Profile'); ?>
				<?php echo "&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;" ?>
				<?php echo anchor('logout', 'Logout'); ?>
				<?php echo " "?></div>
				<?php
				
			}
		else
			{
				?><div id="login"><?php echo anchor('login', 'Already a Member? Login!'); ?></div>
		<?php
		
			}
		
		?>
		
		
		

			</div>
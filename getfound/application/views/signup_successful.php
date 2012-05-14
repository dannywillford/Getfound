<?php

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
					$newtotal = $row['gfid'];
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
	
			
			
			?>
			
			<div id="userdata">
				Thanks for registering!  Your #gfid is <b><?php echo $username; ?></b>!<br /><br />
				<center><?php echo anchor('login', 'Login!'); ?></center>
				</div>
				
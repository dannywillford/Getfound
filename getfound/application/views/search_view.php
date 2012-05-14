<?php
			$username = $this->input->post('username');
			$query=$this->db->query("SELECT * FROM users WHERE username = '$username'");
			$row = $query->row_array();
			$numrows = $query->num_rows();
			?>

	<div id="userdata">
	<?php
	if ($numrows == 0)
		{
			echo "User not found.  Please Try again!";
		}
	else
		{
	?>
<h2><?php echo $row['first_name']; ?>&nbsp;
<?php echo $row['last_name']; ?></h2>
<h3><?php echo $row['tagline']; ?></h3>
<h4><?php echo $row['email_address']; ?></h4><br />
<?php
if ($row['facebook'] != '')
	{
		echo '<a href="http://www.facebook.com/' . $row['facebook'] . '" target=_blank><img src="/images/facebook_button.png" border="0"></a>&nbsp;';
	}
if ($row['twitter'] != '')
	{
		echo '<a href="http://www.twitter.com/' . $row['twitter'] . '" target=_blank><img src="/images/twitter_button.png" border="0"></a>&nbsp;';
	}
if ($row['linkedin'] != '')
	{
		echo '<a href="http://www.linkedin.com/in/' . $row['linkedin'] . '" target=_blank><img src="/images/linkdin_button.png" border="0"></a>&nbsp;';
	}
if ($row['aboutme'] != '')
	{
		echo '<a href="http://www.about.me/' . $row['aboutme'] . '" target=_blank><img src="/images/aboutme_button.png" border="0"></a>';
	}
?>

<?php } ?>
	</div>
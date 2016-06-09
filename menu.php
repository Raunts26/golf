<ul>
	<?php
	if($page_file_name != "index.php") { ?>
	<li><a href="index.php">Golf in Estonia</a></li>
	<?php } else {  ?>
		<li> Golf in Estonia </li>
	<?php } ?>
	
	<?php
	if($page_file_name != "golftours.php") { ?>
	<li><a href="golftours.php">Golf and Culture Tours</a></li>
	<?php } else {  ?>
		<li> Golf and Culture Tours </li>
	<?php } ?>
	
	<?php
	if($page_file_name != "incentivetours.php") { ?>
	<li><a href="incentivetours.php">Culture and Incentive Tours</a></li>
	<?php } else {  ?>
		<li> Culture and Incentive Tours </li>
	<?php } ?>
	
	<?php
	if($page_file_name != "contact.php") { ?>
	<li><a href="contact.php">About us</a></li>
	<?php } else {  ?>
		<li> About us </li>
	<?php } ?>
	
</ul>
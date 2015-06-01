<?php 
	if (isset($_REQUEST['authcode']) ) {
		session_start();

		if (strtolower($_REQUEST['authcode'] ) == $_SESSION['authcode']) {
			echo 'RIGHT';
		}else{ 
			echo 'FALSE';
		}
		exit();
	}


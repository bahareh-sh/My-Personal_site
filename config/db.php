<?php
	require_once('config/config.php');
	// Creat connection:
	$conn= mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	// Check connection:
	if (mysqli_connect_errno()) {
		// failed
		echo 'failed to connect to mysqli'.mysqli_connect_errno();
	}
?>
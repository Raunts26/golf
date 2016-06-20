<?php

	if ($page_file == "admin.php" || $page_file == "ajax.php" || $page_file == "incentive.php" || $page_file == "culture.php") {
		require_once("../config.php");
	} else {
		require_once("config.php");
	}

  require_once("admin.class.php");
  require_once("register.class.php");
	require_once("user.class.php");
	require_once("ajax.php");

  $database = "vhost45490s1";

	session_start();

	$mysqli = new mysqli($servername, $server_username, $server_password, $database);

	$User = new User($mysqli);
  $Admin = new Admin($mysqli);
	$Register = new Register($mysqli);



  function cleanInput($data) {
  	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  	return $data;
  }


 ?>

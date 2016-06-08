<?php

	if ($page_file == "index.php") {
		require_once("../config.php");
	} else {
		require_once("../../config.php");
	}

  require_once("admin.class.php");
  require_once("register.class.php");
	require_once("user.class.php");

  $database = "if15_Turismiveeb";

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

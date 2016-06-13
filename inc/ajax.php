<?php
$page_file = "ajax.php";
$page_file_name = "";
require_once("functions.php");
//if(isset($_SESSION['logged_id'])) {

  if(isset($_POST['save_content'])) {

    $content = $_POST['editor1'];
    $id = $_POST['id'];

    $Admin->editPage("content", $content, $id); // 1 asendada IDga

  }

  if(isset($_POST['save_title'])) {
    $title = $_POST['title'];
    $id = $_POST['id'];
    
    $Admin->editPage("title", $title, $id); // 1 asendada IDga
  }

//}
?>

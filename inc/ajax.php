<?php
$page_file = "ajax.php";
$page_file_name = "";
require_once("functions.php");
//if(isset($_SESSION['logged_id'])) {

  if(isset($_POST['save_content'])) {

    $content = $_POST['editor1'];
    $Admin->editPage("content", $content, 1); // 1 asendada IDga

  }

  if(isset($_POST['save_title'])) {
    $title = $_POST['title'];
    echo 'siin';
    $Admin->editPage("title", $title, 1); // 1 asendada IDga
  }

//}
?>

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

    $Admin->editPage("title", cleanInput($title), cleanInput($id)); // 1 asendada IDga
  }

  if(isset($_GET['get_data'])) {
    $Register->getCulture(cleanInput($_GET['date']));
  }

  if(isset($_GET['get_events'])) {
    $Admin->getCulture();
  }

  if(isset($_GET['eventlist']) && isset($_GET['month']) && isset($_GET['year']) && isset($_GET['type'])) {
    $Register->getCultureEvents(cleanInput($_GET['month']), cleanInput($_GET['year']), cleanInput($_GET['type']));
  }

  if(isset($_GET['incentivelist']) && isset($_GET['month']) && isset($_GET['year']) && isset($_GET['type'])) {
    $Register->getIncentiveEvents(cleanInput($_GET['month']), cleanInput($_GET['year']), cleanInput($_GET['type']));
  }

//}
?>

<?php 
  require_once ("../header.php");
  $page_file_name = "Culture and Incentive Tours";
  $page_file = "incentive.php";
 ?>


<?php 
	require_once("../inc/admin.class.php");
	
	
    if(isset($_GET["logout"])){
        session_destroy();
        header("Location: index.php");
    }
	
	if(isset($_GET["update"])){
		updateIncentive($_GET["incentive_id"]);
	}
	
	$incentive_array = $Admin->getIncentive();
?>


<table border=1>

	<tr>
		<th>Name</th>
		<th>Information</th>
		<th>Place</th>
		<th>Date</th>
		<th>Time</th>
		<th>Created</th>
	</tr>


<?php 
	
	//ükshaaval läbi käia
	for($i=0; $i<count($incentive_array); $i++){
		
			//lihtne vaade
			echo "<tr>";
			echo "<td>".$incentive_array[$i]->name."</td>";
			echo "<td>".$incentive_array[$i]->text."</td>";
			echo "<td>".$incentive_array[$i]->place."</td>";
			echo "<td>".$incentive_array[$i]->date."</td>";
			echo "<td>".$incentive_array[$i]->time."</td>";
			echo "<td>".$incentive_array[$i]->created."</td>";
			echo "</tr>";
		
	}

?>

</table>


<?php
	// muutujad väärtustega
	$m = "";
	$name = "";
	$name_error = "";
	$text = "";
	$text_error = "";
	$place = "";
	$place_error = "";
	$date = "";
	$date_error = "";
	$time = "";
	$time_error = "";
	$created = "";
	$created_error = "";
	//echo $_SESSION ['logged_in_user_id'];
	
	// valideeri
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		if(isset($_POST["add_incentive"])){
				
			if (empty($_POST["name"]))  {
				$name = "";
			}else{
				$name = cleanInput($_POST["name"]);
			}
			
			if (empty($_POST["text"]))  {
				$text = "";
			}else{
				$text = cleanInput($_POST["text"]);
			}

			if (empty($_POST["place"]))  {
				$place = "";
			}else{
				$place = cleanInput($_POST["place"]);
			}
			
			if (empty($_POST["date"]))  {
				$date = "";
			}else{
				$date = cleanInput($_POST["date"]);
			}
			
			if (empty($_POST["time"]))  {
				$time = "";
			}else{
				$time = cleanInput($_POST["time"]);
			}
			
			$m=createIncentive($name, $text, $place, $date, $time);
				
		}
	}
	
	if(isset($_GET["delete"])){
		if(isset($_SESSION['logged_in_user_id'])){
			deleteIncentiveData($_GET["delete"]);
		}
	}

?>

<h2> Add a new incentive event </h2>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
  
	<label for="name"> Name </label>
  	<input id="name" name="name" type="text" value="<?=$name; ?>"> <?=$name_error; ?><br><br>
	
	<label for="text"> Information </label>
  	<input id="text" name="text" type="text" value="<?=$text; ?>"> <?=$text_error; ?><br><br>
	
	<label for="place"> Place </label>
  	<input id="place" name="place" type="place" value="<?=$place; ?>"> <?=$place_error; ?><br><br>
	
	<label for="date"> Date </label>
  	<input id="date" name="date" type="date" value="<?=$date; ?>"> <?=$date_error; ?><br><br>
	
	<label for="time"> Time </label>
  	<input id="time" name="time" type="time" value="<?=$time; ?>"> <?=$time_error; ?><br><br>
	
  	<input id="created" name="created" type="hidden" value="<?=$created; ?>"> <?=$created_error; ?><br><br>
	
  	<input type="submit" name="add_culture" value="Lisa">
	<p style="color:green;"><?=$m;?></p>
	
  </form>  

<?php 
 require_once ("../footer.php"); 
 ?>

 



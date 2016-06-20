<?php
$page_file_name = "Culture and Incentive Tours";
$page_file = "incentive.php";
require_once ("header.php");
?>
<?php
if(!isset($_SESSION['logged_id'])) {
	header("Location: ../index.php");
	exit();
}
?>


<?php
	if(isset($_POST["edit_incentive"])){
		$Admin->updateIncentiveData($_POST["edit_id"], $_POST["new_name"], $_POST["new_text"], $_POST["new_place"], $_POST["new_date"], $_POST["new_time"]);
	}

	$incentive_array = $Admin->getIncentive();
?>
<div class="content-admin">
<?php
//Success and error messages
if(isset($_SESSION['success'])) {
  echo '<div class="alert alert-success" role="alert">' . $_SESSION['success'] . '</div>';
  unset($_SESSION['success']);
} else if(isset($_SESSION['error'])) {
  echo '<div class="alert alert-danger" role="alert">' . $_SESSION['success'] . '</div>';
  unset($_SESSION['error']);
}
?>
<?php
	// variables
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

	// validation
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

			$Admin->createIncentive($name, $text, $place, $date, $time);

		}
	}



	if(isset($_SESSION['logged_id'])){
		if(isset($_POST["delete_incentive"])){
			$Admin->deleteIncentiveData($_POST["edit_id"]);
		}
	}


?>


<h2> Add a new incentive event </h2>

  <form class="form-horizontal custom-input-group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >

		<div class="form-group">
			<label for="name" class="col-sm-2 control-label"> Name </label>
			<div class="col-sm-6">
  			<input id="name" class="form-control" name="name" type="text" value="<?=$name; ?>"> <?=$name_error; ?>
  		</div>
  	</div>

		<div class="form-group">
			<label for="text" class="col-sm-2 control-label"> Information </label>
			<div class="col-sm-6">
				<textarea id="text" class="form-control" name="text" type="text" value="<?=$text; ?>"> <?=$text_error; ?></textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="place" class="col-sm-2 control-label"> Place </label>
			<div class="col-sm-6">
				<input id="place" class="form-control" name="place" type="place" value="<?=$place; ?>"> <?=$place_error; ?>
			</div>
		</div>

		<div class="form-group">
			<label for="date" class="col-sm-2 control-label"> Date </label>
			<div class="col-sm-6">
				<input id="date" class="form-control" name="date" type="date" value="<?=$date; ?>"> <?=$date_error; ?>
			</div>
		</div>

		<div class="form-group">
			<label for="time" class="col-sm-2 control-label"> Time </label>
			<div class="col-sm-6">
				<input id="time" class="form-control" name="time" type="time" value="<?=$time; ?>"> <?=$time_error; ?>
			</div>
		</div>


  	<!--<input id="created" name="created" type="hidden" value="<?=$created; ?>"> <?=$created_error; ?>-->

  	<div class="col-sm-8" style="padding-bottom:40px"><input type="submit" class="btn btn-success btn-form-send" name="add_incentive" value="Lisa">
	<p style="color:green;"><?=$m;?></p></div>

  </form>



<table class="table">

	<tr>
		<th>Name</th>
		<th>Information</th>
		<th>Place</th>
		<th>Date</th>
		<th>Time</th>
		<th>Created</th>
	</tr>


<?php

	for($i=0; $i<count($incentive_array); $i++){

			echo "<tr data-id='" . $incentive_array[$i]->id . "'>";
			echo "<td id='incentive_name_" . $incentive_array[$i]->id . "' data-id='" . $incentive_array[$i]->id . "'>" . $incentive_array[$i]->name . "</td>";
			echo "<td id='incentive_text_" . $incentive_array[$i]->id . "' data-id='" . $incentive_array[$i]->id . "'>" . $incentive_array[$i]->text . "</td>";
			echo "<td id='incentive_place_" . $incentive_array[$i]->id . "' data-id='" . $incentive_array[$i]->id . "'>" . $incentive_array[$i]->place . "</td>";
			echo "<td id='incentive_date_" . $incentive_array[$i]->id . "' data-id='" . $incentive_array[$i]->id . "'>" . $incentive_array[$i]->date . "</td>";
			echo "<td id='incentive_time_" . $incentive_array[$i]->id . "' data-id='" . $incentive_array[$i]->id . "'>" . $incentive_array[$i]->time . "</td>";
			echo "<td data-id='" . $incentive_array[$i]->id . "'>" . $incentive_array[$i]->created . "</td>";
			echo "</tr>";

	}

?>

</table>
</div>

<form action="incentive.php" method="post">
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1111">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Motivatsiooniürituse muutmine</h4>
				</div>
				<div class="modal-body">

					<input id="edit_id" type="hidden" name="edit_id">
					<span style="font-weight: 600">Nimi: </span><input id="new_name" name="new_name" class="form-control"><br>
					<span style="font-weight: 600">Kirjeldus: </span><textarea id="new_text" name="new_text" class="form-control"></textarea><br>
					<span style="font-weight: 600">Asukoht: </span><input id="new_place" name="new_place" class="form-control"><br>
					<span style="font-weight: 600">Kuupäev: </span><input id="new_date" type="date" name="new_date" class="form-control"><br>
					<span style="font-weight: 600">Aeg: </span><input id="new_time" type="time" name="new_time" class="form-control">

				</div>
				<div class="modal-footer">
					<button class="btn btn-danger pull-left" id="delete_incentive" name="delete_incentive">Kustuta</button>
					<button class="btn btn-default" id="cancel_incentive" name="cancel_incentive" data-dismiss="modal">Katkesta</button>
					<button class="btn btn-success" id="edit_incentive" name="edit_incentive">Salvesta</button>
				</div>
			</div>
		</div>
	</div>
</form>


<script>
	document.addEventListener("click", startEditing);

	function startEditing(e) {
		if(e.target.tagName === "TD") {
			var id = e.target.dataset.id;
			$('#myModal').modal('show');
			document.querySelector("#edit_id").value = id;
			document.querySelector("#new_name").value = document.querySelector("#incentive_name_" + id).innerHTML;
			document.querySelector("#new_text").value = document.querySelector("#incentive_text_" + id).innerHTML;
			document.querySelector("#new_place").value = document.querySelector("#incentive_place_" + id).innerHTML;
			document.querySelector("#new_date").value = document.querySelector("#incentive_date_" + id).innerHTML;
			document.querySelector("#new_time").value = document.querySelector("#incentive_time_" + id).innerHTML;

		}
	}

</script>



<?php
 require_once ("footer.php");
?>

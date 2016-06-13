<?php
class Admin {
	private $connection;

	function __construct($mysqli){
        $this->connection = ($mysqli);
    }


	function createCulture($name, $text, $place, $date, $time){

		$stmt = $this->connection->prepare("INSERT INTO cultural_events (name, text, place, date, time, created) VALUES (?,?,?,?,?,NOW())");
		$stmt->bind_param("sssss", $name, $text, $place, $date, $time);

		$message="";

		if ($stmt->execute()){
			$message="Edukalt andmebaasi salvestatud";

			$msg = "TestTEstTESATSATSAESATSATSA";
			$msg = wordwrap($msg,100);
			mail("raiko.lepik@hotmail.com","My subject",$msg);
		}

		$stmt->close();

		return $message;
	}


	function getCulture(){

        $stmt = $this->connection->prepare("SELECT id, name, text, place, date, time FROM cultural_events WHERE deleted IS NULL");
        $stmt->bind_result($id, $name, $text, $place, $date, $time);
        $stmt->execute();

		$array=array();

        while($stmt->fetch()){
			$culture=new StdClass();

			$culture->id=$id;
			$culture->name=$name;
			$culture->text=$text;
			$culture->place=$place;
			$culture->date=$date;
			$culture->time=$time;

			array_push($array, $culture);
			/*echo "<pre>";
			var_dump($array);
			echo "</pre><br><br><br><br><br><br>";*/
        }

		return $array;

        $stmt->close();
    }

	function deleteCultureData($cultural_events_id){

		//uuendan välja deleted, lisan date now
        $stmt = $mysqli->prepare("UPDATE cultural_events SET deleted=NOW() WHERE id=?");
        $stmt->bind_param("i", $cultural_events_id);
        $stmt->execute();

		//tühjendame aadressirea
		header("Location:culture.php");

		$stmt->close();

	}

	function updateCultureData($cultural_events_id, $cultural_events_name, $cultural_events_text, $cultural_events_place, $cultural_events_date, $cultural_events_time){


        $stmt = $mysqli->prepare(" UPDATE cultural_events SET name = ?, text = ?, place = ?, date = ?, time = ?, created = NOW() WHERE id = ?;");
        $stmt->bind_param("isssss", $cultural_events_id, $cultural_events_name, $cultural_events_text, $cultural_events_place, $cultural_events_date, $cultural_events_time);
        $stmt->execute();

		header("Location:culture.php");

		$stmt->close();

	}

	function createIncentive($name, $text, $place, $date, $time){

		$stmt = $this->connection->prepare("INSERT INTO incentive_events (name, text, place, date, time, created) VALUES (?,?,?,?,?,NOW());");
		$stmt->bind_param("sssss", $name, $text, $place, $date, $time);

		$message="";

		if ($stmt->execute()){
			$message="Edukalt andmebaasi salvestatud";
		}

		$stmt->close();

		return $message;
	}


	function getIncentive(){

        $stmt = $this->connection->prepare("SELECT id, name, text, place, date, time FROM incentive_events WHERE deleted IS NULL");
        $stmt->bind_result($id, $name, $text, $place, $date, $time);
        $stmt->execute();

		$array=array();

        while($stmt->fetch()){
			$incentive=new StdClass();

			$incentive->id=$id;
			$incentive->name=$name;
			$incentive->text=$text;
			$incentive->place=$place;
			$incentive->date=$date;
			$incentive->time=$time;

			array_push($array, $incentive);
			/*echo "<pre>";
			var_dump($array);
			echo "</pre><br><br><br><br><br><br>";*/
        }

		return $array;

        $stmt->close();
    }

	function deleteIncentiveData($incentive_events_id){

		//uuendan välja deleted, lisan date now
        $stmt = $mysqli->prepare("UPDATE incentive_events SET deleted=NOW() WHERE id=?");
        $stmt->bind_param("i", $incentive_events_id);
        $stmt->execute();

		//tühjendame aadressirea
		header("Location:incentive.php");

		$stmt->close();

	}

	function updateIncentiveData($incentive_events_id, $incentive_events_name, $incentive_events_text, $incentive_events_place, $incentive_events_date, $cincentive_events_time){


        $stmt = $mysqli->prepare("UPDATE incentive_events SET name = ?, text = ?, place = ?, date = ?, time = ?, created = NOW() WHERE id = ?;");
        $stmt->bind_param("isssss", $incentive_events_id, $incentive_events_name, $incentive_events_text, $incentive_events_place, $incentive_events_date, $incentive_events_time);
        $stmt->execute();

		header("Location:incentive.php");

		$stmt->close();

	}

	function showPage($page) {
		$stmt = $this->connection->prepare("SELECT id, title, content FROM pages WHERE id = ?");
		$stmt->bind_param("i", $page);
		$stmt->bind_result($id, $title, $content);
		$stmt->execute();


		if($stmt->fetch()) {
			$object = new stdClass();
			$object->id = $id;
			$object->title = $title;
			$object->content = $content;
		}

		return $object;
	}


	function editPage($what, $content, $page) {
		# what = content / name
		if($what == "content") {
			$stmt = $this->connection->prepare("UPDATE pages SET content = ? WHERE id = ?");
		} else if($what == "title") {
			$stmt = $this->connection->prepare("UPDATE pages SET title = ? WHERE id = ?");
		} else {
			return "viga!";
			exit();
		}

		$stmt->bind_param("si", $content, $page);

		if($stmt->execute()) {

		} else {


		}

		Header("Location: " . $_SERVER['PHP_SELF']);
	}


}
?>

<?php
class Register {
	private $connection;

	function __construct($mysqli){
        $this->connection = ($mysqli);
    }

		function getCulture($date){

			$stmt1 = $this->connection->prepare("SELECT id, name, text, place, date, time, created FROM cultural_events WHERE deleted IS NULL AND date = ?");
			$stmt2 = $this->connection->prepare("SELECT id, name, text, place, date, time, created FROM incentive_events WHERE deleted IS NULL AND date = ?");

			$stmt1->bind_param("s", $date);
			$stmt2->bind_param("s", $date);

			$stmt1->bind_result($id, $name, $text, $place, $date, $time, $created);
			$stmt2->bind_result($id2, $name2, $text2, $place2, $date2, $time2, $created2);

			$stmt1->execute();
			$stmt2->execute();

			$array=array();

			while($stmt1->fetch()){
				$culture=new StdClass();

				$culture->id=$id;
				$culture->name=$name;
				$culture->text=$text;
				$culture->place=$place;
				$culture->date=$date;
				$culture->time=$time;
				$culture->created=$created;

				array_push($array, $culture);
				/*echo "<pre>";
				var_dump($array);
				echo "</pre><br><br><br><br><br><br>";*/
				}

				while($stmt2->fetch()){
					$culture=new StdClass();

					$culture->id=$id2;
					$culture->name=$name2;
					$culture->text=$text2;
					$culture->place=$place2;
					$culture->date=$date2;
					$culture->time=$time2;
					$culture->created=$created2;

					array_push($array, $culture);
					/*echo "<pre>";
					var_dump($array);
					echo "</pre><br><br><br><br><br><br>";*/
					}

			echo json_encode($array);
			return $array;

					$stmt->close();
			}

			function getCultureEvents($month, $year, $type){
						$begin = $year . "-" . $month . "-00" ;
						$end = $year . "-" . $month . "-31";
						if($type == "All") {
							$stmt = $this->connection->prepare("SELECT id, name, type, text, place, date, time, created FROM cultural_events WHERE deleted IS NULL AND date BETWEEN '$begin' AND '$end'");
						} else {
							$stmt = $this->connection->prepare("SELECT id, name, type, text, place, date, time, created FROM cultural_events WHERE deleted IS NULL AND type = '$type' AND date BETWEEN '$begin' AND '$end'");
						}

						$stmt->bind_result($id, $name, $type, $text, $place, $date, $time, $created);
						$stmt->execute();



				$array=array();

				while($stmt->fetch()){
					$culture=new StdClass();

					$culture->id=$id;
					$culture->name=$name;
					$culture->type=$type;
					$culture->text=$text;
					$culture->place=$place;
					$culture->date=$date;
					$culture->time=$time;
					$culture->created=$created;

					array_push($array, $culture);
					/*echo "<pre>";
					var_dump($array);
					echo "</pre><br><br><br><br><br><br>";*/
				}

				echo json_encode($array);
				return $array;


						$stmt->close();
				}

			function registerCulture($name, $email, $phone, $people, $days, $hotel, $events, $info) {
				$stmt = $this->connection->prepare("INSERT INTO cultural_registration (name, email, phone, people, days, hotel, events, info, created) VALUES (?,?,?,?,?,?,?,?,NOW())");
				$stmt->bind_param("ssssssss", $name, $email, $phone, $people, $days, $hotel, $events, $info);

				if ($stmt->execute()){
					$_SESSION['success'] = "Success! We'll contact you within 48 hours, stand by!";
				} else {
					$_SESSION['error'] = "Oops! Something broke, report to site administrator!";
				}

				header("Location: golftours.php");

				//header("Location: golftours.php");
				exit();

				$stmt->close();
			}

			function registerIncentive($name, $email, $phone, $people, $days, $hotel, $events, $info) {
				$stmt = $this->connection->prepare("INSERT INTO incentive_registration (name, email, phone, people, days, hotel, events, info, created) VALUES (?,?,?,?,?,?,?,?,NOW())");
				$stmt->bind_param("ssssssss", $name, $email, $phone, $people, $days, $hotel, $events, $info);

				if ($stmt->execute()){
					$_SESSION['success'] = "Success! We'll contact you within 48 hours, stand by!";
				} else {
					$_SESSION['error'] = "Oops! Something broke, report to site administrator!";
				}

				header("Location: incentivetours.php");
				exit();

				$stmt->close();
			}

			function getIncentiveEvents($month, $year, $type){
				$begin = $year . "-" . $month . "-00" ;
				$end = $year . "-" . $month . "-31";
				if($type == "All") {
					$stmt = $this->connection->prepare("SELECT id, name, type, text, place, date, time, created FROM incentive_events WHERE deleted IS NULL AND date BETWEEN '$begin' AND '$end'");
				} else {
					$stmt = $this->connection->prepare("SELECT id, name, type, text, place, date, time, created FROM incentive_events WHERE deleted IS NULL AND type = '$type' AND date BETWEEN '$begin' AND '$end'");
				}

				$stmt->bind_result($id, $name, $type, $text, $place, $date, $time, $created);
				$stmt->execute();



				$array=array();

				while($stmt->fetch()){
					$incentive=new StdClass();

					$incentive->id=$id;
					$incentive->name=$name;
					$incentive->type=$type;
					$incentive->text=$text;
					$incentive->place=$place;
					$incentive->date=$date;
					$incentive->time=$time;
					$incentive->created=$created;

					array_push($array, $incentive);
				}

				echo json_encode($array);
				return $array;


				$stmt->close();
			}




}
?>

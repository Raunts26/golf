<?php
class User {

    private $connection;

    function __construct($mysqli){
        $this->connection = $mysqli;
    }

	###############
	#####LOGIN#####
	###############



	function logInUser($user, $hash){
		$response = new StdClass();
    #Checks if user and password are correct
		$stmt = $this->connection->prepare("SELECT id FROM users WHERE username=? AND password=?");
		$stmt->bind_param("ss", $user, $hash);
		$stmt->bind_result($id);
		$stmt->execute();
    #False
		if(!$stmt->fetch()) {

			$error = new StdClass();
			$error->id = 0;
			$error->message = "Vale kasutaja/parool!";
			$response->error = $error;

			return $response;
		}
		$stmt->close();
		#Creating new session
    $stmt = $this->connection->prepare("SELECT id, username FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $user, $hash);
    $stmt->bind_result($id, $username);
    $stmt->execute();
    if($stmt->fetch()){

  		$_SESSION['logged_id'] = $id;
  		$_SESSION['logged_user'] = $username;

  		header("Location: ../index.php");
  		exit();
      }

      $stmt->close();

    }


}



?>

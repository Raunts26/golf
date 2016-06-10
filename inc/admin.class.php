<?php
class Admin {
	private $connection;

	function __construct($mysqli){
        $this->connection = ($mysqli);
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

<?php

// my database class

class Db {
	
	public $mysql;
	
	function __construct() {
		$this->mysql = new mysqli('localhost', 'root', '', 'todo') or die("problem");
	}
	
	function delete_by_id($id) {
		$query = "DELETE from todo WHERE id = $id";
		$result = $this->mysql->query($query) or die("There was a problem");
		
		if($result) return 'yay!';
	}
	
	function update_by_id($id, $description) {
		$query = "UPDATE todo
		         SET description = ?
				 WHERE id = ?
				 LIMIT 1";
				 
		 if($stmt = $this->mysql->prepare($query)) {
		 	$stmt->bind_param('si', $description, $id);
			$stmt->execute();
			return "good job!";
		 }
	}
	
} // end class



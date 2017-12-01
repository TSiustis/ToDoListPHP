
<html>
	<head>
		<title>ToDo List</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="script.js"></script>
		
		
		
	</head>
	<body>

	<div id="container" >
		<h1>ToDo List</h1>
		
		<ul id="tabs" >
			<li id="todo_tab" class="selected" class="list-group" ><a href="#" >ToDo</a></li>
		</ul>
		
		<div id="main" class="rounded">
			
			<div id="todo" class = "rounded">
				<?php
				
				require 'db.php';
				$db = new Db();
				$query = "SELECT * FROM todo ORDER BY id asc";
				$results = $db->mysql->query($query);
				
				if($results->num_rows) {
					while($row = $results->fetch_object()) {
						$title = $row->title;
						$desc = $row->description;
						$id = $row->id;
						
				echo '<div class="item rounded" >';
				
				$data = <<<EOD

<h4>$title</h4>

<p>$desc</p>

<input type="hidden" name="id" id="id" value="$id" />

<div class="options rounded">
	<a class="delete" href="delete.php?id=$id">Delete</a>
	<a class="edit" href="#">Edit</a>
</div>

EOD;
						echo $data;
						echo '</div>';
					} // end while
				}
				else {
					echo "<p>There are zero items. Add one now! </p>";
				}	
				?>
			</div>
			
			<div id="add" class = "rounded">
				<h3>Add New Entry</h2>
				<hr/>
				<form action="addItem.php" method="post">
					<div class="form-group">
						<label for="title"> Title</label>
						<input type="text" name="title" id="title" class="input"/>
					</div>
				
					<div class="form-group">
						<label for="description"> Description</label>
						<textarea name="description" id="description" rows="10" cols="35"></textarea>
					</div>
					
					<p>
						<button type="submit" name="addEntry" id="addEntry" class = "btn btn-light" value = "AddNewEntry" >Add New Entry</button>
					</p>
				</form>
			</div>
			
		</div>
	</div>


	</body>
</html>

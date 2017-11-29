<?php

require 'db.php';
header("Location: index.php");
$db = new Db();
$response = $db->delete_by_id($_GET['id']);



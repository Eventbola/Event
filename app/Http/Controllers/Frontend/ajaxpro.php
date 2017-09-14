<?php

define (DB_USER, "root");
define (DB_PASSWORD, "");
define (DB_DATABASE, "test");
define (DB_HOST, "localhost");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DABASE);

$sql = "SELECT items.title FROM items 
			WHERE title LIKE '%".$_GET['query']."%'
			LIMIT 10";
$result = $mysqli->query($sql);

$json = [];
while($row = $result->fetch_assoc()){
    $json[] = $row['title'];
}

echo json_encode($json);
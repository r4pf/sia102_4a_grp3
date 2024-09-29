<?php

$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'ustay';


$conn = mysqli_connect(hostname: $server, username: $user, password: $pass) or die ('Could not connect to server ... \n'.mysqli_connect_error());


$selected_db = mysqli_select_db(mysql: $conn, database: $db);

if (!$selected_db) {
  die ('Could not connect to database: ' . mysqli_error(mysql: $conn));
}
?>

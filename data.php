<?php
session_start();
require 'views/views.lib';
$conn = db();

$result = $conn->query("SELECT * FROM instructor WHERE username='".$_SESSION['username']."'");
$user = $result->fetch_all(MYSQLI_ASSOC);
$result = $conn->query("SELECT crn, name FROM class WHERE instructor='".$_SESSION['username']."'");
$class = $result->fetch_all(MYSQLI_ASSOC);
$data = ["user" => $user[0], "class" => $class];
echo (json_encode($data));
?>

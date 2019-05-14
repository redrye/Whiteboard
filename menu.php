<?php
	session_start();
	require 'views/views.lib';
	$conn = db();
	$query = "SELECT * FROM menu WHERE user='".$_SESSION["username"]."'";
	$result = $conn->query($query);
	$data = $result->fetch_all(MYSQLI_ASSOC);
	echo json_encode($data);
?>

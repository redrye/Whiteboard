<?php

session_start();
require('views/views.lib');
$conn = db();
$crn = $_SESSION['crn'];
// Create connection
if (!isset($_POST['newAssignmentName'])) {
    	header("Location: #grades.php?crn=".$crn);
    	exit();
}
$assignment = $_POST['newAssignmentName'];
$sql = "SELECT student FROM register WHERE crn='".$crn."' ORDER BY student";
$results = $conn->query($sql);
$students = $results->fetch_all(MYSQLI_ASSOC);

foreach($students as $key => $value) {
    $query = "insert into grades values('".$crn."', '".$assignment."','','','".$value['student']."'";
           
}
$conn->close();
// header("Location: index.php#assignments.php?crn=".$crn);
//exit();
?>
</body>
</html>


//NEW ASSIGNMENT GET GRADES
<?php

start_session();

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "userdb";
$crn = $_GET['crn'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/*
	INPUT NEW GRADES USING TEXTBOXES FORMATTED INTO A TABLE
*/

//Class to register grades for


//SELECT STUDENTs ONLY REGISTERED TO THE CLASS
$sql = "SELECT DISTINCT student FROM class WHERE instructor='".$_SESSION['username']."'";
$students = $conn->query($sql);

if ($students->num_rows > 0) {
	echo "<form action='registerGrades.php' method='post'>";
	
	echo "Please Input the name of the New Assignment. <br>";
	echo "Assignment Name:  <input type='text' name='newAssignmentName'><br><br>";
	
	echo "<table><tr><th>STUDENT</th><th>ASSIGNMENT GRADE</th></tr>";
	
	// Print student name and create textbox pairs
	while($row = $students->fetch_assoc()) {
		echo "<tr><td>" .$row["user_id"] ."</td><td>" ."<input type='text' name='" .$row["grade"] ."'\"</td></tr>";
	}
	echo "</table><br>";
	
	echo "<input type='submit' class='btn btn-primary' value='Submit Grades'></form>";
} 
else {
	echo "0 results";
}


$conn->close();
?>

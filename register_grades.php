<?php session_start(); ?>
<?php
require 'views/views.lib';
$crn = $_SESSION['crn'];
// Create connection
$conn = db();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if (!isset($_POST['grade'])) {
    	header("Location: index.php#grades.php?crn=".$crn);
    	exit();
}

//SELECT Students in class to input new grades from getNewAssignment.php
$sql = "SELECT student FROM register WHERE crn='".$crn."' ORDER BY student";
$students = $conn->query($sql);
$grades = array_values($_POST['grade']);
$i = 0;
if ($students->num_rows > 0) {						
	// Register new grades into grades table
	while($row = $students->fetch_assoc()) {
		

		$sqlInsert = "INSERT INTO grades VALUES ('" 
			.$crn."', '"
			.$_POST['newAssignmentName']."', '"
			.$grades[$i++]."', '"
			.$_SESSION['username']."', '"
			.$row["student"]."'
				)";
		
		if($conn->query($sqlInsert) === TRUE){
			//Do Nothing Insert was successful
		}
		else{
			echo "Error registering grades: " .$conn->error;
		}
	}
	
	echo "Grades Registered Succesfully";
	header("Location: index.php#grades.php?crn=".$crn);
    exit();
} 
else {
	echo "0 results";
}

$conn->close();
?>
</body>
</html>


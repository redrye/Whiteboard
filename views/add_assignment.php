<?php session_start(); ?>
<html>
  <!-- Icons -->
  <link href="../css/font-awesome.min.css" rel="stylesheet">
  <link href="../css/simple-line-icons.css" rel="stylesheet">

  <!-- Main styles for this application -->
  <link href="../css/style.css" rel="stylesheet">
  <!-- Styles required by this views -->

<body>
      <div class="container-fluid">
        <div class="animated fadeIn">

          <div class="row">
            <div class="col-sm-auto col-md-auto">
              <div class="card card-accent-primary">
<?php
require('views.lib');
$crn = $_SESSION['crn'];
// Create connection
$conn = db();

$sql = "SELECT DISTINCT student FROM register WHERE crn='".$_SESSION['crn']."' ORDER BY student";
$students = $conn->query($sql);

if ($students->num_rows > 0) {
echo "<div class='nav '><form method='POST' action='register_assignment.php?crn='".$crn."'>
				<div class='card-header'>Grades ".$_SESSION['crn']."<input type='submit' class='btn btn-primary btn-sm float-right' value='Done'></div>
				<div class='card-body'>
<table class='table'>";
	
	echo "<table class='table'><tr><th>Assignment: </th><th><input type='text' placeholder='New Assignment Name' name='newAssignmentName'>";	
	echo "</table><br>";
	echo"</form>";
} 
else {
	echo "0 results";
}


$conn->close();
?>
</div>
</div>
</div>
</div>
</body>
</html>


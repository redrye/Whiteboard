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
echo "<form method='POST' action='register_grade.php'>
				<div class='card-header'>Grades ".$_SESSION['crn']."<input type='submit' class='btn btn-primary btn-sm float-right' value='Submit Grades'></div>
				<div class='card-body'>
<table class='table'>";
	// Print student name and create textbox pairs
	
    $assignments = $conn->query("CALL gradebook(".$crn.")");
    $gradebook = $assignments->fetch_all(MYSQLI_ASSOC);
    $input = array();
    foreach($gradebook as $array) {
        $input[$array["Student"]] = array();
        foreach($array as $key=>$value) {
            if($key == 'Student') continue;
            $input[$array['Student']][$key] = $value;
        }
    }
    
//    echo json_encode($input);
    echo '<tr>';
		foreach($gradebook[0] as $assignment=>$grade) {
            echo '<th>'.$assignment.'</th>';
        }
		echo '</tr>';
		foreach($gradebook as $student) {
            $s = $student["Student"];
            echo '<tr><td>'.$s.'</td>';
            foreach($student as $assignment=>$grade) {
                if($assignment == "Student") continue;
                echo '<td><input type=text size=3 name=grades['.$s.']['.str_replace(" ", "_", $assignment).'] value="'.$grade.'"></td>';
            }
            echo '</tr>';
		}
    	echo "</table>";
	
//	while($row = $students->fetch_assoc()) {
//		echo "<tr><td>" .$row['student'] ."</td><td>" ."<input type='text' name='grade[]'</td></tr>";
//	}
//	echo "</table><br>";
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


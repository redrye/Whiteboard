<?php
    session_start();
    require 'views.lib';
    ?>
          <div class="row">
            <div class="col-sm-auto col-md-auto">
              <div class="card card-accent-primary">
                  <?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";
$crn = $_GET['crn'];
$_SESSION['crn'] = $crn;
// Create connection
$conn = db();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql_student = "SELECT assignment, grade FROM grades WHERE student='".$_SESSION['username']."' AND crn='".$crn."'";
$sql_instructor = "SELECT instructor FROM class WHERE instructor='".$_SESSION['username']."' AND crn='".$crn."'";

if ($result = $conn->query($sql_student)) {
	if($result->num_rows > 0) {
        
        $avgSQL = "select sum(grade * weight)/sum(over) FROM (select grade, weight, weight as over from grades where student='".$_SESSION['username']."' AND crn='".$crn."' group by grade) a";
        
        $getAvg = $conn->query($avgSQL);
        
        $grade = $getAvg->fetch_assoc();
		echo "<div class='card-header'>Grades   Avg: ".$grade['sum(grade * weight)/sum(over)']."</div><div class='card-body'><table class='table'><tr><th>Assignment</th><th>Grade</th></tr>";

 	    // output data of each row
    	while($row = $result->fetch_assoc()) {
    	    echo "<tr><td>".$row['assignment']."</td><td>".$row['grade']."</td></tr>";
    	}
    	echo "</table></form>";

	}
} 
if ($resulti = $conn->query($sql_instructor)) {
	if($resulti->num_rows > 0) {
        echo "<div class='card-header'>Gradebook: ".$crn."<ul class='nav float-right'><li class='nav-item'><a class='nav-link btn btn-primary'  href='edit_grades.php?crn=".$crn."' >Edit Grades</a></li></ul></div>
				<div class='card-body'>
<table class='table'>";
	    
        $assignments = $conn->query("CALL gradebook(".$crn.")");
        $gradebook = $assignments->fetch_all(MYSQLI_ASSOC);
		echo '<tr>';
		foreach($gradebook[0] as $assignment=>$grade) {
            echo '<th>'.$assignment.'</th>';
        }
		echo '</tr>';
		foreach($gradebook as $student) {
            echo '<tr>';
            foreach($student as $assignment=>$grade) {
                echo '<td>'.$grade.'</td>';
            }
            echo '</tr>';
		}
    	echo "</table>";


}
}

		$conn->close();
?>
                </div>

            <!--/.col-->
           


      <!-- /.conainer-fluid -->

    <!-- Bootstrap and necessary plugins -->
    <!-- Plugins and scripts required by this views -->
    <script>
    $(#new_assignment).click(function() {
    href='add_assignment.php?crn=".$crn."'
    });
    </script>

</body>

</html>

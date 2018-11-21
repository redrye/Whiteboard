<?php
    session_start();
    require('views.lib');
    ?>
      <div class="container-fluid">
        <div class="animated fadeIn">

          <div class="row">
            <div class="col-sm-auto col-md-auto">
              <div class="card card-accent-primary">
                  <?php


$conn = db();
echo "<div class='card-header'>Class Registration</div><div class='card-body'>";
$query = $conn->query("SELECT * FROM instructor WHERE username='".$_SESSION['username']."'");
if($query->num_rows == 1) {
echo "<form action='views/register_class.php' method='GET'>
        <input type='text' placeholder='crn' name='crn'>
        <select type='select' name='name'>
            <option value=''>Select Name</option>";
            $option = $conn->query("SELECT name FROM course");
            while($row=$option->fetch_assoc()) {
                echo "<option value='".$row['name']."'>".$row['name']."</option>";
            }
echo    "</select>
        <input type='submit' value='Register'>
    </form>";
} else {
echo "<div class='card-header'>Class Registration</div><div class='card-body'><table class='table'><tr><th>Course ID</th><th>Class</th><th>Instructor</th><th></th></tr>";
$sql = "select * from class where (crn not in (select crn from register where student='".$_SESSION['username']."'))";
if ($result = $conn->query($sql)) {
	if($result->num_rows > 0) {
 	    // output data of each row
    	while($row = $result->fetch_assoc()) {
    	    echo "<tr><td>".$row['crn']."</td><td>".$row['name']."</td><td>".$row['instructor']."</td><td><input type='hidden' name=crn value='".$row['crn']."'><ul class='nav'><li class='nav-item'><a class = 'nav-link btn-primary' href='register_class.php?crn=".$row['crn']."&name=".$row['name']."'>Add</a></li></ul></td></tr>";
    	}
    	echo "</table>";

	}
}

		$conn->close();
    }
?>
                </div>
              </div>
            </div>
            <!--/.col-->
           

      </div>
      <!-- /.conainer-fluid -->

    <!-- Plugins and scripts required by this views -->

</body>

</html>

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
foreach ($_POST as $data) {
    foreach ($data as $key=>$array) {
        $student = $key;
        foreach($array as $assignment=>$grade) {
    //        echo $student." ".str_replace('_', ' ', $assignment)." ".$grade."<br/>";
            $sql = "UPDATE grades SET grade=".$grade." WHERE assignment='".str_replace('_', ' ', $assignment)."' AND crn=".$crn." AND student='".$student;
            $conn->query($sql);
        }
    }
}
header("location:grades.php&crn=".$crn);


$conn->close();
?>
</body>
</html>


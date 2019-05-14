<?php
    session_start();
    require('views.lib');
    $crn = $_GET['crn'];

$crn = $_GET['crn'];
$_SESSION['crn'] = $crn;
// Create connection
$conn = db();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $result = $conn->query("SELECT * FROM announcement WHERE crn=".$crn);
    $announcements = $result->fetch_all(MYSQLI_ASSOC);
    foreach($announcements as $announcment) {
        echo '<div class="row">
          <div class="col-sm-auto col-md-auto">
          <div class="card card-accent-primary">';
        echo '<div class="card-header">'.$announcment['date'].'</div>';
        echo '<div class="card-body">'.$announcment['message'].'</div>';
        echo '</div>
                </div>
                </div>';
    }
    
?>

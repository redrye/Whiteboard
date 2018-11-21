<?php
    session_start();
    require('views.lib');
    $crn = $_GET['crn'];
    $name = $_GET['name'];
    $conn = db();
    $query = $conn->query("SELECT * FROM instructor WHERE username='".$_SESSION['username']."'");
    if($query->num_rows == 1) {
            register_class($crn, $name);
    } else {
        register_student();
    }
    $conn->close();
?>

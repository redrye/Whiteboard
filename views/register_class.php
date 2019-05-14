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
        $sql = "SELECT name FROM class WHERE crn=".$crn;
        $query = $conn->query($sql);
        if($query->num_rows == 1) {
            $result = $query->fetch_all(MYSQLI_ASSOC);
            $name = $result[0]['name'];
            $sql = "INSERT INTO register VALUES (".$crn.", '".$name."', '".$_SESSION['username']."')";
            $conn->query($sql);
            echo "<script>function redirect(url){ 
                window.location=url; 
            }
            redirect('index.php');</script>";
        }
    }
    $conn->close();
?>

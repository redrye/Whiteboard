<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "userdb";
    $crn = $_SESSION['crn'];
    
    echo '<form action="assignment_upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Submit" name="submit">
        </form>';


?>

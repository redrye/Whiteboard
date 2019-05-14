<?php
    session_start();
    require('views.lib');
    $crn = $_SESSION['crn'];
    
    $conn = db();
    echo '<form action="assignment_upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Submit" name="submit">
        </form>';


?>

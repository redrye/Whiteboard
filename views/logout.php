<?php
  session_start();

  $message = "";

  // Destroy the session.
  session_destroy();
   echo "<script>function redirect(url){ 
                window.location=url; 
            }
            redirect('index.php');</script>";
  exit;
?>

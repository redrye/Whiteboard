<?php
  session_start();

  $message = "";

  // Destroy the session.
  session_destroy();
  header("Location: ../login.php");
  exit;
?>

<?php
    require 'php/authentication.lib';
    require 'php/db.lib';
    if(!$connection = @ mysqli_connect("localhost", "root", "","userdb"))
        die("Cannot connect to database");
    
    // Clean data from login
    
$username = $_POST['username'];
$password = $_POST['password'];
        
    session_start();
    // Validate username and password
    if (authenticateUser($connection, $username, $password)) {
        $_SESSION["username"] = $username;
        $_SESSION["loginIP"] = $_SERVER["REMOTE_ADDR"];
        header("Location: index.php");
        
    }
    else {
        header("Location: login.php");
        exit;
        }
?>

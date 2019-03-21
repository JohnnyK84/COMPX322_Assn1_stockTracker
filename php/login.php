<?php

	session_start();

	require_once("connect.php");

	$username = $_POST['username'];
    $password = $_POST['password'];
    
    try {
        $query = "SELECT * FROM User WHERE username = '$username' && password = '$password'";
        $result = $conn->query($query);
        $row = $result->fetch();

        if ($row == null) {
            echo false;
        }else{
            echo true;    
        }

    }catch(PDOException $e){
        echo "Error Something Went Wrong: " . $e->getMessage();
    }

?>
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
            echo "<br> wrong Login username or password, please try again";
        }else{
            echo " <br> Login was succesful, hello " . $username ;
            $_SESSION["username"] = $username;     
        }

    }catch(PDOException $e){
        echo "Error Something Went Wrong: " . $e->getMessage();
    }

?>
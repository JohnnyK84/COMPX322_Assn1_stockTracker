<?php require_once("connect.php");

    $array = $_POST['stocksArr'];
    $stocksArr = explode(",",$array);
    $username = $_POST['username'];
    //echo print_r($stocksArr);

    //loop to iterate over array of selected stocks and insert each stock id into userstocks table
    foreach ($stocksArr as $value) {
        //echo "$value <br>";
        $query = "INSERT INTO userstocks (username, stockid) 
        values ('$username', $value)";
        
        if ($conn->query($query) == TRUE) {
            //do nothing
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    };
?>
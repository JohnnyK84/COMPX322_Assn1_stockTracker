<?php require_once("connect.php");

    $jsarray = $_POST['stocksArr'];
    $array = explode(' ', $jsarray);
    $query = "INSERT ";
    $counter = 0;
    echo count($array);
    foreach ($array as $value) {
        echo "<p>".$value."</p>";
        echo "<br>";
        $counter++;
        echo $counter;
    };
?>
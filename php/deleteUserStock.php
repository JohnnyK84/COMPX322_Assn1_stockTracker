<?php require_once("connect.php");

    $stockId = $_POST['stockId'];
    $username = $_POST['username'];

    $query = "DELETE FROM userstocks WHERE username ='$username' and stockid =$stockId";
    
    if ($conn->query($query) == TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

?>

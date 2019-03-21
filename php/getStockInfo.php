<?php require_once("connect.php");

    $stockId = $_POST['id'];

    $query = "SELECT * FROM stocks where id = $stockId";
    $result = $conn->query($query);
    $row = $result->fetch();

    if ($row == null) {
        echo "You have no stocks to display...";
    }
    else {
        echo "<table id=stockDataTable>";
            
        echo "<h1>Performance of selected stock</h1>";
            echo "<tr id=tableHead ><th>Company Name:</th><th>Current Price</th><th>Recent Change</th>
                <th>Annual Trend</th><th>Recent Change Direction</th></tr>";
            echo "<tr id=stockData ><td>".$row['companyname']."</td><td>".$row['currentprice']."</td><td>"
                .$row['recentchange']."</td><td>".$row['annualtrend']."</td><td>"
                .$row['recentchangedirection']."</td></tr>";

        echo "</table>";       
    };

?>
<?php require_once("connect.php");

    $query = "SELECT * FROM stocks";
    $result = $conn->query($query);
    
    echo "<table id=stockDataTable>";
            
    echo "<h2>Select all stocks you would like to add</h2>";
            echo "<tr><th>Select Stock</th><th>Company Name:</th><th>Current Price</th><th>Recent Change</th>
                <th>Annual Trend</th><th>Recent Change Direction</th></tr>";
            
            while ($row = $result->fetch()) {
                    echo "<tr><td><input type=checkbox name=stockChoice value=".$row['id']."></td><td>".$row['companyname']."</td><td>".$row['currentprice']."</td><td>"
                    .$row['recentchange']."</td><td>".$row['annualtrend']."</td><td>"
                    .$row['recentchangedirection']."</td></tr>";
                
            }
        echo "</table>";
        echo "<button id=addStockButton onclick=javascript:selectStocks()>Add Stocks</button>"      
?>

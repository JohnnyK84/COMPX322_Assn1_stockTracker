<?php require_once("connect.php");
    $username = $_POST['username'];
    
    try {
        $query = "SELECT * FROM userstocks WHERE username = '$username'";
        $result = $conn->query($query);
        
            
        echo "<h2>Your current Stocks:</h2>";
        echo "<h3>Click on a stock to see recent performance of that stock</h3>";
        echo "<table id=stockTable>";
        echo "<tr><th>Stock ID</th><th>Company Name</th><th></th></tr>";
        
            while($row = $result->fetch()) {                                            
                $stockId = $row['stockid'];

                //onclick function to show additional company info, attaches to each row of table and takes in stockid
                echo "<tr onclick='javascript:stockInfo(".$stockId.")'>";    
                
                //query uses stockid to bring in company name from stocks table 
                $query2 = "SELECT companyname FROM stocks WHERE id = $stockId";
                $result2 = $conn->query($query2);                                
                echo "<td>".$stockId."</td>";

                //inserts companyname to html table
                echo "<td>";
                    while($row2 = $result2->fetch()) {
                        echo $row2['companyname'] ;
                    };
                echo "</td>";

                //onclick function to add button to each row to delete stock         
                echo "<td><button id=deleteStockButton type=button onclick=javascript:deleteUserStock(".$stockId.")>Remove Stock</button></td>";
                
                echo "</tr>";
            }                
            
            echo "</table>";
            
        echo "<button type=button onclick=javascript:listStocks()>Add More Stocks</button>";

    }catch(PDOException $e){
        echo "Error Something Went Wrong: " . $e->getMessage();
    }

?>
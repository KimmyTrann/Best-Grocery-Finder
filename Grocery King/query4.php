<?php
$servername = "css1.seattleu.edu";
$username = "ktran18";
$password = "Cpsc3300Ktran18";
$dbname = "ll_ktran18";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Store_Name, SUM(S.Stock_Quantity) AS Total_Stock
        FROM Grocery_Stock_Store GSS
        INNER JOIN Stock S ON GSS.Stock_ID = S.Stock_ID
        GROUP BY Store_Name
        HAVING SUM(S.Stock_Quantity) > 50";
$result = $conn->query($sql);

echo "<h2>Query4: List total stock quantities for stores with more than 50 items</h2>";
echo "<table><tr><th>Store Name</th><th>Total Stock</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Store_Name"]."</td><td>".$row["Total_Stock"]."</td></tr>";
    }
} else {
    echo "<tr><td colspan='2'>No results</td></tr>";
}

echo "</table>";

$conn->close();
?>





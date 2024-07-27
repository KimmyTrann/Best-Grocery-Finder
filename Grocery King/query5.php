<?php
$servername = "css1.seattleu.edu";
$username = "ktran18";
$password = "Cpsc3300Ktran18";
$dbname = "ll_ktran18";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT G.G_Name, G.G_Price, S.Stock_Quantity
        FROM Grocery G
        LEFT OUTER JOIN Grocery_Stock_Store GSS ON G.Grocery_ID = GSS.Grocery_ID
        LEFT OUTER JOIN Stock S ON GSS.Stock_ID = S.Stock_ID";
$result = $conn->query($sql);

echo "<h2>Query5: List all groceries with their stock quantities, including those not stocked</h2>";
echo "<table><tr><th>Grocery Name</th><th>Price</th><th>Stock Quantity</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["G_Name"]."</td><td>".$row["G_Price"]."</td><td>".$row["Stock_Quantity"]."</td></tr>";
    }
} else {
    echo "<tr><td colspan='3'>No results</td></tr>";
}

echo "</table>";

$conn->close();
?>


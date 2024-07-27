<?php
$servername = "css1.seattleu.edu";
$username = "ktran18";
$password = "Cpsc3300Ktran18";
$dbname = "ll_ktran18";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT AVG(G_Price) AS Average_Price FROM Grocery";
$result = $conn->query($sql);

echo "<h2>Query2: Calculate the average price of all groceries</h2>";
echo "<table><tr><th>Average Price</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Average_Price"]."</td></tr>";
    }
} else {
    echo "<tr><td>No results</td></tr>";
}

echo "</table>";

$conn->close();
?>

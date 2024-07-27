<?php
$servername = "css1.seattleu.edu";
$username = "ktran18";
$password = "Cpsc3300Ktran18";
$dbname = "ll_ktran18";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Stock";
$result = $conn->query($sql);

echo "<h2>Stock</h2>";
echo "<table><tr><th>Stock_ID</th><th>Stock_Quantity</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Stock_ID"]."</td><td>".$row["Stock_Quantity"]."</td></tr>";
    }
} else {
    echo "<tr><td colspan='2'>No results</td></tr>";
}

echo "</table>";

$conn->close();
?>

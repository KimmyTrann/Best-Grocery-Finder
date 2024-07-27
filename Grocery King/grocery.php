<?php
$servername = "css1.seattleu.edu";
$username = "ktran18";
$password = "Cpsc3300Ktran18";
$dbname = "ll_ktran18";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Grocery";
$result = $conn->query($sql);

echo "<h2>Grocery</h2>";
echo "<table><tr><th>Grocery_ID</th><th>G_Name</th><th>G_Price</th><th>G_Description</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Grocery_ID"]."</td><td>".$row["G_Name"]."</td><td>".$row["G_Price"]."</td><td>".$row["G_Description"]."</td></tr>";
    }
} else {
    echo "<tr><td colspan='4'>No results</td></tr>";
}

echo "</table>";

$conn->close();
?>

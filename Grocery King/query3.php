<?php
$servername = "css1.seattleu.edu";
$username = "ktran18";
$password = "Cpsc3300Ktran18";
$dbname = "ll_ktran18";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Store_Name FROM Grocery_Stock_Store WHERE Grocery_ID = (SELECT Grocery_ID FROM Grocery WHERE G_Name = 'Milk')";
$result = $conn->query($sql);

echo "<h2>Query3: Find all stores that stock 'Milk'</h2>";
echo "<table><tr><th>Store Name</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Store_Name"]."</td></tr>";
    }
} else {
    echo "<tr><td>No results</td></tr>";
}

echo "</table>";

$conn->close();
?>


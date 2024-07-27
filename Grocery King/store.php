<?php
$servername = "css1.seattleu.edu";
$username = "ktran18";
$password = "Cpsc3300Ktran18";
$dbname = "ll_ktran18";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Store";
$result = $conn->query($sql);

echo "<h2>Store</h2>";
echo "<table><tr><th>Store_Name</th><th>Store_Location</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Store_Name"]."</td><td>".$row["Store_Location"]."</td></tr>";
    }
} else {
    echo "<tr><td colspan='2'>No results</td></tr>";
}

echo "</table>";

$conn->close();
?>

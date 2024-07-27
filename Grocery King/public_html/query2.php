<?php
$servername = "css1.seattleu.edu";
$username = "ktran18";
$password = "Cpsc3300Ktran18";
$dbname = "ll_ktran18";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT G.G_Name, G.G_Price, C.Category_Name, S.Store_Location
        FROM Grocery G
        INNER JOIN Category_Grocery CG ON G.Grocery_ID = CG.Grocery_ID
        INNER JOIN Category C ON CG.Category_ID = C.Category_ID
        INNER JOIN Grocery_Stock_Store GSS ON G.Grocery_ID = GSS.Grocery_ID
        INNER JOIN Store S ON GSS.Store_Name = S.Store_Name";
$result = $conn->query($sql);

echo "<h2>Query1: List all groceries with their categories and store locations</h2>";
echo "<table><tr><th>Grocery Name</th><th>Price</th><th>Category</th><th>Store Location</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["G_Name"]."</td><td>".$row["G_Price"]."</td><td>".$row["Category_Name"]."</td><td>".$row["Store_Location"]."</td></tr>";
    }
} else {
    echo "<tr><td colspan='4'>No results</td></tr>";
}

echo "</table>";

$conn->close();
?>

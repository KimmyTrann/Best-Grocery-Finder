<?php
$servername = "css1.seattleu.edu";
$username = "ktran18";
$password = "Cpsc3300Ktran18";
$dbname = "ll_ktran18";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the query parameter is set
if (isset($_POST['query'])) {
    $query = $_POST['query'];

    // Execute the query
    $result = $conn->query($query);

    if ($result) {
        echo "<h2>Query Results</h2>";
        echo "<table>";
        $fields = $result->fetch_fields();
        echo "<tr>";
        foreach ($fields as $field) {
            echo "<th>".$field->name."</th>";
        }
        echo "</tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>".$value."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Error executing query: " . $conn->error;
    }
}

$conn->close();
?>

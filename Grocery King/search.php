<?php
include 'header.php';
include 'db_connect.php'; // Include the database connection
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex flex-col items-center min-h-screen">
    <div class="header w-full text-center text-white p-5">
        <h1 class="text-3xl font-bold">Grocery King</h1>
    </div>
    <div class="navbar flex justify-center items-center p-2">
        <a href="index.php" class="mx-3 text-lg">Home</a>
        <a href="store.php" class="mx-3 text-lg">Store</a>
        <a href="grocery.php" class="mx-3 text-lg">Grocery List</a>
        <a href="category.php" class="mx-3 text-lg">Category</a>
        <a href="history.php" class="mx-3 text-lg">History</a>
        <div class="right" id="auth-links">
            <?php
            if (isset($_SESSION['username'])) {
                echo '<a href="logout.php" class="mx-3 text-lg">Logout (' . htmlspecialchars($_SESSION['username']) . ')</a>';
            } else {
                echo '<a href="login.php" class="mx-3 text-lg">Login</a>';
                echo '<a href="register.php" class="mx-3 text-lg">Register</a>';
            }
            ?>
        </div>
    </div>
    <div class="content flex-1 flex flex-col p-8 w-full max-w-4xl">
        <?php
        // Check if the grocery_name parameter is set
        if (isset($_POST['grocery_name'])) {
            $grocery_name = $_POST['grocery_name'];

            // Prepare and execute the query
            $stmt = $conn->prepare("
                SELECT g.g_name, s.store_name, s.store_location, MIN(g.g_price) AS lowest_price
                FROM Grocery g
                JOIN Stock st ON g.grocery_id = st.grocery_id
                JOIN Store s ON st.store_name = s.store_name
                WHERE g.g_name = ?
                GROUP BY g.g_name, s.store_name, s.store_location
            ");
            $stmt->bind_param("s", $grocery_name);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result) {
                echo "<h2 class='text-xl font-bold mb-4'>Query Results for '" . htmlspecialchars($grocery_name) . "'</h2>";
                echo "<table class='min-w-full bg-white'>";
                echo "<tr><th class='py-2 px-4 border-b'>Grocery Name</th><th class='py-2 px-4 border-b'>Store Name</th><th class='py-2 px-4 border-b'>Store Location</th><th class='py-2 px-4 border-b'>Lowest Price</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['g_name']) . "</td>";
                    echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['store_name']) . "</td>";
                    echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['store_location']) . "</td>";
                    echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['lowest_price']) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='text-red-500'>Error executing query: " . htmlspecialchars($conn->error) . "</p>";
            }

            $stmt->close();
        } else {
            echo "<p class='text-red-500'>No search query provided.</p>";
        }
        $conn->close();
        ?>
    </div>
    <div class="footer bg-green-500 text-white text-center p-4 w-full">
        <p>&copy; 2024 Grocery King Dashboard. All rights reserved.</p>
        <p>Contact: ktran18@seattleu.edu</p>
    </div>
</body>
</html>

<?php
include 'db_connect.php';

$user_id = $_GET['user_id'];

$stmt = $conn->prepare("SELECT query FROM SearchHistory WHERE user_id = ?");
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($query);

$searchHistory = [];
while ($stmt->fetch()) {
    $searchHistory[] = $query;
}

$stmt->close();
echo json_encode($searchHistory);
?>

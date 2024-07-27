<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery Store Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f5f7;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }
        .header {
            width: 100%;
            background-color: #ff3d69;
            color: white;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            top: 0;
            z-index: 1000;
        }
        .header h1 {
            margin: 0;
        }
        .navbar {
            background-color: #ff3d69;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 20px;
            width: 100%;
            position: fixed;
            top: 60px;
            z-index: 999;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-size: 18px;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        .navbar .right {
            position: absolute;
            right: 20px;
        }
        .content {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 20px;
            width: 80%;
            max-width: 1200px;
            overflow-y: auto;
            margin-top: 120px; /* Space for the fixed header and navbar */
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Grocery Store Dashboard</h1>
    </div>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="store.php">Store</a>
        <a href="grocery.php">Grocery List</a>
        <a href="category.php">Category</a>
        <a href="history.php">History</a>
        <div class="right">
            <a href="login.php">Login</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <div class="content">

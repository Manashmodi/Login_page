<?php
session_start();

if (!isset($_SESSION['userdata'])) {
    header("Location: ../index.html");
    exit();
}

$userdata = $_SESSION['userdata'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: skyblue;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image:url('https://i.ibb.co/NLghDky/patrick-tomasso-QMDap1-TAu0g-unsplash.jpg');
            background-repeat: no-repeat;
            background-size:cover;
        }

        .dashboard-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center; 
            background-image: url('https://i.ibb.co/bm6TbzF/h7.jpg');
            background-repeat: no-repeat;
            background-size:cover;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        h3 {
            color: #555;
            margin: 0;
        }

        a {
            text-decoration: none;
            color: #fff;
        }

        button {
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome to the Dashboard, <?php echo $userdata['name']; ?>!</h2>
        <h3>Email: <?php echo $userdata['email']; ?></h3>
        <button><a href="logout.php">Logout</a></button>
    </div>
</body>
</html>


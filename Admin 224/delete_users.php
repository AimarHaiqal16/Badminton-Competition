<?php
$con = mysqli_connect("localhost", "root", "", "badmintonevent") or die("Cannot connect to server");

$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    if (!empty($user_id)) {
        $sql = "DELETE FROM users WHERE user_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $user_id);
        if ($stmt->execute()) {
            $message = "User with ID '$user_id' deleted successfully.";
        } else {
            $message = "Error deleting user.";
        }
        $stmt->close();
    } else {
        $message = "Please provide a user ID.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Participant</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Importing the Roboto font from Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f8ff;
            background-image: url('C:/wamp64/www/Admin 224/shuttlecock background.jpg'); /* Add your background image path here */
            background-size: cover; /* Cover the entire viewport */
            background-position: center; /* Center the image */
            background-attachment: fixed; /* Fix the background image */
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent white background */
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            position: relative;
        }

        /* Header */
        header {
            background-color: #003366; /* Dark Blue */
            color: #ffdd57; /* Yellow */
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            border-radius: 8px 8px 0 0;
        }

        header h1 {
            margin: 0;
        }

        /* Navigation */
        nav {
            margin-bottom: 20px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            background-color: #003366; /* Dark Blue */
            border-radius: 8px;
        }

        nav ul li {
            margin: 0;
        }

        nav ul li a {
            display: block;
            padding: 15px 20px;
            text-decoration: none;
            color: #ffdd57; /* Yellow */
            transition: background-color 0.3s, color 0.3s;
            font-weight: 500;
        }

        nav ul li a:hover {
            background-color: #ffdd57; /* Yellow */
            color: #003366; /* Dark Blue */
        }

        /* Content */
        .content {
            text-align: center;
        }

        /* Form */
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form label {
            margin-bottom: 10px;
            color: #003366; /* Dark Blue */
            font-weight: 500;
        }

        form input[type="text"] {
            width: 100%;
            max-width: 300px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: #fff;
            color: #333;
            transition: border-color 0.3s;
        }

        form input[type="text"]:focus {
            border-color: #ffdd57; /* Yellow */
        }

        form button {
            background-color: #003366; /* Dark Blue */
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            font-size: 16px;
            font-weight: 500;
        }

        form button:hover {
            background-color: #ffdd57; /* Yellow */
            color: #003366; /* Dark Blue */
        }

        .home-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #003366;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .home-button:hover {
            background-color: #ffdd57;
            color: #003366;
        }

        /* Popup */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .popup-content h2 {
            margin-top: 0;
            color: #003366; /* Dark Blue */
        }

        .popup-content p {
            color: #333;
        }

        .popup-content button {
            background-color: #003366; /* Dark Blue */
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s, color 0.3s;
        }

        .popup-content button:hover {
            background-color: #ffdd57; /* Yellow */
            color: #003366; /* Dark Blue */
        }
    </style>
    <script>
        function showPopup(message) {
            document.getElementById('popup-message').innerText = message;
            document.getElementById('popup').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }

        <?php if (!empty($message)): ?>
        window.onload = function() {
            showPopup("<?= $message ?>");
        }
        <?php endif; ?>
    </script>
</head>
<body>
    <header>
        <h1>Delete Participant</h1>
		<p>Skibidi Badminton Competition</p>
        <a class="home-button" href="index.php">Home</a>
    </header>
    <div class="container">
        <form method="POST">
            <label for="user_id">User ID:</label>
            <input type="text" id="user_id" name="user_id" required>
            <button type="submit">Delete</button>
        </form>
    </div>

    <!-- Popup -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <h2>Notification</h2>
            <p id="popup-message"></p>
            <button onclick="closePopup()">OK</button>
        </div>
    </div>
</body>
</html>

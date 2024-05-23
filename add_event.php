<?php
$con = mysqli_connect("localhost", "root", "", "badmintonevent") or die("Cannot connect to server");
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_name = $_POST['event_name'];
    $quota = $_POST['quota'];
    $gender = $_POST['gender']; // Get the gender value from the form

    if (!empty($event_name) && !empty($quota) && !empty($gender)) {
        $sql = "INSERT INTO events (event_name, quota, gender) VALUES (?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sis", $event_name, $quota, $gender);
        if ($stmt->execute()) {
            $message = "Event '$event_name' added successfully.";
        } else {
            $message = "Error adding event.";
        }
        $stmt->close();
    } else {
        $message = "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Event</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        header {
            background-color: #003366;
            color: #ffdd57;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        header h1 {
            margin: 0;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form label {
            margin-bottom: 10px;
            color: #003366;
        }

        form input[type="text"],
        form input[type="number"] {
            width: 100%;
            max-width: 300px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        form input[type="radio"] {
            margin-right: 5px;
        }

        form button {
            background-color: #003366;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
        }

        form button:hover {
            background-color: #ffdd57;
            color: #003366;
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
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .popup-content h2 {
            margin-top: 0;
            color: #003366;
        }

        .popup-content button {
            background-color: #003366;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s, color 0.3s;
        }

        .popup-content button:hover {
            background-color: #ffdd57;
            color: #003366;
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
        <h1>Add New Event</h1>
        <p>Skibidi Badminton Competition</p>
        <a class="home-button" href="index.php">Home</a>
    </header>
    <div class="container">
        <form method="POST">
            <label for="event_name">Event Name:</label>
            <input type="text" id="event_name" name="event_name" required>
            <label for="quota">Quota:</label>
            <input type="number" id="quota" name="quota" required>
            <label for="gender">Category:</label>
            <div>
                <input type="radio" id="male" name="gender" value="Male" required>
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="Female" required>
                <label for="female">Female</label>
                <input type="radio" id="mixed" name="gender" value="Mixed" required>
                <label for="mixed">Mixed</label>
            </div>
            <p><p><button type="submit">Add Event</button></p></p>
        </form>
    </div>

    <div id="popup" class="popup">
        <div class="popup-content">
            <h2>Notification</h2>
            <p id="popup-message"></p>
            <button onclick="closePopup()">OK</button>
        </div>
    </div>
</body>
</html>

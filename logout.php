<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
            border-radius: 5px;
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
        }

        .popup-content button:hover {
            background-color: #ffdd57;
            color: #003366;
        }
    </style>
    <script>
        function showPopup() {
            document.getElementById('logout-popup').style.display = 'flex';
        }
    </script>
</head>
<body onload="showPopup()">
    <div id="logout-popup" class="popup">
        <div class="popup-content">
            <h2>Logout Successful</h2>
            <p>You have successfully logged out.</p>
            <button onclick="window.location.href='login.php'">OK</button>
        </div>
    </div>
</body>
</html>


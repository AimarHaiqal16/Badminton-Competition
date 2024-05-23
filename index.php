<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Homepage</title>
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
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Header */
        header {
            background-color: #003366; /* Dark Blue */
            color: #ffdd57; /* Yellow */
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
            margin-bottom: 20px;
        }

        header h1 {
            margin: 0;
        }

        /* Logout Button */
        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #ffdd57; /* Yellow */
            color: #003366; /* Dark Blue */
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            text-decoration: none;
            font-weight: bold;
        }

        .logout-button:hover {
            background-color: #003366; /* Dark Blue */
            color: #ffdd57; /* Yellow */
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
            flex-wrap: wrap;
            justify-content: center;
            background-color: #003366; /* Dark Blue */
        }

        nav ul li {
            margin: 5px;
        }

        nav ul li a {
            display: block;
            padding: 20px 30px; /* Increased padding */
            text-decoration: none;
            color: #ffdd57; /* Yellow */
            font-size: 18px; /* Increased font size */
            font-weight: bold; /* Added bold font */
            transition: background-color 0.3s, color 0.3s;
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
        }

        form input[type="text"] {
            width: 100%;
            max-width: 300px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
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
        }

        form button:hover {
            background-color: #ffdd57; /* Yellow */
            color: #003366; /* Dark Blue */
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

        /* Media Queries */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
            }

            nav ul li a {
                padding: 15px 20px; /* Adjusted padding for smaller screens */
                font-size: 16px; /* Adjusted font size for smaller screens */
            }

            .logout-button {
                padding: 8px 15px; /* Adjusted padding for smaller screens */
                font-size: 14px; /* Adjusted font size for smaller screens */
            }

            form input[type="text"] {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Homepage</h1>
        <p>Skibidi Badminton Competition</p>
        <a class="logout-button" href="logout.php">Logout</a>
    </header>
    <div class="container">
        <nav>
            <ul>
                <li><a href="add_event.php">Add New Event</a></li>
                <li><a href="set_quotas.php">Set Event Quotas</a></li>
                <li><a href="view_users.php">Registered Participants</a></li>
            </ul>
        </nav>
        <div class="content">
            <!-- Additional content can be added here -->
        </div>
    </div>
</body>
</html>

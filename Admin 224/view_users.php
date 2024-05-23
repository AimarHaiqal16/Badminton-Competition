<?php
$con = mysqli_connect("localhost", "root", "", "badmintonevent") or die("Cannot connect to server");

$sql = "SELECT users.user_id, users.username, users.password, users.email, users.full_name, users.phone_num, users.gender, events.event_name
        FROM users
        LEFT JOIN applications ON users.user_id = applications.user_id
        LEFT JOIN events ON applications.event_id = events.event_id";
$result = $con->query($sql);
$users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Users</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Light Blue */
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #ffdd57; /* Yellow */
            color: #003366; /* Dark Blue */
            padding: 20px 0;
            text-align: center;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff; /* White */
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Enable horizontal scrolling for smaller screens */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #003366; /* Dark Blue */
            color: #ffdd57; /* Yellow */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Light Gray */
        }

        tr:hover {
            background-color: #ddd; /* Gray */
        }

        a {
            text-decoration: none;
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
            background-color: #003366;
            color: #ffdd57;
        }

        @media (max-width: 600px) {
            th, td {
                padding: 5px;
                font-size: 14px;
            }

            header {
                padding: 10px 0;
            }

            .home-button {
                top: 10px;
                right: 10px;
                padding: 5px 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Registered Participants</h1>
        <p>Skibidi Badminton Competition</p>
        <a href="index.php" class="home-button">Home</a>
    </header>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Event Name</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['user_id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['password'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['full_name'] ?></td>
                        <td><?= $user['phone_num'] ?></td>
                        <td><?= $user['gender'] ?></td>
                        <td><?= $user['event_name'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

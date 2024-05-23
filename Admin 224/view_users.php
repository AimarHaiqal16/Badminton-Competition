<?php
$con = mysqli_connect("localhost", "root", "", "badmintonevent") or die("Cannot connect to server");

$users = [];
$message = "";

// Check if the search form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search_term'])) {
    $search_term = $_POST['search_term'];
    if (!empty($search_term)) {
        $sql = "SELECT users.user_id, users.username, users.password, users.email, users.full_name, users.phone_num, users.gender, events.event_name
                FROM users
                LEFT JOIN applications ON users.user_id = applications.user_id
                LEFT JOIN events ON applications.event_id = events.event_id
                WHERE users.user_id LIKE ? OR users.username LIKE ? OR users.email LIKE ?";
        $stmt = $con->prepare($sql);
        $like_term = "%" . $search_term . "%";
        $stmt->bind_param("sss", $like_term, $like_term, $like_term);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        } else {
            $message = "No users found.";
        }
        $stmt->close();
    } else {
        $message = "Please provide a search term.";
    }
} else {
    // Default view - show all users
    $sql = "SELECT users.user_id, users.username, users.password, users.email, users.full_name, users.phone_num, users.gender, events.event_name
            FROM users
            LEFT JOIN applications ON users.user_id = applications.user_id
            LEFT JOIN events ON applications.event_id = events.event_id";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View and Search Users</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #ffdd57;
            color: #003366;
            padding: 20px 0;
            text-align: center;
            margin-bottom: 20px;
        }

        header h1 {
            margin: 0;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        form {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        form input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            max-width: 300px;
            margin-bottom: 10px;
        }

        form button {
            background-color: #003366;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            margin-left: 10px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #003366;
            color: #ffdd57;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        @media (max-width: 600px) {
            th, td {
                padding: 5px;
                font-size: 14px;
            }

            header {
                padding: 10px;
            }

            .home-button {
                top: 10px;
                right: 10px;
                padding: 5px 10px;
                font-size: 14px;
            }

            form input[type="text"] {
                width: calc(100% - 20px);
                margin: 10px;
            }

            form button {
                margin: 10px auto;
                width: calc(100% - 20px);
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Participants</h1>
        <p>Skibidi Badminton Competition</p>
        <a class="home-button" href="index.php">Home</a>
    </header>
    <div class="container">
        <form method="POST">
            <input type="text" name="search_term" placeholder="Enter User ID, Username, or Email" required>
            <button type="submit">Search</button>
        </form>
        <?php if (!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>
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

<?php
$con = mysqli_connect("localhost", "root", "", "badmintonevent") or die("Cannot connect to server");
$users = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search_term = $_POST['search_term'];
    if (!empty($search_term)) {
        $sql = "SELECT * FROM users WHERE user_id LIKE ? OR username LIKE ? OR email LIKE ?";
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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search User</title>
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
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
            justify-content: center;
            margin-bottom: 20px;
        }

        form input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 300px;
            margin-right: 10px;
        }

        form button {
            background-color: #003366;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
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
    </style>
</head>
<body>
    <header>
        <h1>Search Participants</h1>
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
        <?php if (!empty($users)): ?>
            <table>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Full Name</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user['user_id'] ?></td>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['full_name'] ?></td>
                            <td><?= $user['phone_num'] ?></td>                          
                            <td><?= $user['gender'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>

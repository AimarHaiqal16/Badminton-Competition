<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/style.css">
	<style>
	body {
    font-family: Arial, sans-serif;
    background-color: #f0f8ff;
    color: #333;
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
    background-color: #ffdd57;
    color: #003366;
    padding: 10px 0;
    text-align: center;
    margin-bottom: 20px;
}

form {
    margin: 20px 0;
}

input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0 20px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #003366;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #ffdd57;
    color: #003366;
}
</style>
</head>
<body>
    <header>
        <h1>Admin Login</h1>
    </header>
    <div class="container">
        <form method="POST" action=functions.php>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

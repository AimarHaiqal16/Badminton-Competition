<?php
session_start();

header('Content-Type: application/json'); // Ensure the response is JSON

try {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['success' => false, 'message' => 'You must be logged in to apply.']);
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $event_id = $_POST['event_id'];

    $host = 'localhost';
    $db = 'badmintonevent';
    $user = 'root';
    $pass = '';

    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare('INSERT INTO applications (user_id, event_id) VALUES (?, ?)');
    if ($stmt->execute([$user_id, $event_id])) {
        echo json_encode(['success' => true, 'message' => 'You have successfully applied for the event.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to apply for the event.']);
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    echo json_encode(['success' => false, 'message' => 'An error occurred. Please try again later.']);
}
?>

<?php
session_start();

header('Content-Type: application/json'); // Ensure the response is JSON

try {
    $user_id = $_POST['user_id'];
    $event_id = $_POST['event_id'];
    $user_gender = $_POST['user_gender'];
    $event_gender = $_POST['event_gender'];
    $event_quota = $_POST['event_quota'];

    $host = 'localhost';
    $db = 'badmintonevent';
    $user = 'root';
    $pass = '';

    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($event_gender != 'mixed' && $user_gender != $event_gender) {
        $gender_label = $user_gender == 'male' ? 'male' : 'female';
        echo json_encode(['success' => false, 'message' => "You can't apply for this event because it doesn't match your gender."]);
        exit;
    }
    

    $stmt = $pdo->prepare('SELECT COUNT(*) FROM applications WHERE user_id = ? AND event_id = ?');
    $stmt->execute([$user_id, $event_id]);
    if ($stmt->fetchColumn() > 0) {
        echo json_encode(['success' => false, 'message' => 'You have already applied for this event.']);
        exit;
    }

    $stmt = $pdo->prepare('SELECT COUNT(*) FROM applications WHERE event_id = ?');
    $stmt->execute([$event_id]);
    if ($stmt->fetchColumn() >= $event_quota) {
        echo json_encode(['success' => false, 'message' => 'This event is already full, sorry!']);
        exit;
    }

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    error_log($e->getMessage());
    echo json_encode(['success' => false, 'message' => 'An error occurred. Please try again later.']);
}
?>

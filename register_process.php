<?php
session_start();
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

$fullname = trim($_POST['fullname'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';

if ($fullname === '' || $email === '' || $password === '' || $confirmPassword === '') {
    echo json_encode(['success' => false, 'message' => 'Please complete all fields.']);
    exit;
}

if (strlen($fullname) > 200 || strlen($email) > 200 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Please enter a valid name and email address.']);
    exit;
}

if (strlen($password) < 8) {
    echo json_encode(['success' => false, 'message' => 'Your password must be at least 8 characters.']);
    exit;
}

if ($password !== $confirmPassword) {
    echo json_encode(['success' => false, 'message' => 'Passwords do not match.']);
    exit;
}

$check = $conn->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
$check->bind_param('s', $email);
$check->execute();

if ($check->get_result()->num_rows > 0) {
    $check->close();
    echo json_encode(['success' => false, 'message' => 'An account with this email already exists.']);
    exit;
}
$check->close();

$role = 'player';
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$insert = $conn->prepare('INSERT INTO users (fullname, email, password, role) VALUES (?, ?, ?, ?)');
$insert->bind_param('ssss', $fullname, $email, $hashedPassword, $role);

if ($insert->execute()) {
    $_SESSION['user_id'] = $insert->insert_id;
    $_SESSION['fullname'] = $fullname;
    $_SESSION['role'] = $role;
    echo json_encode(['success' => true, 'message' => 'Your player account has been created.', 'role' => $role]);
} else {
    echo json_encode(['success' => false, 'message' => 'Unable to create your account. Please try again.']);
}

$insert->close();

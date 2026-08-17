<?php
session_start();
require_once 'config.php';
header("Content-Type: application/json");
// $message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();

        // Supports existing plain-text accounts while new registrations use password hashes.
        $validPassword = password_verify($password, $user['password']) || hash_equals($user['password'], $password);

        if (!$validPassword) {
            echo json_encode(['success' => false, 'message' => 'Invalid Email or Password']);
            $stmt->close();
            exit();
        }

        $_SESSION["user_id"] = $user["id"];
        $_SESSION["fullname"] = $user["fullname"];
        $_SESSION["role"] = $user["role"];

        if ($user["role"] === "admin") {
            echo json_encode(['success' => true, 'message' => 'Login Successful', 'role' => 'admin' ]);
            // header("Location: admin/dashboard.php");
            exit();
        }

        if ($user["role"] === "player") {
            echo json_encode(['success' => true, 'message' => 'Login Successful', 'role' => 'player' ]);
            // header("Location: player/dashboard.php");
            exit();
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid Email or Password']);
    }

    $stmt->close();
}

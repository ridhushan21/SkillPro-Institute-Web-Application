<?php
// Start session
session_start();

// DB connection
$conn = new mysqli("localhost", "root", "", "skillpro_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email    = $_POST['loginEmail'] ?? '';
    $password = $_POST['loginPassword'] ?? '';
    $role     = $_POST['userRole'] ?? '';

    if ($email !== '' && $password !== '' && $role !== '') {
        $stmt = $conn->prepare("SELECT id, email, password, role FROM users WHERE email=? AND role=? LIMIT 1");
        $stmt->bind_param("ss", $email, $role);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            // Password check (hashed or plain)
            if (password_verify($password, $row['password']) || $password === $row['password']) {
                // Save session
                $_SESSION['user_id']    = $row['id'];
                $_SESSION['user_role']  = $row['role'];
                $_SESSION['user_email'] = $row['email'];

                echo "✅ Login successful! Welcome, " . explode('@', $row['email'])[0];
            } else {
                echo "❌ Invalid password!";
            }
        } else {
            echo "⚠️ User not found or role mismatch!";
        }

        $stmt->close();
    } else {
        echo "⚠️ All fields are required!";
    }
}

$conn->close();
?>

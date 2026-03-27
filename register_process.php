<?php
header("Content-Type: application/json"); // ensure JSON response

$conn = new mysqli("localhost", "root", "", "skillpro_db");
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "❌ DB Connection failed"]);
    exit;
}

$response = ["success" => false, "message" => "", "errors" => []];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name     = $_POST['regName'] ?? '';
    $email    = $_POST['regEmail'] ?? '';
    $phone    = $_POST['regPhone'] ?? '';
    $password = $_POST['regPassword'] ?? '';
    $confirm  = $_POST['regConfirmPassword'] ?? '';
    $role     = $_POST['regRole'] ?? '';

    if (!$name || !$email || !$phone || !$password || !$confirm) {
        $response["message"] = "⚠️ All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response["message"] = "⚠️ Invalid email format!";
    } elseif ($password !== $confirm) {
        $response["message"] = "⚠️ Passwords do not match!";
    } elseif (strlen($password) < 6) {
        $response["message"] = "⚠️ Password must be at least 6 characters!";
    } else {
        $check = $conn->prepare("SELECT id FROM students WHERE email=?");
        $check->bind_param("s", $email);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            $response["message"] = "⚠️ Email already registered!";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $status = "active";

            $stmt = $conn->prepare("INSERT INTO students 
                (name, email, phone, password_hash, status, created_at, updated_at) 
                VALUES (?, ?, ?, ?, ?, NOW(), NOW())");
            $stmt->bind_param("sssss", $name, $email, $phone, $hashedPassword, $status);

            if ($stmt->execute()) {
                $response["success"] = true;
                $response["message"] = "✅ Registration successful! Welcome, $name";
                $response["user"] = [
                    "id" => $stmt->insert_id,
                    "name" => $name,
                    "email" => $email,
                    "role" => $role
                ];
            } else {
                $response["message"] = "❌ Error: " . $stmt->error;
            }
            $stmt->close();
        }
        $check->close();
    }
} else {
    $response["message"] = "Invalid request.";
}

$conn->close();
echo json_encode($response);
?>

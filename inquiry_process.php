<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "skillpro_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = $_POST['inquiryName'] ?? '';
    $email   = $_POST['inquiryEmail'] ?? '';
    $subject = $_POST['inquirySubject'] ?? '';
    $message = $_POST['inquiryMessage'] ?? '';

    if ($name !== '' && $email !== '' && $subject !== '' && $message !== '') {
        $stmt = $conn->prepare("INSERT INTO inquiries (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        if ($stmt->execute()) {
            echo "✅ Inquiry submitted successfully!";
        } else {
            echo "❌ Error: " . $stmt->error;
        }
    } else {
        echo "⚠️ All fields are required!";
    }
}

$conn->close();
?>

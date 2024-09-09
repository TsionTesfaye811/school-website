<?php
require 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO admissions (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "Message sent and saved successfully.";
    } else {
        echo "Failed to send and save message.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>

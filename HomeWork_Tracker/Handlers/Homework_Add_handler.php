<?php
include '../database/database.php'; // Ensure this file initializes a `mysqli` connection as `$conn`

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject_name = $_POST['subject_name'];
    $homework_description = $_POST['homework_description'];
    $deadline = $_POST['deadline'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO homework (subject_name, homework_description, deadline) VALUES (?, ?, ?)");

    // Bind parameters to the statement
    $stmt->bind_param("sss", $subject_name, $homework_description, $deadline);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect on success
        header("Location: ../index.php");
        exit();
    } else {
        // Handle errors (e.g., log or display an error message)
        echo "Error: " . $stmt->error;
    }
}
?>
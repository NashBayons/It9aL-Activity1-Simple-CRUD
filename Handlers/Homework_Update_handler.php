<?php
include '../database/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get POST data
    $id = $_POST['id']; // Get the ID
    $subject_name = $_POST['subject_name'];
    $homework_description = $_POST['homework_description'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];

    // Prepare the UPDATE statement
    $stmt = $conn->prepare("UPDATE homework SET subject_name = ?, homework_description = ?, deadline = ?, status = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $subject_name, $homework_description, $deadline, $status, $id); // Bind parameters

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect on success
        header("Location: ../view/home.php");
        exit();
    } else {
        // Handle errors (e.g., log or display an error message)
        echo "Error: " . $stmt->error;
    }
}
?>
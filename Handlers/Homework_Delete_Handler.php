<?php
include '../database/database.php'; // Ensure this file initializes a `mysqli` connection as `$conn`

// Check if the delete_id parameter is passed
if (isset($_GET['id'])) {
    $delete_id = $_GET['id'];

    // Prepare the DELETE statement
    $stmt = $conn->prepare("DELETE FROM homework WHERE id = ?");
    $stmt->bind_param("i", $delete_id);

    // Check if headers have been sent
    if (headers_sent()) {
        die("Headers already sent. Redirect failed.");
    }

    // Execute the delete query
    if ($stmt->execute()) {
        // Close the statement
        $stmt->close();
        // Redirect to the index page after deletion
        header("Location: ../view/Home.php");
        exit; // Ensure no further code runs after the redirect
    } else {
        // Error handling for deletion failure
        echo "Error deleting record: " . $stmt->error;
    }
} else {
    // If no delete_id is set, redirect to the index page
    header("Location: ../view/home.php");
    exit;
}
?>
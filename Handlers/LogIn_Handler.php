<?php

session_start();
include '../database/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verify user credentials
    $user = verify_user($username, $password);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $username;
        header("Location: ../View/Home.php");
        exit();
    } else {
        // If verification failed, show an error message
        echo "Invalid username or password.";
    }
}

// Function to verify user credentials (without password hashing)
function verify_user($username, $password)
{
  global $conn;

  $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  // Check if user exists
  if ($row = $result->fetch_assoc()) {
    // Directly compare entered password with stored password (plain text)
    if ($password === $row['password']) {
      return $row; // Return user info if password matches
    } else {
      return false; // Password incorrect
    }
  }
  return false; // User not found
}
?>

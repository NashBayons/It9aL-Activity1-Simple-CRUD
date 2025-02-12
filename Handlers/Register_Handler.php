<?php
session_start();
include '../database/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //retrive form data
    $username = $_POST['username_reg'];
    $email = $_POST['Email_reg'];
    $password = $_POST['password_reg'];
    $password_confirm = $_POST['password_reg_confirm'];

    $error = [];

    if(empty($username) || empty($email) || empty($password) || empty($password_confirm)){
        $_SESSION['error'] = "Please fill in all fields.";
        header("Location: ../ErrorPage.php");
        exit();
    }

    if($password != $password_confirm){
        $_SESSION['error'] = "Password do not match.";
        header("Location: ../ErrorPage.php");
        exit();
    }

    $stmt = $conn->prepare("Select id from users where username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows > 0){
        $_SESSION['error'] = "Username already taken.";
        header("Location: ../ErrorPage.php");
        exit();
    }

    $stmt = $conn->prepare("Select id from users where email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if($stmt->num_rows > 0){
        $_SESSION['error'] = "Email already taken.";
        header("Location: ../ErrorPage.php");
        exit();
    }

    $stmt=$conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    // Execute the statement
    if ($stmt->execute()) {
        echo("Registration Successful");
        // Redirect on success
        header("Location: ../login.php");
        exit();
    } else {
        // Handle errors (e.g., log or display an error message)
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
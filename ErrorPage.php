<?php
session_start();
$error_message = isset($_SESSION['error']) ? $_SESSION['error'] : "An unknown error occurred.";
unset($_SESSION['error']); // Clear error after displaying
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Error</title>
    <link rel="stylesheet" href="Styling/Style.css">
</head>
<body>
    <div class="container text-center">
        <div class="error-box alert alert-danger">
            <h4>Error</h4>
            <p><?php echo htmlspecialchars($error_message); ?></p>
            <a href="Register.php" class="btn btn-primary">Return to Register</a>
        </div>
    </div>
</body>
</html>

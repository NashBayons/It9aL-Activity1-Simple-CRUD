<?php
session_start();
include '../Database/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Homework</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Add Homework</h1>
        <form class="form" action="../Handlers/Homework_Add_handler.php" method="POST">
            <div class="mb-3">
                <label for="subject_name" class="form-label">Subject Name</label>
                <input type="text" class="form-control" id="subject_name" name="subject_name" required>
            </div>
            <div class="mb-3">
                <label for="homework_description" class="form-label">Homework Description</label>
                <textarea class="form-control" id="homework_description" name="homework_description"
                    required></textarea>
            </div>
            <div class="mb-3">
                <label for="deadline" class="form-label">Deadline</label>
                <input type="date" class="form-control" id="deadline" name="deadline" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i>&nbsp;Add</button>
            <a href="home.php" class="btn btn-secondary"><i class="fa-solid fa-xmark"></i>&nbsp;Cancel</a>
        </form>
    </div>
</body>

</html>
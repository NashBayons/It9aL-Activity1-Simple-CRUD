<?php
include '../database/database.php'; // Ensure this file initializes a `mysqli` connection as `$conn`

if (!isset($_GET['id'])) {
    header("Location: ../index.php");
    exit();
}

$id = $_GET['id'];

// Fetch homework by ID
$stmt = $conn->prepare("SELECT * FROM homework WHERE id = ?");
$stmt->bind_param("i", $id); // Bind the ID parameter
$stmt->execute();
$result = $stmt->get_result(); // Get the result set
$homework = $result->fetch_assoc(); // Fetch the row as an associative array

if (!$homework) {
    header("Location: ../index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Homework</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Homework</h1>
        <form class="form" action="../Handlers/Homework_Update_handler.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $homework['id']; ?>">
            <div class="mb-3">
                <label for="subject_name" class="form-label">Subject Name</label>
                <input type="text" class="form-control" id="subject_name" name="subject_name"
                    value="<?php echo $homework['subject_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="homework_description" class="form-label">Homework Description</label>
                <textarea class="form-control" id="homework_description" name="homework_description"
                    required><?php echo $homework['homework_description']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="deadline" class="form-label">Deadline</label>
                <input type="date" class="form-control" id="deadline" name="deadline"
                    value="<?php echo $homework['deadline']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Pending" <?php echo $homework['status'] === 'Pending' ? 'selected' : ''; ?>>Pending
                    </option>
                    <option value="Completed" <?php echo $homework['status'] === 'Completed' ? 'selected' : ''; ?>>
                        Completed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i>&nbsp;Update</button>
            <a href="../index.php" class="btn btn-secondary"><i class="fa-solid fa-xmark"></i>&nbsp;Cancel</a>
        </form>
    </div>
</body>

</html>
<?php
include 'Database/database.php';

// Fetch all homework
$query = "SELECT * FROM homework";
$result = $conn->query($query);

$homeworks = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $homeworks[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Homework Tracker</h1>
        <a href="View/add.php" class="btn btn-primary mb-3"><i class="fa-solid fa-plus"></i>&nbsp;Add Homework</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>Homework Description</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($homeworks as $hw): ?>
                    <tr>
                        <td><?php echo $hw['subject_name']; ?></td>
                        <td><?php echo $hw['homework_description']; ?></td>
                        <td><?php echo $hw['deadline']; ?></td>
                        <td><?php echo $hw['status']; ?></td>
                        <td>
                            <a href="View/update.php?id=<?php echo $hw['id']; ?>" class="btn btn-warning btn-sm"><i
                                    class="fa-solid fa-pen-to-square"></i>&nbsp;Edit</a>
                            <a href="Handlers/Homework_Delete_Handler.php?id=<?php echo $hw['id']; ?>"
                                class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                <i class="fa-solid fa-trash-can"></i> &nbsp;Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
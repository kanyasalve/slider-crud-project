<?php
include('../config/db.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Slider List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Slider List</h2>

    <a href="create.php" class="btn btn-primary mb-3">Add New Slider</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tab Title</th>
                <th>Slide Title</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        <?php
        $result = $conn->query("SELECT * FROM sliders ORDER BY id DESC");

        while($row = $result->fetch_assoc()){
        ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['tab_title']; ?></td>
                <td><?= $row['slide_title']; ?></td>
                <td>
                    <img src="../uploads/<?= $row['slide_image']; ?>" width="60">
                </td>
                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $row['id']; ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure?')">
                       Delete
                    </a>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>

</body>
</html>

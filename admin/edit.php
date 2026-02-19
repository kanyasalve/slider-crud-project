<?php
include('../config/db.php');

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM sliders WHERE id=$id");
$data = $result->fetch_assoc();

if(isset($_POST['update'])){

    $tab_title = $_POST['tab_title'];
    $slide_title = $_POST['slide_title'];
    $slide_description = $_POST['slide_description'];

    if($_FILES['slide_image']['name'] != ""){
        $image = $_FILES['slide_image']['name'];
        move_uploaded_file($_FILES['slide_image']['tmp_name'], "../uploads/".$image);
    } else {
        $image = $data['slide_image'];
    }

    $sql = "UPDATE sliders SET 
            tab_title='$tab_title',
            slide_title='$slide_title',
            slide_description='$slide_description',
            slide_image='$image'
            WHERE id=$id";

    $conn->query($sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Slider</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Slider</h2>

    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label>Tab Title</label>
            <input type="text" name="tab_title" 
                   class="form-control"
                   value="<?= $data['tab_title']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Slide Title</label>
            <input type="text" name="slide_title" 
                   class="form-control"
                   value="<?= $data['slide_title']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="slide_description" 
                      class="form-control"><?= $data['slide_description']; ?></textarea>
        </div>

        <div class="mb-3">
            <label>Current Image</label><br>
            <img src="../uploads/<?= $data['slide_image']; ?>" width="100">
        </div>

        <div class="mb-3">
            <label>Change Image</label>
            <input type="file" name="slide_image" class="form-control">
        </div>

        <button type="submit" name="update" class="btn btn-success">
            Update
        </button>

    </form>
</div>

</body>
</html>

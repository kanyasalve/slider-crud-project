<?php
include('../config/db.php');

if(isset($_POST['submit'])){

    $tab_title = $_POST['tab_title'];
    $slide_title = $_POST['slide_title'];
    $slide_description = $_POST['slide_description'];

    $image = $_FILES['slide_image']['name'];
    move_uploaded_file($_FILES['slide_image']['tmp_name'],"../uploads/".$image);

    $sql = "INSERT INTO sliders(tab_title, slide_title, slide_description, slide_image)
            VALUES('$tab_title','$slide_title','$slide_description','$image')";

    $conn->query($sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Slider</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
        }
        .card{
            border-radius:12px;
            box-shadow:0 4px 15px rgba(0,0,0,0.1);
        }
        .form-control:focus{
            box-shadow:none;
            border-color:#0d6efd;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card p-4">
                <h3 class="mb-4 text-center">Add New Slider</h3>

                <form method="POST" enctype="multipart/form-data">

                    <!-- Tab Title -->
                    <div class="mb-3">
                        <label class="form-label">Tab Title</label>
                        <input type="text" name="tab_title"
                               class="form-control"
                               placeholder="Enter Tab Title"
                               required>
                    </div>

                    <!-- Slide Title -->
                    <div class="mb-3">
                        <label class="form-label">Slide Title</label>
                        <input type="text" name="slide_title"
                               class="form-control"
                               placeholder="Enter Slide Title"
                               required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label class="form-label">Slide Description</label>
                        <textarea name="slide_description"
                                  class="form-control"
                                  rows="4"
                                  placeholder="Enter Description"></textarea>
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-3">
                        <label class="form-label">Upload Image (1:1 ratio recommended)</label>
                        <input type="file" name="slide_image"
                               class="form-control"
                               accept="image/*"
                               required>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-secondary">
                            Back
                        </a>

                        <button type="submit" name="submit"
                                class="btn btn-primary">
                            Save Slider
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

</body>
</html>

<?php include('config/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Slider Section</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.css"></head>
<body>
   <div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav flex-column nav-pills" id="tabMenu">
                <?php
                $tabs = $conn->query("SELECT DISTINCT tab_title FROM sliders");
                $i = 0;
                while($tab = $tabs->fetch_assoc()){
                    ?>
                    <li class="nav-item">
                      <a href="javascript:void(0);" 
   class="nav-link <?php if($i==0) echo 'active'; ?>" 
   data-tab="<?= $tab['tab_title']; ?>">

                        <?= $tab['tab_title']; ?>
                        </a>
                    </li>
                    <?php $i++; } ?>
                
            </ul>
        </div>
        <div class="col-md-5">
            <div class="slider-wrapper">
                <div class="slider-content"></div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="image-preview">
                <img src="" alt="" class="img-fluid" id="previewImage">
            </div>
        </div>
    </div>
   </div> 
   <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>
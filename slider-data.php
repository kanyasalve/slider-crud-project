<?php
include('config/db.php');

if(isset($_POST['tab'])){

    $tab = $_POST['tab'];

    $result = $conn->query("SELECT * FROM sliders WHERE tab_title = '$tab'");

    while($row = $result->fetch_assoc()){
?>
        <div class="slide-item" data-image="<?= $row['slide_image']; ?>">
            <h4><?= $row['slide_title']; ?></h4>
            <p><?= $row['slide_description']; ?></p>
        </div>
<?php 
    }
}
?>

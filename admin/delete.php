<?php
include('../config/db.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $conn->query("DELETE FROM sliders WHERE id=$id");

    header("Location: index.php");
}
?>

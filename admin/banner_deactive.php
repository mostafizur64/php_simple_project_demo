<?php
require_once '../db.php';
$id = $_GET['id'];

$update_banner_status = "UPDATE banners SET active_status = 1 WHERE id=$id";
$update_banner_query = mysqli_query($db_connetion, $update_banner_status);
header('location:banner.php');

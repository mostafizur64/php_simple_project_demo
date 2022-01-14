<?php
$id = $_GET['id'];
require_once '../db.php';
$banner_datele_query = "DELETE  FROM banners WHERE id=$id";
mysqli_query($db_connetion, $banner_datele_query);

header('location:banner.php');


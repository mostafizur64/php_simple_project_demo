<?php
session_start();
require_once '../db.php';
// require_once 'profile.php';
$sub_title = $_POST['sub_title'];
$title_top = $_POST['title_top'];
$title_bottom = $_POST['title_bottom'];
$details = $_POST['details'];
if (
    $_POST['sub_title'] == NULL || $_POST['title_top'] == NULL ||
    $_POST['title_bottom'] == NULL || $_POST['details'] == NULL) 
    {
    $_SESSION['banne_insert_err'] = "first fill up all fill";
    header('location:banner.php');
} 
else {
    $uploaded_image_size = $_FILES['banner_imgae']['size'];
    if ($uploaded_image_size <= 2000000) {
        $uploaded_image_name = $_FILES['banner_imgae']['name'];
        $after_explode = explode('.', $uploaded_image_name);
        $uploaded_image_ext = end($after_explode);
        $allowed_extention = array('jpg', 'jpeg', 'png', 'JPG', 'PNG', 'JPEG');
        if (in_array($uploaded_image_ext, $allowed_extention)) {
            $insert_banner_query = "INSERT INTO banners(sub_title,title_top,
 title_bottom,details,image_location) VALUES('$sub_title','$title_top',
 '$title_bottom','$details','primary_location')";
            $from_db = mysqli_query($db_connetion, $insert_banner_query);

            $after_mysqli_insert_id = mysqli_insert_id($db_connetion);
            $new_name = $after_mysqli_insert_id . '.' . $uploaded_image_ext;

            $upload_location = "../uploads/Banner/" . $new_name;
            move_uploaded_file($_FILES['banner_imgae']['tmp_name'], $upload_location);
            $db_location = "uploads/Banner/" . $new_name;
            $update_location_query = "UPDATE banners SET image_location='$db_location' 
        WHERE id=$after_mysqli_insert_id";
            mysqli_query($db_connetion, $update_location_query);
            header('location:banner.php');


            // $uploaded_location = "../uploads/Banner/" . $new_name;

            // move_uploaded_file($_FILES['banner_imgae']['tmp_name'], $uploaded_location);
            // $db_location = "uploads/Banner/" . $new_name;
            // $update_location_query = "UPDATE banners SET  image_location ='$db_connetion'
            //  WHERE id=$after_mysqli_insert_id";
            // mysqli_query($db_connetion, $update_location_query);
            // header('location:banner.php');
        } else {
            echo 'this file formate is not allowed';
        }
    } else {
        echo 'upload kora jabe nah!';
    }
}

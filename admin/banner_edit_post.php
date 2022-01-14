<?php
// print_r($_POST);
require_once '../db.php';
$id = $_POST['id'];
$sub_title = $_POST['sub_title'];
$title_top = $_POST['title_top'];
$title_bottom = $_POST['title_bottom'];
$details = $_POST['details'];

$update_query = "UPDATE banners SET id='$id', sub_title='$sub_title',
 title_top='$title_top', details='$details' WHERE id=$id";
mysqli_query($db_connetion, $update_query);


$update_image_name = $_FILES['banner_imgae']['name'];
if ($update_image_name) {
    $uploaded_image_size = $_FILES['banner_imgae']['size'];

    if ($uploaded_image_size <= 2000000) {
        $uploaded_image_name = $_FILES['banner_imgae']['name'];
        $after_explode = explode('.', $uploaded_image_name);
        $uploaded_image_ext = end($after_explode);
        $allowed_extention = array('jpg', 'jpeg', 'png', 'JPG', 'PNG', 'JPEG');
        if (in_array($uploaded_image_ext, $allowed_extention)) {
            $image_location_query = "SELECT image_location FROM banners WHERE id=$id";
            $image_from_db = mysqli_query($db_connetion, $image_location_query);
            $image_after_fatch_assoc = mysqli_fetch_assoc($image_from_db,);

            unlink("../" . $image_after_fatch_assoc['image_location']);
            $new_name = $id . '.' . $uploaded_image_ext;

            $upload_location = "../uploads/Banner/" . $new_name;
            move_uploaded_file($_FILES['banner_imgae']['tmp_name'], $upload_location);
            $db_location = "uploads/Banner/" . $new_name;
            $update_location_query = "UPDATE banners SET image_location='$db_location' 
            WHERE id=$id";
            mysqli_query($db_connetion, $update_location_query);
            header('location:banner.php');


            $uploaded_location = "../uploads/Banner/" . $new_name;

            move_uploaded_file($_FILES['banner_imgae']['tmp_name'], $uploaded_location);
            $db_location = "uploads/Banner/" . $new_name;
            $update_location_query = "UPDATE banners SET  image_location ='$db_connetion'
             WHERE id=$id";
            mysqli_query($db_connetion, $update_location_query);
            header('location:banner.php');
        } else {
            echo 'this file formate is not allowed';
        }
    }
} else {
    echo "payy nai ";
}
header('location:banner.php');

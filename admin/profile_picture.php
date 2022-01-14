<?php
// echo  $_POST;
// print_r($_FILES);
session_start();
require_once '../db.php';

$login_email = $_SESSION['admin_email'];

$uploaded_image_name = $_FILES['profile_pic']['name'];
if ($uploaded_image_name == NULL) {
    $_SESSION['image_name_err'] = 'please all field first fillup';
    header('location:profile.php');
} else {
    $uploaded_image_size = $_FILES['profile_pic']['size'];
    if ($uploaded_image_size <= 2000000) {
        $uploaded_image_name = $_FILES['profile_pic']['name'];
        $after_explode = explode('.', $uploaded_image_name);
        $uploaded_image_ext = end($after_explode);
        $allowed_extention = array('jpg', 'jpeg', 'png', 'JPG', 'PNG', 'JPEG');
        if (in_array($uploaded_image_ext, $allowed_extention)) {

            //         $insert_banner_query = "INSERT INTO banners(sub_title,title_top,
            // title_bottom,details,image_location) VALUES('$sub_title','$title_top',
            // '$title_bottom','$details','primary_location')";
            //         $from_db = mysqli_query($db_connetion, $insert_banner_query);

            // $after_mysqli_insert_id = mysqli_insert_id($db_connetion);


            $cheacking_query = "SELECT COUNT(*) AS total_users FROM registration 
        WHERE student_email='$login_email'";
            $result_from_db = mysqli_query($db_connetion, $cheacking_query);
            $after_assoc_result = mysqli_fetch_assoc($result_from_db);
            $after_assoc_result['total_users'];
            if ($after_assoc_result['total_users'] == 1) {
                $cheacking_query2 = "SELECT id FROM registration WHERE
             student_email='$login_email'";
                $result_from_db2 = mysqli_query($db_connetion, $cheacking_query2);
                $after_assoc_result2 = mysqli_fetch_assoc($result_from_db2);
                $from_db_id = $after_assoc_result2['id'];

                $new_name = $from_db_id . '.' . $uploaded_image_ext;

                $upload_location = "../uploads/profile/" . $new_name;
                move_uploaded_file($_FILES['profile_pic']['tmp_name'], $upload_location);
                $db_location = "uploads/profile/" . $new_name;
                $update_location_query = "UPDATE registration SET profile_pic='$db_location' 
        WHERE id=$from_db_id";
                mysqli_query($db_connetion, $update_location_query);
                header('location:profile.php');
            }



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

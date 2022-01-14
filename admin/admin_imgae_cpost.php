<!-- <?php
// $done = $_FILES['admin_image'];
// print_r($done);
// die();
// require_once '../db.php';

// $uploaded_admin_image_size = $_FILES['admin_image']['size'];
// if ($uploaded_admin_image_size <= 2000000) {
//     $uploaded_admin_image_name = $_FILES['admin_image']['name'];
//     $after_explode = explode('.', $uploaded_admin_image_name);
//     $upload_image_ext = end($after_explode);
//     print_r($upload_image_ext);
//     $allow_extention = array('jpg', 'png', 'jpeg', 'PNG', 'JPG', 'JPEG');
//     if (in_array($upload_image_ext, $allow_extention)) {
//         $insert_admin_query = "INSERT INTO admin_images (image_location)
//         VALUES('praymari_location')";
//         $from_db = mysqli_query($db_connetion, $insert_admin_query);
//         $insert_mysqli_id = mysqli_insert_id($db_connetion);
//         $new_name = $insert_mysqli_id . '.' . $upload_image_ext;
//         $upload_location = "../uploads/admin_image/" . $new_name;
//         move_uploaded_file($_FILES['admin_image']['tmp_name'], $upload_location);
//         $db_location = "/uploads/admin_image/" . $new_name;
//         $update_insert_query = "UPDATE admin_images SET image_location='$upload_location
//         'WHERE id=$insert_mysqli_id";
//         mysqli_query($db_connetion, $update_insert_query);
//         header('location:profile.php');
//     }
// } else {
//     echo 'kora jabe nah';
// } -->

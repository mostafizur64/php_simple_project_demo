<?php
session_start();
if (isset($_SESSION['user_status'])) {
    header('location:admin/dashboard.php');    # code...
}

require_once 'db.php';
$student_email = $_POST['student_email'];
$password = md5($_POST['password']);
$image = $_FILES['profile_pic'];

if ($student_email == null || $password == null) {
    $_SESSION['log_err'] = 'All field must field for first!';
    header('location:login.php');
} else {
    $checking_query = "SELECT COUNT(*) AS total_users FROM registration WHERE student_email='$student_email'
 AND password='$password'";
    $after_db_connection = mysqli_query($db_connetion, $checking_query);
    $after_assoc = mysqli_fetch_assoc($after_db_connection);
    // print_r($after_assoc);
    if ($after_assoc['total_users'] == 1) {
        $_SESSION['admin_email'] = $student_email;

        $_SESSION['user_status'] = 'YEs';
        header('location:admin/dashboard.php');
    } else {
        $_SESSION['log_err'] = 'Your data is not match or u can register your data again !';
        header('location:login.php');
    }
}

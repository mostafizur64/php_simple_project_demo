<?php

// print_r($_POST);
session_start();
require_once '../db.php';
//print_r($_POST);
$student_email = $_POST['student_email'];

$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confrim_password = $_POST['confrim_password'];
if ($new_password == $confrim_password) {
    if ($new_password == $old_password) {
        echo "old password cannot be a as a new password";
    } else {
        $enc_old_pass = md5($old_password);

        $checking_old_pass_query = "SELECT COUNT(*) AS total_user  FROM registration WHERE
     student_email='$student_email' AND password='$enc_old_pass'";

        //     $checking_old_pass_query = "SELECT COUNT(*) AS total_user  FROM registration WHERE
        //  student_email='$student_email' AND student_password='$enc_old_pass' ";
        $after_db = mysqli_query($db_connetion, $checking_old_pass_query);
        $after_assoc = mysqli_fetch_assoc($after_db);
        //print_r($after_assoc);


        if ($after_assoc['total_user'] == 1) {

            $enc_new_password = md5($new_password);

            $update_pass_query = "UPDATE registration SET password='$enc_new_password' 
        WHERE student_email='$student_email'";

            mysqli_query($db_connetion, $update_pass_query);

            $_SESSION['chage_pass_done'] = 'your Old Password change successfully!';

            header('location:change_password.php');
        } else {
            echo ' old password did not match!';
        }
    }
} else {
    echo 'new password and confrim pass dit not mass';
}

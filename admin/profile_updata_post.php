<?php
session_start();
require_once '../db.php';
$student_email = $_POST['student_email'];
$student_name = filter_var($_POST['student_name'], FILTER_SANITIZE_STRING);
$student_phone = $_POST['student_phone'];
if (strlen($student_phone) == 11) {
    $update_query = "UPDATE registration SET student_name='$student_name',
student_phone='$student_phone'
 WHERE student_email='$student_email'";
    mysqli_query($db_connetion, $update_query);
    //$after_fatch_assoc = mysqli_fetch_assoc($mysqli_query);
    header('location:profile.php');
} else {
    $_SESSION['number_valid_err'] = "this is invalid number";
    header('location: profile_edit.php');
}

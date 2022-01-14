<?php
session_start();

//db information
require_once 'db.php';

$student_name = filter_var($_POST['student_name'], FILTER_SANITIZE_STRING);
$student_email = filter_var($_POST['student_email'], FILTER_SANITIZE_EMAIL);
$student_phone = $_POST['student_phone'];
$password = $_POST['password'];
$after_validation_students_email = filter_var($_POST['student_email'], FILTER_VALIDATE_EMAIL);




$all_cap = preg_match('@[A-Z]@', $password);
$all_small = preg_match('@[a-z]@', $password);
$all_number = preg_match('@[0-9]@', $password);
$pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
$all_chars = preg_match($pattern, $password);



if ($_POST['student_name'] == NULL || $_POST['student_email'] == NUll || $_POST['student_phone'] == NULL || $_POST['password'] == NULL) {
  $_SESSION['reg_err'] = "all field must be fillup";
  header('location:RegistrationForm.php');
} else {
  if (strlen($student_phone) == 11) {
    $checking_query = "SELECT  COUNT(*) AS total_value FROM registration WHERE  student_email='$student_email'";
    $result_form_db = mysqli_query($db_connetion, $checking_query);

    $after_assoc = mysqli_fetch_assoc($result_form_db);

    if ($after_assoc['total_value'] == 0) {

      if ($after_validation_students_email) {

        if (strlen($password) >= 6 && $all_cap == 1 && $all_small == 1 && $all_number == 1 && $all_chars == 1) {
          $encrypt_pass = md5($password);
          $insert_query = "INSERT INTO registration(student_name,student_email,student_phone,password) 
          VALUES('$student_name','$student_email','$student_phone','$encrypt_pass')";
          mysqli_query($db_connetion, $insert_query);
          $_SESSION['reg_success'] = "Congratulation ! data submited successfully.";
          header('location:RegistrationForm.php');
          # code...
          # code...
        } else {
          $_SESSION['reg_err'] = "password must be small and capital letter digit and speacil charecher! ";
          header('location:RegistrationForm.php');
        }
        # code...
      } else {
        $_SESSION['reg_err'] = "imvalid email provaited";
        header('location:RegistrationForm.php');
      }
    } else {
      $_SESSION['reg_err'] = "already extied";
      header('location:RegistrationForm.php');
    }
  } else {
    $_SESSION['reg_err'] = "Invalid Mobile number";
    header('location:RegistrationForm.php');
  }
}
// $insert_query = "INSERT INTO registration(student_name,student_email,student_phone,password) VALUES('$student_name','$student_email','$student_phone','$password')";
// mysqli_query($db_connetion, $insert_query);

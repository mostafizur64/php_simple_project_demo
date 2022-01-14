<?php
session_start();
require_once '../db.php';
// print_r($_POST);
// die();
$guest_name = $_POST['guest_name'];
$guest_email = $_POST['guest_email'];
$guest_subject = $_POST['guest_subject'];
$guest_message = $_POST['guest_message'];

$flag = true;
if (!$guest_name) {
    $_SESSION['guest_name_err'] = "guest_name filed first";
    $flag = false;
}
if (!$guest_email) {
    $_SESSION['guest_email_err'] = "guest_email filed first";
    $flag = false;
}
if (!$guest_subject) {
    $_SESSION['guest_subject_err'] = "guest_subject filed first";
    $flag = false;
}
if (!$guest_message) {
    $_SESSION['guest_message_err'] = "guest_message filed first";
    $flag = false;
}
if ($flag) {
    $message_insert_query = "INSERT INTO  messages(guest_name,guest_email,guest_subject,guest_message)
       VALUES('$guest_name','$guest_email','$guest_subject','$guest_message')";
    mysqli_query($db_connetion, $message_insert_query);
    $_SESSION['guest_message_done'] = "your massage is insert to database succesfully!";
    header('location:../index.php');
    // echo 'done';
    // $message_insert_query = "INSERT INTO guest_messages (guset_name,guest_email,guset_subject,
    //  guset_message) VALUES ('$guest_name','$guest_email','$guest_subject','$guest_message')";
    // mysqli_query($db_connetion, $message_insert_query);
    // $_SESSION['guest_message_done'] = "your massage is insert to database succesfully!";
    // header('location:../index.php');
    // // echo 'done';
    // $insert_query = "INSERT INTO guest_messages(guset_name,guest_email,guset_subject,guset_message) 
    // VALUES('$guest_name ','$guest_email','$guest_subject','$guest_message')";
    // mysqli_query($db_connetion, $insert_query);
    // $_SESSION['guest_message_done'] = "Congratulation ! data submited successfully.";
    // header('location:../index.php');
    // echo  'data insert kora jabe';
} else {
    header('location:../index.php');
}

//  session_start();
// require_once '../db.php';
// //print_r($_POST);


// $guest_name=$_POST['guest_name'];
// $guest_email=$_POST['guest_email'];
// $guest_subject=$_POST['guest_subject'];
// $guest_massage=$_POST['guest_massage'];



// $flag= true;

// if(!$guest_name){

//     $_SESSION['guest_name_err']="All filed fill up first";
//     $flag=false;
// }
// if(!$guest_email){

//     $_SESSION['guest_email_err']="All filed fill up first";
//     $flag=false;
// }
// if(!$guest_subject){

//     $_SESSION['guest_subject_err']="All filed fill up first";
//     $flag=false;
// }
// if(!$guest_massage){

//     $_SESSION['guest_msg_err']="All filed fill up first";
//     $flag=false;
// }
// if($flag){
//    $guest_insert_query= "INSERT INTO geust_massages (guest_name,guest_email,guest_subject,guest_massage) VALUES 
//    ('$guest_name','$guest_email','$guest_subject','$guest_massage')";
//    mysqli_query($db_connect,$guest_insert_query);

//    $_SESSION['guest_msg_succes']="your massage recievd ! we will cal you asap";
//    header('location: ../index.php');
// }
// else{
//     header('location: ../index.php');
// } -->
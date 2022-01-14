<?php
require_once '../db.php';
$id = $_GET['msg_id'];
$update_message = "UPDATE messages SET read_status=2 WHERE id=$id ";
$update_message_query = mysqli_query($db_connetion, $update_message);
header('location:guest_message_status.php');

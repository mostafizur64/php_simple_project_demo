<?php
require_once '../db.php';
$id = $_GET['msg_id'];
$delete_query = "DELETE FROM messages WHERE id=$id";

mysqli_query($db_connetion, $delete_query);
header('location:guest_message_status.php');

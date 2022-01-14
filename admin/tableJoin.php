<?php
require_once '../db.php';
$done = "SELECT * FROM banners
ORDER BY id DESC";
echo $done;

<?php
session_start();
require_once '../inc/header.php';
require_once 'navbar.php';

require_once '../db.php';
require_once 'check_admin.php';
$login_email = $_SESSION['admin_email'];
$checking_query = "SELECT student_name,student_phone  FROM registration 
WHERE student_email='$login_email'";
$after_db_connection = mysqli_query($db_connetion, $checking_query);
$after_assoc = mysqli_fetch_assoc($after_db_connection);




?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="card mt-4">
                <div class="card-header  d-flex justify-content-between">
                    <h5 class="card-tittle">user list</h4>
                        <a href="profile_edit.php" class="btn btn-sm btn-primary">Edit</a>
                </div>

                <div class="card-body">
                    <p><strong class="card-tittle me-3 ">student_name:</strong><?= $after_assoc['student_name'] ?></p>
                    <p><strong class="card-tittle me-3 ">student_phone:</strong><?= $after_assoc['student_phone'] ?></p>

                </div>
            </div>



        </div>



    </div>

</div>

<?php
require_once '../inc/footer.php'
?>
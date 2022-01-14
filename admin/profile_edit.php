<?php
session_start();
require_once '../inc/header.php';
require_once 'navbar.php';
require_once '../db.php';
require_once 'check_admin.php';

$login_email = $_SESSION['admin_email'];



$checking_query = "SELECT student_name,student_phone  FROM registration WHERE
 student_email='$login_email'";
$after_db_connection = mysqli_query($db_connetion, $checking_query);
$after_assoc = mysqli_fetch_assoc($after_db_connection);


?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card mt-4">
                <div class="card-header  d-flex justify-content-between">
                    <h5 class="card-tittle">user list</h4>
                </div>
                <?php
                if (isset($_SESSION['number_valid_err'])) {

                ?>
                    <div class="alert alert-danger" role="alert">

                        <?php
                        echo $_SESSION['number_valid_err'];
                        unset($_SESSION['number_valid_err']);
                        ?>
                    </div>

                <?php
                }
                ?>
                <div class="card-body">
                    <form action="profile_updata_post.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Student_Name</label>
                            <input type="hidden" class="form-control" name="student_email" value="<?= $login_email ?>">
                            <input type="text" class="form-control" name="student_name" value="<?= $after_assoc['student_name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Student_phone</label>
                            <input type="text" class="form-control" name="student_phone" value="<?= $after_assoc['student_phone'] ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>



        </div>

    </div>


</div>



</div>



<?php
require_once '../inc/footer.php'
?>
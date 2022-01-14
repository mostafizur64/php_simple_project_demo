<?php
session_start();
require_once '../inc/header.php';
require_once 'navbar.php';
require_once '../db.php';
require_once 'check_admin.php';
$login_email = $_SESSION['admin_email'];


?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card mt-4">
                <div class="card-header  d-flex justify-content-between">
                    <h5 class="card-tittle">change password</h4>
                </div>
                <?php
                if (isset($_SESSION['chage_pass_done'])) :

                ?>
                    <div class="alert alert-success" role="alert">

                        <?php
                        echo $_SESSION['chage_pass_done'];
                        unset($_SESSION['chage_pass_done']);
                        ?>
                    </div>

                <?php
                endif
                ?>
                <div class="card-body">
                    <form action="change_password_post.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Old password</label>
                            <input type="hidden" class="form-control" name="student_email" value="<?= $login_email ?>">
                            <input type="password" class="form-control" name="old_password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control" name="new_password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confrim Password</label>
                            <input type="password" class="form-control" name="confrim_password">
                        </div>
                        <button type="submit" class="btn btn-warning">Change</button>
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
<?php

require_once 'inc/header.php';
if (isset($_SESSION['user_status'])) {
    header('location:admin/dashboard.php');    # code...
}
?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="card-titlle d-flex justify-content-between">
                        <h5>simple form</h5>
                        <a href="login.php" class="">login</a>
                    </div>
                </div>

                <div class="card-body">
                    <?php
                    if (isset($_SESSION['reg_err'])) {

                    ?>
                        <div class="alert alert-danger" role="alert">

                            <?php
                            echo $_SESSION['reg_err'];
                            unset($_SESSION['reg_err']);
                            ?>
                        </div>

                    <?php
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['reg_success'])) {

                    ?>
                        <div class="alert alert-success" role="alert">

                            <?php
                            echo $_SESSION['reg_success'];
                            unset($_SESSION['reg_success']);
                            ?>
                        </div>

                    <?php
                    }
                    ?>



                    <form action="registration_form.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Student Name</label>
                            <input type="text" class="form-control" name="student_name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="student_email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="student_phone">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
<?php
require_once 'inc/footer.php';
?>
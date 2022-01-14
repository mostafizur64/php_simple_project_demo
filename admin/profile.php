<?php
session_start();
require_once '../inc/header.php';
require_once 'navbar.php';

require_once '../db.php';
require_once 'check_admin.php';
$login_email = $_SESSION['admin_email'];
$checking_query = "SELECT student_name,student_phone,profile_pic FROM registration 
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
                    <td><img src="../<?= $after_assoc['profile_pic'] ?>" alt="" style="width: 100px; height: 100px;"></td>

                </div>
            </div>



        </div>
        <div class="col-sm-4">
            <div class="card  mt-4">
                <div class="card-header">
                    <h4>profile image</h4>
                    <?php
                    if (isset($_SESSION['image_name_err'])) {

                    ?>
                        <div class="alert alert-success" role="alert">

                            <?php
                            echo $_SESSION['image_name_err'];
                            unset($_SESSION['image_name_err']);
                            ?>
                        </div>

                    <?php
                    }
                    ?>
                </div>
                <div class="card-body">
                    <form action="profile_picture.php" method="post" enctype="multipart/form-data">
                        <div class="me-3">
                            <input type="file" name="profile_pic" class="form-control">

                        </div>
                        <div class="me-3 mt-4">
                            <button class="btn btn-success">add</button>
                        </div>
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
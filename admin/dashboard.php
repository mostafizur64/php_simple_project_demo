<?php
session_start();
require_once '../inc/header.php';
require_once 'navbar.php';
require_once '../db.php';
require_once 'check_admin.php';


$checking_query = "SELECT * FROM registration";
$after_db_connection = mysqli_query($db_connetion, $checking_query);


?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card mt-4">
                <div class="car-header  d-flex justify-content-between">
                    <div class="card-tittle ">
                        <h4>user list</h4>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>user name</th>
                                <th>user email</th>
                                <th>user phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($after_db_connection as $value) :
                            ?>
                                <tr>
                                    <td><?= $value['student_name'] ?></td>
                                    <td><?= $value['student_email'] ?></td>
                                    <td><?= $value['student_phone'] ?></td>
                                </tr>
                            <?php
                            endforeach
                            ?>
                        </tbody>


                    </table>
                </div>

            </div>

        </div>


    </div>



</div>



<?php
require_once '../inc/footer.php'
?>
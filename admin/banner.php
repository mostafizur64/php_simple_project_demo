<?php
session_start();
require_once '../inc/header.php';
require_once 'navbar.php';
require_once '../db.php';
?>
<?php
$after_banners_query = "SELECT * FROM banners";
$after_mysqli_connection = mysqli_query($db_connetion, $after_banners_query);


?>


<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="card mt-4">
                <div class="card-header  bg-warning">
                    <div class="card-title">
                        <h5>banner and From</h5>
                        <?php
                        if (isset($_SESSION['banne_insert_err'])) {

                        ?>
                            <div class="alert alert-danger" role="alert">

                                <?php
                                echo $_SESSION['banne_insert_err'];
                                unset($_SESSION['banne_insert_err']);
                                ?>
                            </div>

                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="card-body">
                    <form action="banner_post.php" method="post" enctype="multipart/form-data">
                        <div class="mt-3">
                            <input type="text" name="sub_title" class="form-control" placeholder="enter your sub title here!">
                        </div>
                        <div class="mt-3">
                            <input type="text" name="title_top" class="form-control" placeholder="enter your title_top here!">
                        </div>
                        <div class="mt-3">
                            <input type="text" name="title_bottom" class="form-control" placeholder="enter your title_bottom here!">
                        </div>
                        <div class="mt-3">
                            <input type="text" name="details" class="form-control" placeholder="enter your details here!">
                        </div>
                        <div class="mt-3">
                            <input type="file" name="banner_imgae" class="form-control">
                        </div>
                        <div class="mt-3">
                            <button class="form-control btn  btn-danger">add</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card mt-4">
                <div class="card-header bg-warning">
                    <h5> banner </h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sub_title</th>
                                <th>title_top</th>
                                <th>title_bottom</th>
                                <th>details</th>
                                <th>location</th>
                                <th>active status</th>
                                <th>action</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($after_mysqli_connection as $values) : ?>
                                <tr>
                                    <td><?= $values['sub_title'] ?></td>
                                    <td><?= $values['title_top'] ?></td>
                                    <td><?= $values['title_bottom'] ?></td>
                                    <td><?= $values['details'] ?></td>
                                    <td><img src="../<?= $values['image_location'] ?>" alt="not_load" style="width: 100px; height: 100px;"></td>
                                    <td>
                                        <?php
                                        if ($values['active_status'] == 1) :
                                        ?>
                                            <span class="badge badge-sm bg-success">active</span>
                                        <?php else : ?>
                                            <span class="badge badge-sm bg-danger">deactive</span>
                                        <?php
                                        endif
                                        ?>


                                    </td>

                                    <td>

                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <?php if ($values['active_status'] == 1) : ?>
                                                <a href="banner_active.php?id=<?= $values['id'] ?>" class="btn btn-warning btn-sm">Active</a>
                                            <?php else : ?>
                                                <a href="banner_deactive.php?id=<?= $values['id'] ?>" class="btn btn-dark btn-sm">deactive</a>
                                            <?php endif ?>
                                            <a href="banner_edit.php?id=<?= $values['id'] ?>" class="btn btn-info btn-sm">Edit</a>
                                            <a href="banner_delete.php?id=<?= $values['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </td>href
                                    <td></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>



<?php
require_once '../inc/footer.php';

?>
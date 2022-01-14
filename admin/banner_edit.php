<?php
session_start();
require_once '../inc/header.php';
require_once 'navbar.php';
require_once '../db.php';
?>
<?php
$id = $_GET['id'];
// $sub_title = $_POST['sub_title'];
// $title_top = $_POST['title_top'];
// $title_bottom = $_POST['title_bottom'];
// $details = $_POST['details'];
$update_banners_query = "SELECT * FROM  banners WHERE id=$id";
$from_query = mysqli_query($db_connetion, $update_banners_query);
$after_assoc = mysqli_fetch_assoc($from_query);
?>


<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
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
                    <form action="banner_edit_post.php" method="post" enctype="multipart/form-data">
                        <div class="mt-3">
                            <input type="hidden" name="id" class="form-control" value="<?= $after_assoc['id'] ?>">
                        </div>
                        <div class="mt-3">
                            <input type="text" name="sub_title" class="form-control" value="<?= $after_assoc['sub_title'] ?>">
                        </div>
                        <div class="mt-3">
                            <input type="text" name="title_top" class="form-control" value="<?= $after_assoc['title_top'] ?>">
                        </div>
                        <div class="mt-3">
                            <input type="text" name="title_bottom" class="form-control" value="<?= $after_assoc['title_bottom'] ?>">
                        </div>
                        <div class=" mt-3">
                            <input type="text" name="details" class="form-control" value="<?= $after_assoc['details'] ?>">
                        </div>

                        <div class="mt-3">
                            <input type="file" name="banner_imgae" class="form-control">
                        </div>
                        <div class="mt-3">
                            <img src="../<?= $after_assoc['image_location'] ?>" width="100px" height="100px">
                            <!-- <input type="text" name="banner_imgae" class="form-control" value="<? ?>"> -->
                        </div>
                        <div class="mt-3">
                            <button class="form-control btn  btn-danger">add</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>



<?php
require_once '../inc/footer.php';

?>
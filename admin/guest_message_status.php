<?php
session_start();
require_once '../db.php';
require_once '../inc/header.php';
?>

<?php
$guset_message_query = "SELECT * FROM  messages";
$after_mysqli_query = mysqli_query($db_connetion, $guset_message_query);

?>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card mt-4 ">
                <div class="card-header bg-warning">
                    <div class="card-tittle">
                        <h5 class="">Guest status list</h5>


                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-borderd">
                        <thead>
                            <th>guest sl NO.</th>
                            <th>guest name</th>
                            <th>guest email</th>
                            <th>guest subject</th>
                            <th>guest message</th>
                            <th>action</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($after_mysqli_query as $key =>  $values) : ?>
                                <tr class="<?= ($values['read_status'] == 1) ? "bg-info" : "text-dark";

                                            ?>">
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $values['guest_name'] ?></td>
                                    <td><?= $values['guest_email']; ?></td>
                                    <td><?= $values['guest_subject']; ?></td>
                                    <td><?= $values['guest_message']; ?></td>
                                    <td>
                                        <?php
                                        if ($values['read_status'] == 1) : ?>
                                            <a href="guest_message_read.php?msg_id=<?= $values['id']; ?>" class='btn btn-sm btn-warning'>mark as read</a>
                                        <?php
                                        endif;
                                        ?>
                                        <a href="guest_message_delete.php?msg_id=<?= $values['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
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
require_once '../inc/header.php';
?>
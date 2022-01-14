<?php

require_once 'check_admin.php';

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Visit Website</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="guest_message_status.php">Guest Message
                                <?php
                                require_once '../db.php';
                                $get_unread_message_query = "SELECT COUNT(*) AS unread_message FROM messages WHERE read_status=1";
                                $unread_msg_form_db = mysqli_query($db_connetion, $get_unread_message_query);
                                $after_assoc = mysqli_fetch_assoc($unread_msg_form_db);

                                ?>
                                <span class="badge rounded-pill bg-danger text-dark ms-2"><?= $after_assoc['unread_message'] ?></span>

                            </a></li>
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item" href="banner.php">Banner</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>

            </ul>
            <div class="dropdown">
                <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <?php
                    echo $_SESSION['admin_email'];
                    ?>
                    <?php
                    $login_email = $_SESSION['admin_email'];
                    $checking_query = "SELECT student_name,student_phone,profile_pic FROM registration 
                    WHERE student_email='$login_email'";
                    $after_db_connection = mysqli_query($db_connetion, $checking_query);
                    $after_assoc = mysqli_fetch_assoc($after_db_connection);


                    ?>

                    <img src="../<?= $after_assoc['profile_pic'] ?>" width="20" height="20" style="border-radius: 50%;">
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="profile.php
                    ">profile</a></li>
                    <li><a class="dropdown-item" href="change_password.php">Change Password</a></li>
                    <li><a class="dropdown-item" href="../logout.php">logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
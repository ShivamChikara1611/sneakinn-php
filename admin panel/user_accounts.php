<?php
include '../components/connect.php';

if (isset($_COOKIE['seller_id'])) {
    $seller_id = $_COOKIE['seller_id'];
} else {
    $seller_id = '';
    header('location:login.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneakinn - Registered users page</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/a0b40e4559.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="main-container">
        <?php include '../components/admin_header.php' ?>
        <section class="dashboard">
            <div class="overlay"></div>
            <div class="user-container">
            <div class="heading">
                <h1>registered users</h1>
            </div>

            <div class="box-container">
                <?php
                $select_users = $conn->prepare("SELECT * FROM `users`");
                $select_users->execute();

                if ($select_users->rowCount() > 0) {
                    while ($fetch_users = $select_users->fetch(PDO::FETCH_ASSOC)) {
                        $user_id = $fetch_users['id'];

                ?>
                <div class="box">
                    <div class="image-profile-update">
                    <div class="img-box">
                    <img src="../uploaded_files/<?= $fetch_users['image']; ?>"></div></div>
                    <p>user id : <span><?= $user_id; ?></span></p>
                    <p>user name : <span><?= $fetch_users['name']; ?></span></p>
                    <p>user email : <span><?= $fetch_users['email']; ?></span></p>
                </div>
                <?php
                    }
                } else {
                    echo '
                        <div class="empty">
                            <p>no user registered yet!</p>
                        </div>
                        ';
                }
                ?>
            </div>
            </div>
        </section>
    </div>








    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="../js/admin_script.js"></script>

    <?php include '../components/alert.php' ?>
</body>

</html>
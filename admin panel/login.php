<?php
include '../components/connect.php';

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $select_seller = $conn->prepare("SELECT * FROM `sellers` WHERE email = ? AND password = ?");
    $select_seller->execute([$email, $pass]);
    $row = $select_seller->fetch(PDO::FETCH_ASSOC);

    if ($select_seller->rowCount() > 0){
        setcookie('seller_id', $row['id'], time() + 60*60*24*30, '/');
        header('location:dashboard.php');
    }else{
        $warning_msg[] = 'incorrect email or password!';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneakinn - Seller Login page</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/a0b40e4559.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="form-container form-log-container">
        <form action="" method="post" enctype="multipart/form-data" class="register">
            <h3>login now</h3>

            <div class="input-field">
                <p>your email <span>*</span></p>
                <input type="email" name="email" placeholder="enter your email" maxlength="50" required class="box">
            </div>

            <div class="input-field">
                <p>your password <span>*</span></p>
                <input type="password" name="pass" placeholder="enter your password" maxlength="50" required class="box">
            </div>

            <p class="link">do not have an account? <a href="register.php">register now</a></p>
            <input type="submit" name="submit" value="login now" class="btn">
        </form>
    </div>








    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="../js/admin_script.js"></script>

    <?php include '../components/alert.php' ?>
</body>

</html>
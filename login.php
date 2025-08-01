<?php
include './components/connect.php';

if (isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
}

if (isset($_POST['submit'])){
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
    $select_user->execute([$email, $pass]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if ($select_user->rowCount() > 0){
        setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
        header('location:index.php');
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
    <title>Sneakinn - User Login page</title>
    <link rel="stylesheet" type="text/css" href="./css/user_style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/a0b40e4559.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php include './components/user_header.php'; ?>
    <div class="banner">
        <div class="overlay"></div>
        <div class="detail">
            <h1>login</h1>
            <p>Welcome back! Log in to access exclusive deals and track your orders. Don't have an account? Sign up now for the latest updates!</p>
            <span><a href="index.php">home</a><i class="fa-solid fa-greater-than"></i>login</span>
        </div>
    </div>

    <div class="login-page">
        <div class="form-container">
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
                <button type="submit" name="submit" value="login now" class="btn">Login now</button>
            </form>
        </div>
    </div>






    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="js/script.js"></script>
    
    <?php include './components/alert.php'; ?>
    <?php include './components/footer.php'; ?>

</body>

</html>
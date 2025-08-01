<?php
include './components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

//sending message 
if (isset($_POST['send_message'])) {
    if ($user_id != '') {

        $id = unique_id();

        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);

        $subject = $_POST['subject'];
        $subject = filter_var($subject, FILTER_SANITIZE_STRING);

        $message = $_POST['message'];
        $message = filter_var($message, FILTER_SANITIZE_STRING);

        $verify_message = $conn->prepare("SELECT * FROM `message` WHERE user_id = ? AND name = ? AND email = ? AND subject = ? AND message = ? ");
        $verify_message->execute([$user_id, $name, $email, $subject, $message]);

        if ($verify_message->rowCount() > 0) {
            $wraning_msg[] = 'message already exist';
        } else {
            $insert_message = $conn->prepare("INSERT INTO `message` (id, user_id, name ,email , subject, message) VALUES (?,?,?,?,?,?)");
            $insert_message->execute([$id, $user_id, $name, $email, $subject, $message]);

            $success_msg[] = 'comment insertd successfully';

        }
    } else {
        $wraning_msg[] = 'please login first';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneakinn - Contact Us page</title>
    <link rel="stylesheet" type="text/css" href="./css/user_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/a0b40e4559.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php include './components/user_header.php'; ?>
    <div class="banner">
        <div class="overlay"></div>
        <div class="detail">
            <h1>contact us</h1>
            <p>For inquiries, feedback, or assistance, please don't hesitate to reach out to our dedicated customer support team.</p>
            <span><a href="index.php">home</a><i class="fa-solid fa-greater-than"></i>contact us</span>
        </div>
    </div>

    <div class="services">
        <div class="heading">
            <h1>Our Services</h1>
            <p>Just a few click to make the reservation Online For Saving Your time and Money</p>
        </div>

        <div class="box-container">
            <div class="box">
                <img src="image/deliver(1).png" class="img">
                <div>
                    <h1>free shipping fast</h1>
                    <p>Enjoy free, lightning-fast shipping on all shoe orders! Get your perfect pair delivered straight to your doorstep with our speedy delivery service. Shop now!</p>
                </div>
            </div>

            <div class="box">
                <img src="image/return(1).png" class="img">
                <div>
                    <h1>money back & guarantee</h1>
                    <p>At Air Max Shoes, we stand behind our products. If you're not satisfied, return them within 30 days for a full refund. Your satisfaction is guaranteed</p>
                </div>
            </div>

            <div class="box">
                <img src="image/support.png" class="img">
                <div>
                    <h1>online support 24/7</h1>
                    <p>Need assistance? Our online support team is here to help you with any queries or concerns regarding your shoe purchase. Contact us anytime for prompt assistance!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="form-container">
        <div class="heading">
            <h1>drop us a line </h1>
            <p>Just a few click to make The Reservation Online For Saving Your Time and Money </p>
        </div>
        <form action="" method="post" class="register">
            <div class="input-field">
                <label>name <sup>*</sup></label>
                <input type="text" name="name" placeholder="enter your name" required class="box">
            </div>
            <div class="input-field">
                <label>email <sup>*</sup></label>
                <input type="email" name="email" placeholder="enter your email" required class="box">
            </div>
            <div class="input-field">
                <label>subject <sup>*</sup></label>
                <input type="text" name="subject" placeholder="reason..." required class="box">
            </div>
            <div class="input-field">
                <label>comment <sup>*</sup></label>
                <textarea name="message" cols="30" rows="10" placeholder="your comment..." required class="box textarea"></textarea>
            </div>
            <button type="submit" name="send_message" class="btn">send message</button>
        </form>
    </div>

    <div class="address">
        <div class="overlay"></div>
        <div class="heading">
            <h1>our contact details</h1>
            <p>Just a few click to make The Reservation Online For Saving Your Time and Money </p>
        </div>
        <div class="box-container">
            <div class="box">
                <i class="fa-solid fa-map-location-dot"></i>
                <div>
                    <h4>address</h4>
                    <p>Jain University <br> Ramanagar, Bangalore, 562112</p>
                </div>
            </div>

            <div class="box">
                <i class="fa-solid fa-phone"></i>
                <div>
                    <h4>phone number</h4>
                    <p>+91 7078026885</p>
                    <p>+91 7470626038</p>
                </div>
            </div>

            <div class="box">
                <i class="fa-solid fa-envelope"></i>
                <div>
                    <h4>email</h4>
                    <p>s.chikara6885@gmial.com</p>
                    <p>balduashyam@gmail.com</p>
                </div>
            </div>
        </div>
    </div>







    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="js/script.js"></script>

    <?php include './components/alert.php'; ?>
    <?php include './components/footer.php'; ?>

</body>

</html>
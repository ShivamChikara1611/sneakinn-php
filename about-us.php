<?php
include 'components/connect.php';
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneakinn - About us page</title>
    <link rel="stylesheet" type="text/css" href="./css/user_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/a0b40e4559.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php include 'components/user_header.php'; ?>

    <!-- banner -->
    <div class="banner">
        <div class="overlay"></div>
        <div class="detail">
            <h1>About us</h1>
            <p>Escape the chaos, leave stress behind, and step into a world of tranquility <br> with our shoes. Each stride becomes a journey to serenity, easing tensions and inviting blissful relaxation.</p>
            <span> <a href="index.php">home</a><i class="fa-solid fa-greater-than"></i>about us</span>
        </div>
    </div>

    <!-- workers -->
    <div class="worker">
        <div class="box-container">
            <div class="box">
                <div class="heading">
                    <span>Fiona Doe</span>
                    <h1>Footwear Designer</h1>
                </div>
                <p>A footwear designer blends creativity with functionality to craft stylish and practical shoe designs. They meticulously consider trends, materials, and consumer preferences, aiming to create footwear that not only looks appealing but also offers comfort and durability. Their passion for fashion and attention to detail drive innovation in the shoe industry.</p>
                <div class="flex-btn">
                    <a href="" class="btn">explore our menu</a>
                    <a href="menu.php" class="btn">visit our shop</a>
                </div>
            </div>

            <div class="box">
                <img src="image/footwear-designer.png" class="img">
            </div>
        </div>
    </div>

    <!-- workers section part -->
    <div class="story">
        <div class="heading">
            <h1>our story</h1>
        </div>
        <p>A footwear designer blends creativity with functionality to craft stylish and practical shoe designs. They meticulously consider trends, materials, and consumer preferences, aiming to create footwear that not only looks appealing but also offers comfort and durability. Their passion for fashion and attention to detail drive innovation in the shoe industry.</p>
        <a href="menu.php" class="btn">our services</a>
    </div>

    <div class="container">
        <div class="box-container">
                <img src="image/shoe-designer.jpeg">
            <div class="box">
                <div class="heading">
                    <h1>Walk the Talk in Sneakinn Shoes.</h1>
                </div>
                <p>Walk the Talk in Sneakinn Shoes embodies our commitment to delivering footwear that not only speaks to style but also ensures comfort and quality with every step you take.</p>
                <a href="" class="btn">Learn more</a>
            </div>
        </div>
    </div>


    <!-- testimonial -->
    <div class="main-test">
        <div class="testimonial">
            <div class="heading">
                <h1>Testimonial</h1>
            </div>
            <div class="testimonial-container">
                <div class="slide-row" id="slide">
                    <div class="slide-col">
                        <div class="user-text">
                            <p>As a busy nurse, comfort and durability are non-negotiable when it comes to my footwear. I stumbled upon Nike's shoes and I couldn't be happier! Not only are they stylish, but they keep my feet supported during long shifts. Highly recommend!</p>
                            <h2>Sarah</h2>
                            <p>Registered Nurse</p>
                        </div>
                        <div class="user-img">
                            <img src="image/testimonial1.jpeg">
                        </div>
                    </div>
    
                    <div class="slide-col">
                        <div class="user-text">
                            <p>Being a fitness trainer, I'm always on my feet, constantly moving. Air Max's shoes have become my go-to for workouts and everyday wear. The support and flexibility they offer are unmatched, keeping me going strong from dawn till dusk!</p>
                            <h2>Mike</h2>
                            <p>Fitness Trainer</p>
                        </div>
                        <div class="user-img">
                            <img src="image/testimonial2.jpeg">
                        </div>
                    </div>
    
                    <div class="slide-col">
                        <div class="user-text">
                            <p>As a frequent traveler, I need shoes that can keep up with my adventures. I discovered Blazer's through a friend's recommendation, and I'm so glad I did! These shoes are not only comfortable for walking miles exploring new cities, but they're also stylish enough for any occasion</p>
                            <h2>Emily</h2>
                            <p>Travel Blogger</p>
                        </div>
                        <div class="user-img">
                            <img src="image/testimonial3.jpeg">
                        </div>
                    </div>
    
                    <div class="slide-col">
                        <div class="user-text">
                            <p>As a freelance photographer, I'm always on the lookout for shoes that can withstand long hours on various terrains while still looking professional. Jordan exceeded my expectations! Their shoes provide the perfect balance of comfort and style, allowing me to focus on capturing the perfect shot without worrying about my feet.</p>
                            <h2>Alex</h2>
                            <p>Freelance Photographer</p>
                        </div>
                        <div class="user-img">
                            <img src="image/testimonial4.jpeg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="indicator">
                <span class="btn1 active"></span>
                <span class="btn1"></span>
                <span class="btn1"></span>
                <span class="btn1"></span>
            </div>
        </div>
    </div>













    <?php include 'components/footer.php'; ?>

    <script src="./js/user_script.js"></script>
</body>

</html>
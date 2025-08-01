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
    <title>Sneakinn - Home page</title>
    <link rel="stylesheet" type="text/css" href="./css/user_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/a0b40e4559.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php include 'components/user_header.php'; ?>

    <!-- -----slider section start ---------- -->
    <div class="slider-container">
        <div class="slider">
            
            <div class="slideBox active">
                <div class="overlay"></div>
                <div class="textBox">
                    <h1> we pride ourselfs on <br> exceptional varities</h1>
                    <a href="menu.php" class="btn"> shop now</a>
                </div>
                <div class="imgBox">
                    <img src="image/banner12.png">
                </div>
            </div>

            <div class="slideBox">
                <div class="overlay"></div>
                <div class="textBox">
                    <h1>Sole mates, <br> where style meets comfort </h1>
                    <a href="menu.php" class="btn"> shop now</a>
                </div>
                <div class="imgBox">
                    <img src="image/banner9.png">
                </div>
            </div>

            <ul class="controls">
                <li onclick="nextSlide();" class="next"><i class="fa-solid fa-arrow-right"></i></li>
                <li onclick="prevSlide();" class="prev"><i class="fa-solid fa-arrow-left"></i></li>
            </ul>
        </div>
    </div>
    <!-- -----slider section end ---------- -->


    <div class="service">
        <div class="box-container">

            <!-- ------------ service item box -----  -->
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/delivery-truck.png" class="img1">
                        <img src="image/delivery-truck(1).png" class="img2">
                    </div>
                </div>
                <div class="detail">
                    <h4>delivery</h4>
                    <span>100% secure</span>
                </div>
            </div>


            <!-- ------------ service item box -----  -->
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/payment.png" class="img1">
                        <img src="image/payment(1).png" class="img2">
                    </div>
                </div>
                <div class="detail">
                    <h4>payment</h4>
                    <span>100% secure</span>
                </div>
            </div>


            <!-- ------------ service item box -----  -->
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/support(1).png" class="img1">
                        <img src="image/support.png" class="img2">
                    </div>
                </div>
                <div class="detail">
                    <h4>support</h4>
                    <span>24*7 hours</span>
                </div>
            </div>


            <!-- ------------ service item box -----  -->
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/gift.png" class="img1">
                        <img src="image/gift(1).png" class="img2">
                    </div>
                </div>
                <div class="detail">
                    <h4>gift service</h4>
                    <span> support gift services </span>
                </div>
            </div>


            <!-- ------------ service item box -----  -->
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/return.png" class="img1">
                        <img src="image/return(1).png" class="img2">
                    </div>
                </div>
                <div class="detail">
                    <h4>returns</h4>
                    <span>24*7 Free Return</span>
                </div>
            </div>


            <!-- ---------service item box--------  -->
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/deliver.png" class="img1">
                        <img src="image/deliver(1).png" class="img2">
                    </div>
                </div>
                <div class="detail">
                    <h4>deliver</h4>
                    <span>24*7 free return </span>
                </div>
            </div>

        </div>
    </div>

    <!-- -----categories section ---------- -->
    <div class="categories">
        <div class="heading">
            <h1>catogeries features </h1>
        </div>

        <div class="box-container">
            <div class="box">
                <img src="image/shoe10.jpg">
                <a href="menu.php" class="btn">Formal</a>
            </div>

            <div class="box">
                <img src="image/shoe46.jpg">
                <a href="menu.php" class="btn">Sports</a>
            </div>

            <div class="box">
                <img src="image/shoe17.webp">
                <a href="menu.php" class="btn">Casual</a>
            </div>

            <div class="box">
                <img src="image/shoe50.webp">
                <a href="menu.php" class="btn">Party-Wear</a>
            </div>

        </div>
    </div>



    <!-- add a banner image -->
    <div class="home-banner">
        <div class="overlay"></div>
        <h1>Made for <br> <span>Work . Play . All day</span></h1>
    </div>

    <div class="variety">
        <div class="heading">
            <span>Variety </span>
            <h1>buy any shoe @ get one free</h1>
        </div>
        <div class="box-container">
            <div class="box">
                <img src="image/shoe32.webp">
                <div class="detail">
                    <h2>Shoe-perior quality, unbeatable prices.</h2>
                </div>
            </div>

            <div class="box">
                <img src="image/shoe26.webp">
                <div class="detail">
                    <h2>Shoe-perior quality, unbeatable prices.</h2>
                </div>
            </div>

            <div class="box">
                <img src="image/shoe33.webp">
                <div class="detail">
                    <h2>Shoe-perior quality, unbeatable prices.</h2>
                </div>
            </div>

        </div>
    </div>


    <!-- another section for shoe lovers -->

    <div class="motivate-container">
        <div class="overlay"></div>
        <div class="detail">
            <h1>Feeling blue? <br> Let our shoes put a spring in your step</h1>
            <p>
                When life's weight brings you down, our shoes offer a lift, a burst of color, a touch of comfort. They're not just footwear; they're mood boosters, turning each step into a dance of joy. So, when you're feeling blue, let our shoes be the spring in your step.</p>
            <a href="menu.php" class="btn">shop now</a>

        </div>
    </div>


    <!-- variety two -->

    <div class="variety2">


        <div class="t-banner">
            <div class="overlay"></div>
            <div class="detail">
                <h1>Indulge in shoe therapy and put your best foot forward.</h1>
                <p>Soothe your soles and lift your spirits with our therapeutic footwear !!</p>
                <a href="menu.php" class="btn btn-new">shop now</a>
            </div>
        </div>


        <div class="box-container">

            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/shoe5.webp">
                <div class="box-details fadeIn-bottom">
                    <h1>Air Max</h1>
                    <p>Life's a journey – walk it in style.</p>
                    <a href="menu.php" class="btn">explore more</a>
                </div>
            </div>

            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/shoe8.webp">
                <div class="box-details fadeIn-bottom">
                    <h1>Jordan</h1>
                    <p>Life's a journey – walk it in style.</p>
                    <a href="menu.php" class="btn">explore more</a>
                </div>
            </div>

            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/shoe16.webp">
                <div class="box-details fadeIn-bottom">
                    <h1>Blazers</h1>
                    <p>Life's a journey – walk it in style.</p>
                    <a href="menu.php" class="btn">explore more</a>
                </div>
            </div>

            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/shoe21.webp">
                <div class="box-details fadeIn-bottom">
                    <h1>Jordan</h1>
                    <p>Life's a journey – walk it in style.</p>
                    <a href="menu.php" class="btn">explore more</a>
                </div>
            </div>

            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/shoe22.webp">
                <div class="box-details fadeIn-bottom">
                    <h1>Air Max</h1>
                    <p>Life's a journey – walk it in style.</p>
                    <a href="menu.php" class="btn">explore more</a>
                </div>
            </div>

            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/shoe32.webp">
                <div class="box-details fadeIn-bottom">
                    <h1>Blazers</h1>
                    <p>Life's a journey – walk it in style.</p>
                    <a href="menu.php" class="btn">explore more</a>
                </div>
            </div>

        </div>
    </div>


    <!-- hot deals section -->

    <div class="hot-deal">
        <div class="box-container">
            <img src="image/banner4.jpg">
            <div class="detail">
                <h1>Hot Deal ! Sale up to <span>20%off</span> </h1>
                <p>expired</p>
                <a href="menu.php" class="btn">shop now</a>
            </div>
        </div>
    </div>



    <!-- usage section -->

    <div class="usage">
        <div class="heading">
            <h1>how it works</h1>
        </div>

        <div class="row">
            <div class="box-container">
                <div class="box">
                    <img src="image/market_research.png">
                    <div class="detail">
                        <h3>Market Research and Design</h3>
                        <p>Analyze market trends and consumer preferences to understand which styles are popular.</p>
                    </div>
                </div>

                <div class="box">
                    <img src="image/production_planning.png">
                    <div class="detail">
                        <h3>Production Planning</h3>
                        <p>Plan the production schedule based on the expected demand and available resources.</p>
                    </div>
                </div>

                <div class="box">
                    <img src="image/quality_control.png">
                    <div class="detail">
                        <h3>Quality Control</h3>
                        <p>Inspect the finished products for defects or deviations from design specifications.</p>
                    </div>
                </div>

            </div>

            <img src="image/logo.jpg" style="border-radius: 50%;" class="divider">

            <div class="box-container">
                <div class="box">
                    <img src="image/delivery-truck.png">
                    <div class="detail">
                        <h3>Packaging and Distribution</h3>
                        <p>Pack the finished shoes in branded boxes and prepare them for shipping.</p>
                    </div>
                </div>

                <div class="box">
                    <img src="image/sales_marketing.png">
                    <div class="detail">
                        <h3>Sales and Marketing</h3>
                        <p>Launch marketing initiatives to promote new products, often through social media, online ads.</p>
                    </div>
                </div>

                <div class="box">
                    <img src="image/support.png">
                    <div class="detail">
                        <h3>Customer Service and Feedback</h3>
                        <p>Handle customer inquiries and provide assistance with product selection or issues.</p>
                    </div>
                </div>

            </div>

        </div>
    </div>


    <!-- pride section -->

    <div class="pride">
        <div class="overlay"></div>
        <div class="detail">
            <h1>We Pride Ourselves on <br> Exceptional Varities.</h1>
            <p>With each stitch, we weave the stories of craftsmanship, resilience, and innovation. From humble beginnings to global strides, our shoes tread paths of excellence. Proudly, we stride forward, knowing that in every step, we shape comfort, style, and identity. Our legacy, etched in every sole, walks with the world.</p>
            <a href="menu.php" class="btn">shop now </a>
        </div>
    </div>






    <?php include 'components/footer.php'; ?>

    <script src="./js/user_script.js"></script>
</body>

</html>
<?php
include './components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

$pid = $_GET['pid'];
include 'components/add_wishlist.php';
include 'components/add_cart.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneakinn - Product Detail page</title>
    <link rel="stylesheet" type="text/css" href="./css/user_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/a0b40e4559.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php include './components/user_header.php'; ?>
    <div class="banner">
        <div class="detail">
            <h1>Product Detail</h1>
            <p>Discover our latest collection of stylish and comfortable shoes designed to elevate your everyday look. Explore now!</p>
            <span><a href="index.php">home</a><i class="fa-solid fa-greater-than"></i>Product Detail</span>
        </div>
    </div>

    <section class="view_page">
        <div class="overlay"></div>
        <div class="heading">
            <h1>product detail</h1>
        </div>

        <?php
        if (isset($_GET['pid'])) {
            $pid = $_GET['pid'];
            $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
            $select_products->execute([$pid]);

            if ($select_products->rowCount() > 0) {
                while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {

        ?>

        <form action="" method="post" class="box">
                <img src="uploaded_files/<?= $fetch_products['image']; ?>">
            <div class="detail">
                <?php if ($fetch_products['stock'] > 9) { ?>
                    <span class="stock" style="color:green;">In stock</span>
                <?php } elseif ($fetch_products['stock'] == 0) { ?>
                    <span class="stock" style="color:red;">out of stock</span>
                <?php } else { ?>
                    <span class="stock" style="color:red;">Hurry only <?= $fetch_products['stock']; ?> left</span>
                <?php } ?>

                <div class="name"><?= $fetch_products['name']; ?></div>
                <p class="product-detail"><?= $fetch_products['product_detail']; ?></p>
                <p class="price"> $<?= $fetch_products['price']; ?>/-</p>
                <input type="hidden" name="product_id" value="<?= $fetch_products['id']; ?>">

                <div class="button">
                    <button type="submit" name="add_to_wishlist" class="btn">add to wishlist <i class="fa-regular fa-heart"></i> </button>
                    <input type="hidden" name="qty" value="1" min="0" class="quantity">
                    <button type="submit" name="add_to_cart" class="btn">add to cart <i class="fa-solid fa-cart-shopping"></i> </button>
                </div>
            </div>
        </form>


        <?php

                }
            }
        }
        ?>
    </section>

    <div class="similar-product">
        <div class="overlay"></div>
        <div class="products">
            <div class="heading">
                <h1>similar products</h1>
                <p>Step into style with our latest collection! Explore similar products for more comfort, durability, and trendy designs to suit your every step.</p>
            </div>

            <?php include 'components/shop.php'; ?>
        </div>
    </div>








    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="js/user_script.js"></script>

    <?php include './components/alert.php'; ?>
    <?php include './components/footer.php'; ?>

</body>

</html>
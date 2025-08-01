<?php
include './components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
    header('location:login.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneakinn - User order page</title>
    <link rel="stylesheet" type="text/css" href="./css/user_style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/a0b40e4559.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php include './components/user_header.php'; ?>
    <div class="banner">
        <div class="overlay"></div>
        <div class="detail">
            <h1>my orders</h1>
            <p>Browse our latest collection of stylish and comfortable shoes. Order now for fast delivery and enjoy free returns. Step into fashion today!</p>
            <span><a href="index.php">home</a><i class="fa-solid fa-greater-than"></i>my orders</span>
        </div>
    </div>

    <div class="orders">
        <div class="heading">
            <h1>my order</h1>
        </div>

        <div class="box-container container2">
            <?php
            $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ? ORDER  BY date DESC");
            $select_orders->execute([$user_id]);

            if ($select_orders->rowCount() > 0) {
                while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
                    $product_id = $fetch_orders['product_id'];

                    $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
                    $select_products->execute([$product_id]);

                    if ($select_products->rowCount() > 0) {
                        while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {

            ?>
            <div class="box">
                <a href="view_order.php?get_id=<?= $fetch_orders['id']; ?>">
                    <img src="uploaded_files/<?= $fetch_products['image']; ?>" class="image">
                    <p class="date"><i class="fa-solid fa-calendar"></i><?= $fetch_orders['date']?></p>
                    <div class="content">
                        <div class="row">
                            <h3 class="name"><?= $fetch_products['name'] ?></h3>
                            <p class="price">Price: $<?= $fetch_products['price']; ?>/-</p>
                            <p class="status" style="color:<?php if ($fetch_orders['status'] == 'delivered') {echo "green";
                            } elseif ($fetch_orders['status'] == 'cancelled') {
                                echo "red";
                            } else {
                                echo "orange";
                            } ?>"> <?= $fetch_orders['status']; ?>
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <?php
                        }
                    }
                }
            } else {
                echo '<p class="empty">no order take placed yet!</p>';
            }
            ?>

        </div>
    </div>









    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="js/user_script.js"></script>

    <?php include './components/alert.php'; ?>
    <?php include './components/footer.php'; ?>

</body>

</html>
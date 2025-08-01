<?php
include '../components/connect.php';

if (isset($_COOKIE['seller_id'])) {
    $seller_id = $_COOKIE['seller_id'];
} else {
    $seller_id = '';
    header('location:login.php');
}

//update order from database
if (isset($_POST['update_order'])) {

    $order_id = $_POST['order_id'];
    $order_id = filter_var($order_id, FILTER_SANITIZE_STRING);

    $update_payment = $_POST['update_payment'];
    $update_payment = filter_var($update_payment, FILTER_SANITIZE_STRING);

    $update_status = $_POST['update_status'];
    $update_status = filter_var($update_status, FILTER_SANITIZE_STRING);

    $update_pay = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
    $update_pay->execute([$update_payment, $order_id]);
    $success_msg[] = 'order payment status updated';

    $update_stat = $conn->prepare("UPDATE `orders` SET status = ? WHERE id = ?");
    $update_stat->execute([$update_status, $order_id]);
    $success_msg[] = 'order payment status updated';
}

//delete order
if (isset($_POST['delete_order'])) {

    $delete_id = $_POST['order_id '];
    $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

    $verify_delete = $conn->prepare("SELECT * FROM `orders` WHERE id = ?");
    $verify_delete->execute([$delete_id]);

    if ($verify_delete->rowCount() > 0) {

        $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
        $delete_order->execute([$delete_id]);

        $success_msg[] = 'order deleted ';
    } else {
        $warning_msg[] = 'order already deleted';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneakinn - Admin page</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/a0b40e4559.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="main-container">
        <?php include '../components/admin_header.php';?>
        <section class="dashboard">
            <div class="overlay"></div>
            <div class="order-container">
            <div class="heading">
                <h1>total orders placed</h1>
            </div>

            <div class="box-container">
                <?php
                    $select_order = $conn->prepare("SELECT * FROM `orders` WHERE seller_id = ?");
                    $select_order->execute([$seller_id]); 

                    if ($select_order->rowCount()>0){
                        while($fetch_order = $select_order->fetch(PDO::FETCH_ASSOC)){
                ?>  
                <div class="box">
                    <div class="status" style="color: <?php if($fetch_order['status']=='in progress'){echo "limegreen";}else{echo "red";} ?>"><?= $fetch_order['status']; ?></div>
                    
                    <div class="details">
                        <p>user name : <span><?= $fetch_order['name']; ?></span></p>
                        <p>user id : <span><?= $fetch_order['user_id']; ?></span></p>
                        <p>placed on : <span><?= $fetch_order['date']; ?></span></p>
                        <p>user number : <span><?= $fetch_order['number']; ?></span></p>
                        <p>user email : <span><?= $fetch_order['email']; ?></span></p>
                        <p>total price : <span>$<?= $fetch_order['price']; ?>/-</span></p>
                        <p>payment method : <span><?= $fetch_order['method']; ?></span></p>
                        <p>user address : <span><?= $fetch_order['address']; ?></span></p>
                    </div>

                    <form action="" method="post">
                        <input type="hidden" name="order_id" value="<?= $fetch_order['id']; ?>">

                        <p>payment status</p>
                        <select name="update_payment" class="box" style="width: 90%;">
                            <option selected><?= $fetch_order['payment_status']; ?></option>
                            <option value="pending">pending</option>
                            <option value="delivered">order delivered</option>
                        </select>

                        <p>product completion status</p>
                        <select name="update_status" class="box" style="width: 90%;">
                            <option selected><?= $fetch_order['status']; ?></option>
                            <option value="in progress">in progress</option>
                            <option value="cancelled">cancel</option>
                            <option value="delivered">delivered</option>
                        </select>

                        <div class="flex-btn">
                            <button type="submit" name="update_order" value="update payment" class="btn" >update order</button>
                            <button type="submit" name="delete_order" value="delete payment" class="btn
                            " onclick="return confirm('delete this order'); " >delete order</button>
                        </div>
                    </form>
                </div>
                <?php
                    }
                }else{
                    echo '
                            <div class="empty">
                                <p>no order placed yet!</p>
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
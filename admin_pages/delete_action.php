<?php

//action to delete product
if (isset($_GET['delete_product'])) {
    $delete_id = $_GET['delete_product'];
    echo $delete_id;

    //delete query
    $delete_query = "DELETE from `products` where product_id = $delete_id";
    $result_product = mysqli_query($con, $delete_query);
    if ($result_product) {
        echo "<script>alert('product deleted successfully')</script>";
        echo "<script>window.open('./admin_index1.php', '_self')</script>";
    }
}


//action to delete orders
if (isset($_GET['delete_order'])) {
    $delete_order_id = $_GET['delete_order'];
    echo $delete_order_id;

    //delete query
    $delete_order_query = "DELETE from `user_orders` where order_id = $delete_order_id";
    $result_order = mysqli_query($con, $delete_order_query);
    if ($result_order) {
        echo "<script>alert('order deleted successfully')</script>";
        echo "<script>window.open('./admin_index1.php', '_self')</script>";
    }
}


//action to delete payments
if (isset($_GET['delete_payment'])) {
    $delete_payment_id = $_GET['delete_payment'];
    echo $delete_payment_id;

    //delete query
    $delete_payment_query = "DELETE from `user_payments` where payment_id = $delete_payment_id";
    $result_payment = mysqli_query($con, $delete_payment_query);
    if ($result_payment) {
        echo "<script>alert('payment deleted successfully')</script>";
        echo "<script>window.open('./admin_index1.php', '_self')</script>";
    }
}


//action to delete users
if (isset($_GET['delete_user'])) {
    $delete_user_id = $_GET['delete_user'];
    echo $delete_user_id;

    //delete query
    $delete_user_query = "DELETE from `user_tabel` where user_id = $delete_user_id";
    $result_user = mysqli_query($con, $delete_user_query);
    if ($result_user) {
        echo "<script>alert('user deleted successfully')</script>";
        echo "<script>window.open('./admin_index1.php', '_self')</script>";
    }
}
?>
<!-- <a href=""></a> -->

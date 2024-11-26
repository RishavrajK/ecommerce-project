<?php
include('admin_pages/database.php');
include('function/common_function.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles/styles2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    include('HF/main_header.php')
    ?>
    <div class="container" style="height: 70vh;">
        <h2>Your Shopping Cart</h2>

        <div class="cart">
            <!-- Cart Items -->
            <div class="cart-items">
                <!-- This show cart data from data bases -->
                <?php
                global $con;
                $ip_add = getIPAddress();
                $total_price = 0;
                $cart_query = "select * from `cart_details` where ip_address = '$ip_add'";
                $result = mysqli_query($con, $cart_query);
                // checks wheather cart is empty or not 
                $result_count = mysqli_num_rows($result);
                if ($result_count > 0) {
                    //if cart is empty show the else part if not run the while loop

                    while ($row = mysqli_fetch_array($result)) {
                        $product_id = $row['product_id'];
                        $select_products = "select * from `products` where product_id = '$product_id'";
                        $result_products = mysqli_query($con, $select_products);
                        while ($row_product_price = mysqli_fetch_array($result_products)) {
                            $product_price = array($row_product_price['product_price']);
                            $price_table = $row_product_price['product_price'];
                            $product_title = $row_product_price['product_title'];
                            $product_image1 = $row_product_price['product_image1'];
                            $product_values = array_sum($product_price);
                            $total_price += $product_values;

                ?>
                            <!-- Example Item 1 -->
                            <form action="" method="post">
                                <div class="cart-item">
                                    <img src="./admin_pages/product_img/<?php echo $product_image1; ?>">
                                    <div class="cart-item-details">
                                        <h3><?php echo $product_title; ?></h3>
                                        <p>Size: 42</p>
                                        <p class="price">Price: <?php echo $price_table; ?>/-</p>
                                    </div>
                                    <div class="cart-item-actions">
                                        <label for="qty">Qty:</label>
                                        <input type="text" id="quantity" name="qty" value="0">
                                        <!-- code for updating quantity -->
                                        <?php
                                        $ip_add = getIPAddress();
                                        if (isset($_POST['update_cart'])) {
                                            $quantities = $_POST['qty'];
                                            $update_cart = "update `cart_details` set quantity = $quantities where ip_address = '$ip_add'";
                                            $result_products_quantity = mysqli_query($con, $update_cart);
                                            $total_price = $total_price * $quantities;
                                        }
                                        ?>
                                        <input type="checkbox" value="<?php echo $product_id; ?>" name="removeitem[]">
                                    </div>
                                </div>

                    <?php
                        }
                    }
                } else {
                    echo "<h2 class= 'text-centre text-danger'> CART IS EMPTY</h2>";
                    echo "<a href='collection.php'style='background-color: #e60000; color: white; font-size: 12px; padding: 5px 3px; border: none; border-radius: 4px; cursor: pointer; margin-top: 10px; width: 100%;padding: 10px;'>Continue Shopping</a>";
                }
                    ?>

            </div>


            <!-- Cart Summary -->
            <div class="cart-summary">
                <h3>Order Summary</h3>
                <p class="total-price">Total: <span><?php echo $total_price //total_cart_price();?></span></p>
               <button class="checkout"><a href="checkout.php" class="text-light text-decoration-none">Proceed to Checkout</a></button>
                <!-- <input type="submit" value="Proceed to Checkout" class="checkout" name="checkout"> -->
                <input type="submit" value="Remove" name="remove_cart" style="background-color: #e60000; color: white; font-size: 12px; padding: 5px 3px; border: none; border-radius: 4px; cursor: pointer; margin-top: 10px; width: 100%;padding: 10px;">
                <input type="submit" value="Update cart" class="update-cart" name="update_cart">

            </div>
            </form>
            <!-- function to remove data from cart -->
            <?php
            function remove_cart_item()
            {
                global $con;
                if (isset($_POST['remove_cart'])) {
                    foreach ($_POST['removeitem'] as $remove_id) {
                        echo $remove_id;
                        $delete_query = "delete from `cart_details` where product_id=$remove_id";
                        $run_delete = mysqli_query($con, $delete_query);
                        if ($run_delete) {
                            echo "<script>window,open('cart.php','_self')</script>";
                        }
                    }
                }
            }
            echo $remove_item = remove_cart_item();
            ?>
        </div>
    </div>
    <?php
    include('HF/main_footer.php')
    ?>
</body>

</html>
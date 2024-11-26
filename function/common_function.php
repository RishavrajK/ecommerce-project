<?php
// include databse file
// include('admin_pages/database.php');


// getting product
function getproducts()
{
    global $con;
    $select_query = "select * from `products`";
    $result_query = mysqli_query($con, $select_query);
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_gender = $row['product_gender'];
        $product_price = $row['product_price'];
        $product_image1 = $row['product_image1'];
        echo "
    <div class='cloth-item'>
        <img src='./admin_pages/product_img/$product_image1' alt='..'>
        <h3>$product_title</h3>
        <p>$product_description.</p>
        <p class='price'>$product_gender</p>
        <p class='price'>Price: $product_price/-</p>
        <a href='collection.php?add_to_cart=$product_id' class='buy-button'>Add to cart</a>
    </div>";
    }
}


//home features
function showproduct()
{
    global $con;
    $select_query = "select * from `products`";
    $result_query = mysqli_query($con, $select_query);
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_gender = $row['product_gender'];
        $product_price = $row['product_price'];
        $product_image1 = $row['product_image1'];
        echo "'<div class='product-item'>
                <img src='./admin_pages/product_img/$product_image1'style='object-fit: contain;'>
                <h3>$product_title</h3>
                <p>Price: ₹$product_price/-</p>
                <a href='collection.php' class='btn'>View Product</a>
            </div>";
    }
}


// cart function
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip_add = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "select * from `cart_details` where ip_address = '$ip_add' and product_id= $get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present')</script>";
            echo "<script>window.open('collection.php','_self')</script>";
        } else {
            $insert_query = "insert into `cart_details`(product_id, ip_address, quantity) values($get_product_id, '$ip_add', 0)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('Added to cart')</script>";
            echo "<script>window.open('collection.php','_self')</script>";
        }
    }
}

// Showing no.of item in cart in cart icon
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip_add = getIPAddress();
        $select_query = "select * from `cart_details` where ip_address = '$ip_add' ";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $con;
        $ip_add = getIPAddress();
        $select_query = "select * from `cart_details` where ip_address = '$ip_add' ";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}


// Total price function
// subtotal can edited

function total_cart_price()
{
    global $con;
    $ip_add = getIPAddress();
    $total_price = 0;
    $cart_query = "select * from `cart_details` where ip_address = '$ip_add'";
    $result = mysqli_query($con, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_products = "select * from `products` where product_id = '$product_id'";
        $result_products = mysqli_query($con, $select_products);
        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }
    echo $total_price;
}



//function for pending_orders
//get users orders details

function get_user_order_details()
{
    global $con;
    $username = $_SESSION['username'];
    $get_details = "SELECT * from `user_tabel`where username='$username'";
    $result_query = mysqli_query($con, $get_details);
    while ($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query['user_id'];
        //checks wheather if these parameter is set or not
        if (!isset($_GET['edit_account'])) {
            //my_order
            if (!isset($_GET['my_orders'])) {
                //delete_account
                if (!isset($_GET['delete_account'])) {
                    $get_orders = "SELECT * from `user_orders`where user_id=$user_id and order_status='pending'";
                    $result_order_query = mysqli_query($con, $get_orders);
                    $row_count = mysqli_num_rows($result_order_query);
                    if ($row_count > 0) {
                        echo "<h2 style='color:#06a706; margin-top:15px;'>You have <span style='color:#d30909;'>$row_count</span> pending orders</h2>
                                <a href='profile.php?my_orders' class='btn'>My Orders</a> ";
                    } else {
                        echo "<h2 style='color:#06a706; margin-top:15px;'>You have <span style='color:#06a706;'>$row_count</span> pending orders</h2>
                                <a href='collection.php' class='btn'>Explore more</a> ";
                    }
                }
                //DA
            }
            //MOrder
        }
        //edit
    }
    //end
}


?>




<!-- get ip address fuction -->
<?php
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();
// echo 'User Real IP Address - '.$ip;  

?>
<?php
include('admin_pages/database.php');
include('function/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style4.css">
    <title>Sign Up</title>
</head>
<style>
    .form {
        margin-top: 35px;
        display: flex;
        flex-direction: column;
    }
</style>

<body>

    <div class="container">
        <?php
        include('HF/main_header1.php')
        ?>
        <form class="form" id="signup-form" action="" method="POST">
            <h2>REGISTER</h2>
            <!-- username field -->
            <div class="input-group">
                <label for="user_username">Username</label>
                <input type="text" id="user_username" name="user_username" placeholder="Enter Username" autocomplete="off" required>
            </div>
            <!-- email field -->
            <div class="input-group">
                <label for="user_email">Email</label>
                <input type="email" id="user_email" name="user_email" placeholder="Enter Email" autocomplete="off" required>
            </div>
            <!-- password field -->
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="user_password" placeholder="Enter Password" autocomplete="off" required>
            </div>
            <!-- conform password field -->
            <div class="input-group">
                <label for="conf_user_password">Conform Password</label>
                <input type="password" id="conf_user_password" name="conf_user_password" placeholder="Conform Password" autocomplete="off" required>
            </div>
            <!-- user_address field -->
            <div class="input-group">
                <label for="user_addres">Address</label>
                <input type="text" id="user_addres" name="user_address" placeholder="Enter Address" autocomplete="off" required>
            </div>
            <!-- contact field -->
            <div class="input-group">
                <label for="user_mobile">Contact</label>
                <input type="text" id="user_mobile" name="user_mobile" placeholder="Enter contact information" autocomplete="off" required>
            </div>
            <!-- submit field -->
            <div>
                <input type="submit" value="Sign Up" name="user_register" class="button" style="padding-left: 150px; padding-right: 150px;">
            </div>
            <p class="message">Already registered? <a href="user_login.php">Login</a></p>
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    // hassing of password
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];
    $user_ip = getIPAddress();

    //this query checks wheather same username or email exist or not
    // we are using elseif to check two condition one of which is conform password
    $select_query = "SELECT * FROM `user_tabel` where username = '$user_username' or user_email ='$user_email'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    if ($row_count > 0) {
        echo "<script>alert('username and email already exist')</script>";
    } elseif ($user_password != $conf_user_password) {
        echo "<script>alert('password does not match')</script>";
    } else {

        //insert query
        //`user_tabel` check the spelling 

        $insert_query = "insert into `user_tabel` (username, user_email, user_password, user_ip, user_address, user_mobile) values('$user_username','$user_email','$hash_password','$user_ip','$user_address','$user_mobile')";
        $sql_execute = mysqli_query($con, $insert_query);
        if ($sql_execute) {
            echo "<script>alert('data inserted')</script>";
        } else {
            die(mysqli_error($con));
        }
    }
    //selecting cart items
    $select_Cart_items = "SELECT * FROM `cart_details` where ip_address = '$user_ip'";
    $result_cart = mysqli_query($con, $select_Cart_items);
    $row_count = mysqli_num_rows($result_cart);
    if ($row_count > 0) {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('you have item in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    } else {
        echo "<script>window.open('user_login.php','_self')</script>";
    }
}

?>
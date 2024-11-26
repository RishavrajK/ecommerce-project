<?php
include('database.php');
// include('function/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLothify | ADMIN</title>
    <link rel="stylesheet" href="styles/style1.css">
    <link rel="stylesheet" href="styles/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="overflow-x: hidden;">
    <!-- include header -->
    <section>

        <nav style="height:55px;">

            <div class="logo">
                <a href="http://">Clothify.</a>
                <!-- <img src="logo.png" alt="CLOTHIFY" class="logo"> -->
            </div>

            <ul>
                <!-- <li><a href="#home">Home</a></li>
                <li><a href="#about">About us</a></li>
                <li><a href="collection.php">Products</a></li> -->
                <?php
                @session_start();
                //display username 
                if (!isset($_SESSION['username1'])) {
                    echo "<li><a href='admin_register.php'>Register</a></li>";
                } else {
                    echo "<li><a href='admin_index1.php'>Welcome <span style= 'text-transform: capitalize;'>" . $_SESSION['username1'] . "</span> </a></li>";
                }



                //session checker if user has logged in 
                if (!isset($_SESSION['username1'])) {
                    echo "<li><a href='admin_login.php'>Login</a></li>";
                } else {
                    echo "<li><a href='logout.php'>Logout</a></li>";
                }

                ?>
                <!-- <li><a href="user_login.php">Login</a></li> -->
            </ul>
        </nav>
    </section>


    <!-- Profile Content -->
    <div class="profile-container">
        <div class="profile-header">
            <h1>User Profile</h1>
        </div>

        <!-- Profile Navigation Buttons -->
        <div class="profile-nav">
            <!-- <a href="profile.php" class="btn">User Profile</a> -->
            <a href="admin_index1.php?insert_product" class="btn">Insert product</a>
            <a href="admin_index1.php?view_product" class="btn">View product</a>
            <a href="admin_index1.php?list_orders" class="btn">All order</a>
            <a href="admin_index1.php?list_payments" class="btn">All payments</a>
            <a href="admin_index1.php?list_user" class="btn">List User</a>
            <a href="logout.php" class="btn">Logout</a>
        </div>

        <!-- Profile Details Placeholder -->
        <div class="profile-details">

            <?php

            //inserting products
            if (isset($_GET['insert_product'])) {
                include('insert_product.php');
            }


            //viewing products
            if (isset($_GET['view_product'])) {
                include('view_product.php');
            }


            //deleting products
            if (isset($_GET['delete_product'])) {
                include('delete_action.php');
            }
            //deleting orders
            if (isset($_GET['delete_order'])) {
                include('delete_action.php');
            }
            //deleting payments
            if (isset($_GET['delete_payment'])) {
                include('delete_action.php');
            } 
            //deleting user
            if (isset($_GET['delete_user'])) {
                include('delete_action.php');
            }


            //viewing orders
            if (isset($_GET['list_orders'])) {
                include('list_orders.php');
            }           
            
            
            //viewing payments
            if (isset($_GET['list_payments'])) {
                include('list_payments.php');
            }
            
            
            //viewing User
            if (isset($_GET['list_user'])) {
                include('list_user.php');
            }


            ?>


        </div>
    </div>


    <!-- include footer -->
    <footer>
        <div class="footer_main">

            <div class="tag">
                <a href="#" style="font-family: 'Berkshire Swash', serif; font-weight: 400; font-style: normal; font-size: 185%;">Clothify.</a>
                <!-- <img src="logo.png"> -->
                <p>
                    Welcome to Clothify, where fashion meets individuality. Our curated collections are designed to empower you to express your unique style, whether you're dressing for a casual day out or a special occasion.
                </p>

            </div>

            <div class="tag">
                <h1>Quick Link</h1>
                <a href="../index.php">Home</a>
                <a href="../about_us.php">About</a>
            </div>

            <div class="tag">
                <h1>Contact Info</h1>
                <a href="#"><i class="fa-solid fa-person"></i> Rishav Raj</a>
                <a href="#"><i class="fa-solid fa-university"></i> University Roll no.- 216011342482</a>
                <a href="#"><i class="fa-solid fa-location"></i> BSK College, Barharwa</a>
                <a href="#"><i class="fa-solid fa-phone"></i>+91 620155149</a>
                <a href="#"><i class="fa-solid fa-envelope"></i>rishavraj3378kant@gmail.com</a>

            </div>

            <div class="tag">
                <h1>Follow Us</h1>
                <div class="social_link">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-linkedin-in"></i>
                </div>

            </div>


        </div>

        <p class="end">Design By<span><i class="fa-solid fa-face-grin"></i> Rishav Raj</span></p>

    </footer>
</body>

</html>
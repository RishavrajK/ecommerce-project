<?php
include('admin_pages/database.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clothify | Checkout </title>
    <link rel="stylesheet" href="styles/style3.css">
</head>
<style>
    .cloth-item img {
        width: 59%;

    }
</style>

<body>

    <!-- include header -->
    <?php
    include('HF/main_header1.php')
    ?>
    <!-- callin cart function -->


    <div class="container">
        <h2>Checkout</h2>

        <div class="cloth-collection" style="display:unset;">
            <!-- php code to check wheather user has logged in -->

            <?php

            if (!isset($_SESSION['username'])) {
                include('user_login1.php');
            } else {
                include('payment.php');
            }

            ?>
            <!-- end -->
        </div>
    </div>

    <!-- include footer -->
    <?php
    include('HF/main_footer.php')
    ?>
</body>

</html>
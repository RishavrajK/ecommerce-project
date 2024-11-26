<?php
include('admin_pages/database.php');
include('function/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clothify Store | collection </title>
    <link rel="stylesheet" href="styles/style3.css">
</head>
<style>.cloth-item img {
        width: 200px;
        height: 300px;
        object-fit: contain;

}</style>
<body>

<!-- include header -->
    <?php
    include('HF/main_header.php')
    ?>
    <!-- callin cart function -->
    <?php
    cart();
    ?>
    <!-- cloth Collection -->
    <div class="container">
        <h2>Our Collection</h2>
        <!-- displaying the products -->
        <div class="cloth-collection">
        <!-- product function -->
            <?php
                getproducts();
                // $ip = getIPAddress();  
                // echo 'User Real IP Address - '.$ip; 

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
<!-- <a href="./profile.php"></a> -->
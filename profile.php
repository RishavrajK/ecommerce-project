<?php
include('admin_pages/database.php');
include('function/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLothify | Profile</title>
    <link rel="stylesheet" href="styles/style1.css">
</head>

<body style="overflow-x: hidden;">
    <!-- include header -->
    <?php
    include('HF/main_header.php');
    ?>


    <!-- Profile Content -->
    <div class="profile-container">
        <div class="profile-header">
            <h1>User Profile</h1>
        </div>

        <!-- Profile Navigation Buttons -->
        <div class="profile-nav">
            <!-- <a href="profile.php" class="btn">User Profile</a> -->
            <a href="profile.php" class="btn">Pending Orders</a>
            <a href="profile.php?edit_account" class="btn">Edit Account</a>
            <a href="profile.php?my_orders" class="btn">My Orders</a>
            <a href="profile.php?delete_account" class="btn">Delete Account</a>
            <a href="./logout.php" class="btn">Logout</a>
        </div>

        <!-- Profile Details Placeholder -->
        <div class="profile-details">
            <?php
            if (!isset($_SESSION['username'])) {
                echo "<h2>Welcome guest</h2>";
            } else {
                echo "<h2>Welcome, <span class='cap'>" . $_SESSION['username'] . "</span></h2>";
            }
            ?>
            <!-- <h2>Welcome, John Doe!</h2> -->
            <hr>
            
                <?php
                get_user_order_details();
                
                //check condion for edit_account

                if(isset($_GET['edit_account'])) {
                    include("../project_sem6/user_area/edit_account.php");
                }

                //check condion for my_order

                if(isset($_GET['my_orders'])) {
                    include("../project_sem6/user_area/my_orders.php");
                }

                //delete user account

                if(isset($_GET['delete_account'])) {
                    include("../project_sem6/user_area/delete_account.php");
                }
                ?>
            
        </div>
    </div>


    <!-- include footer -->
    <?php
    include('HF/main_footer.php');
    ?>
</body>

</html>
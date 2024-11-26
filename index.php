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
    <title>Clothify | Home</title>
    <link rel="stylesheet" href="styles/styles1.css">
</head>
<body>
<body>

    <!-- Include header -->
    <?php
    include('HF/main_header1.php')
    ?>

    <!-- Banner Section -->
    <div class="banner">
        <img src="img/simg.jpg" alt="Banner" class="banner-image">
        <div class="banner-text" style="backdrop-filter: blur(10px);">
            <h1>Welcome to Our Clothing Store</h1>
            <p>Discover the best fashion trends for all seasons!</p>
            <a href="collection.php" class="btn">Shop Now</a>
        </div>
    </div>

    <!-- Products Section -->
    <div class="products-section">
        <h2>Featured Products</h2>
        <div class="products-grid">
            <!-- <div class="product-item">
                <img src="tshirt.jpg" alt="T-Shirt">
                <h3>T-Shirt</h3>
                <p>$20</p>
                <a href="product.html?id=1" class="btn">View Product</a>
            </div> -->
            <?php
            showproduct();
            
            ?>
            
        </div>
        <div class="view-more">
            <a href="collection.php" class="btn">View More Products</a>
        </div>
    </div>

    <!-- Include footer -->
    <footer style="border-top:1px solid #089da1;">
    <?php
    include('HF/main_footer.php')
    ?>
    </footer>

</body>
</html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
    }

    section {
        width: 100%;
        height: 9vh;
        background-size: cover;
        background-position: center;
    }

    section nav {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-around;
        box-shadow: 0 0 10px #089da1;
        background: #fff;
        position: fixed;
        left: 0;
        z-index: 100;
    }

    section nav .logo a {
        /* section nav img.logo { */
        font-family: "Berkshire Swash", serif;
        font-weight: 400;
        font-style: normal;
        font-size: 185%;
        /* width: 50%; */
        cursor: pointer;
        margin: 15px 0;
        text-decoration: none;
        color: #000;
    }

    section nav ul {
        list-style: none;
    }

    section nav li {
        display: inline-block;
        padding: 0 10px;
    }

    section nav li a {
        text-decoration: none;
        color: #000;
    }

    section nav li a:hover {
        color: #089da1;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<section>

    <nav style="height:55px;">

        <div class="logo">
            <a href="./index.php">Clothify.</a>
            <!-- <img src="logo.png" alt="CLOTHIFY" class="logo"> -->
        </div>
        <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="../ecommerce-project/about_us.php">About us</a></li>
            <li><a href="collection.php">Products</a></li>
            <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a></li>
            <?php
            @session_start();
            //display username 
            if (!isset($_SESSION['username'])) {
                echo "<li><a href='./user_register.php'>Register</a></li>";
            } else {
                echo "<li><a href='./profile.php'>Welcome <span style= 'text-transform: capitalize;'>" . $_SESSION['username'] . "</span> </a></li>";
                echo "<li><a href='./profile.php'><i class='fa-solid fa-user'></i></a></li>";
            }



            //session checker if user has logged in and showing logged details
            if (!isset($_SESSION['username'])) {
                echo "<li><a href='user_login.php'>Login</a></li>";
            } else {
                echo "<li><a href='logout.php'>Logout</a></li>";
            }

            ?>
            <!-- <li><a href="user_login.php">Login</a></li> -->
        </ul>
    </nav>
</section>
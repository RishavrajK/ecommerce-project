<style>
    footer {
        width: 100%;
        background: #eaeaea;
    }

    footer .footer_main {
        width: 100%;
        display: flex;
        justify-content: space-around;
    }

    footer .footer_main .tag {
        margin: 10px 0;
    }

    footer .footer_main .tag img {
        background-color: #1d1c1c;
        width: 100px;
        margin-bottom: 10px;
    }

    footer .footer_main .tag p {
        width: 250px;
        line-height: 22px;
        text-align: justify;
    }

    footer .footer_main .tag h1 {
        font-size: 25px;
        margin: 25px 0;
        color: #000;
    }

    footer .footer_main .tag a {
        display: block;
        color: black;
        text-decoration: none;
        margin: 10px 0;
    }

    footer .footer_main .tag i {
        margin-right: 10px;
    }

    footer .footer_main .tag .social_link i {
        margin: 0 5px;
    }

    footer .footer_main .tag .search_bar {
        width: 230px;
        height: 30px;
        background: rgba(202, 202, 202);
        border-radius: 25px;
    }

    footer .footer_main .tag .search_bar input {
        width: 200px;
        padding: 2px 0;
        position: relative;
        top: 17%;
        left: 6%;
        border: none;
        outline: none;
        font-size: 13px;
        background: none;
    }

    footer .footer_main .tag .search_bar button {
        padding: 7px 15px;
        background: #089da1;
        border: none;
        margin-top: 15px;
        border-radius: 25px;
        color: #fff;
        cursor: pointer;
    }

    .tag:hover {
        margin: 5px;
        color: lightpink;
        text-shadow: 2px 5px 3;
    }

    footer .end {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 15px;
        color: #000;
    }

    footer .end span {
        color: #089da1;
        margin-left: 10px;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<footer>
    <div class="footer_main">

        <div class="tag">
            <a href="./index.php" style="font-family: 'Berkshire Swash', serif; font-weight: 400; font-style: normal; font-size: 185%;">Clothify.</a>
            <!-- <img src="logo.png"> -->
            <p>
                Welcome to Clothify, where fashion meets individuality. Our curated collections are designed to empower you to express your unique style, whether you're dressing for a casual day out or a special occasion.
            </p>

        </div>

        <div class="tag">
            <h1>Quick Link</h1>
            <a href="./index.php">Home</a>
            <a href="../project_sem6/about_us.php">About</a>
            <a href="../project_sem6/admin_pages/admin_login.php">Admin</a>
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
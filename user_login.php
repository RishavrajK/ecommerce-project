
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
    <title>Login</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body style="overflow-x: hidden;">
<!-- include header -->
<?php
    include('HF/main_header1.php')
    ?>
    <div class="pages" style="height: 80vh;">
        <form action="" method="post">
            <h1>Login</h1> <!-- This is header of login page -->

            <input type="text" name="user_username" placeholder="Username" autocomplete="off" class=" input_box">
            <!-- above form type is for accepting username  -->

            <input type="password" name="user_password" placeholder="Password" autocomplete="off" required class=" input_box">
            <!-- similarly to username this form accepts password -->

            <div class="text_box">
                <p><input type="checkbox" name="checkbox" class="checkbox">Remember me </p>
                <!-- this inputs helps a websites to remember username and password. -->

                <p><a href="#">Forget password</a></p>
                <!-- this particular helps to recover forgeten password -->
            </div>

                <input type="submit" name="user_login" class="input_box" id="login_box" value="Login">
            
            <!-- this accepts info provided to form.  -->

            <div class="text_box2">
                <p>Don't have a account</p>
                <style>

                    form .text_box2 {
                        display: flex;
                        justify-content: space-between;
                        font-size: 17px;
                        margin-top: 10px;
                    }

                    form .text_box2 a {
                        text-decoration: none;
                        color: rgb(17 18 18);
                        transition: 0.3s ease;
                    }

                    .text_box2 a:hover {
                        text-decoration: underline;
                        color: rgb(21, 215, 95);
                    }
                </style>
                <p> <a href="user_register.php">Register</a></p>
                <!-- this will helps to be redirected to sign up page -->

            </div>
        </form>
    </div>
    <?php
    include('HF/main_footer.php')
    ?>
</body>

</html>



<?php

if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];

    $select_query="SELECT * FROM `user_tabel` where username = '$user_username'";
    $result=mysqli_query($con, $select_query);
    $row_count=mysqli_num_rows($result);  // this checks wheather user is logged in or not 
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();



    //cart_items checks for no.of items presenst

    $select_query_cart="SELECT * FROM `cart_details` where ip_address = '$user_ip'";
    $select_cart=mysqli_query($con, $select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);


    if($row_count>0){
        $_SESSION['username']=$user_username;
            if (password_verify($user_password,$row_data['user_password'])){
                // echo "<script>alert('you have logged in successfuly')</script>";
                if($row_count==1 and $row_count_cart==0){               // checks for if user is logged in but has no items in cart then it redirects to profile.php pages
        $_SESSION['username']=$user_username;//session start
                echo "<script>alert('you have logged in successfuly')</script>";
                echo "<script>window.open('profile.php','_self')</script>";

                }else{
        $_SESSION['username']=$user_username;
                    echo "<script>alert('you have logged in successfuly')</script>";
                    echo "<script>window.open('payment.php','_self')</script>";
                }
            }else{
        echo "<script>alert('invalid username or password')</script>";

            }
    }else{
        echo "<script>alert('invalid username or password')</script>";
    }

}

?>
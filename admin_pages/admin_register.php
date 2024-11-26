<?php
include('database.php');
include('../function/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up pages</title>
</head>
<style>
    /* General Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    .container {
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .form {
        display: flex;
        flex-direction: column;
        text-align: center;
        border-radius: 10px;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        font-size: 1.5em;
    }

    .input-group {
        margin-bottom: 15px;
    }

    .input-group label {
        display: block;
        margin-bottom: 5px;
    }

    .input-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    .button {
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    .button:hover {
        background-color: #0056b3;
    }

    .message {
        margin-top: 15px;
        text-align: center;
    }

    .message a {
        color: #007bff;
        text-decoration: none;
    }

    .message a:hover {
        text-decoration: underline;
    }
</style>

<body>

    <div class="container">
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
            <!-- contact field -->
            <div class="input-group">
                <label for="user_mobile">Contact</label>
                <input type="text" id="user_mobile" name="user_mobile" placeholder="Enter contact information" autocomplete="off" required>
            </div>
            <!-- submit field -->
            <div>
                <input type="submit" value="Sign Up" name="admin_register" class="button">
            </div>
            <p class="message">Already registered? <a href="admin_login.php">Login</a></p>
        </form>
    </div>
</body>

</html>

<?php

if(isset($_POST['admin_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    // hassing of password
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_mobile=$_POST['user_mobile'];
    $user_ip=getIPAddress();

     //this query checks wheather same username or email exist or not
     // we are using elseif to check two condition one of which is conform password
    $select_query="SELECT * FROM `admin_table` where username1 = '$user_username' or user_email1 ='$user_email'";
    $result=mysqli_query($con ,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('username and email already exist')</script>";
    }elseif($user_password!=$conf_user_password){
        echo "<script>alert('password does not match')</script>";

    }
        
    else{

    //insert query

    $insert_query = "insert into `admin_table` (username1, user_email1, user_password1, user_ip1, user_mobile1) values('$user_username','$user_email','$hash_password','$user_ip','$user_mobile')";
    $sql_execute=mysqli_query($con ,$insert_query);
    if ($sql_execute) {
        echo "<script>alert('data inserted')</script>";
    }else{
        die(mysqli_error($con));
    }
}
}

?>
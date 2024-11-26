<?php

if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="SELECT * from `user_tabel`where username='$user_session_name'";
    $result_query=mysqli_query($con, $select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['user_id'];
    $username=$row_fetch['username'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_mobile'];


    //updating user data
    if(isset($_POST['user_update'])){
        $update_id=$user_id;
        $username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_address=$_POST['user_address'];
        $user_mobile=$_POST['user_mobile'];

        $update_data= "UPDATE `user_tabel` SET username='$username',user_email='$user_email',user_address='$user_address',user_mobile='$user_mobile' WHERE user_id=$update_id";
        $result_query_update=mysqli_query($con, $update_data);
        if($result_query_update){
            echo "<script>alert('data updated successfully')</script>";
            echo "<script>window.open('logout.php', '_self')</script>";

        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit_account</title>

</head>

<body>
    <h3 style="margin-bottom: 20px;">Edit Account</h3>
    <form action="" method="post">
        <div class="input-group">
            <input type="text" id="user_username" name="user_username" value="<?php echo $username?>" placeholder="Enter Username" autocomplete="off" required style="width: 65%;" class="cap">
        </div>
        <!-- email field -->
        <div class="input-group">
            <input type="email" id="user_email" name="user_email" value="<?php echo $user_email?>" placeholder="Enter Email" autocomplete="off" required style="width: 65%;">
        </div>
        <!-- user_address field -->
        <div class="input-group">
            <input type="text" id="user_addres" name="user_address" value="<?php echo $user_address?>"  placeholder="Enter Address" autocomplete="off" required style="width: 65%;">
        </div>
        <!-- contact field -->
        <div class="input-group">
            <input type="text" id="user_mobile" name="user_mobile"  value="<?php echo $user_mobile?>" placeholder="Enter contact information" autocomplete="off" required style="width: 65%;">
        </div>
        <!-- submit field -->
        <div>
            <input type="submit" value="Update" name="user_update" class="btn">
        </div>
    </form>
</body>

</html>
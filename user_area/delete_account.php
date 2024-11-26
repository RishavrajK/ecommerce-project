<h3 style="color:#d30909; margin-top:15px;"> Delete Account</h3>
<form action="" method="post">
    <input type="submit" name="delete" value="Delete Account" class="btn">
    <input type="submit" name="d_delete" value=" Don't Delete Account" class="btn">
</form>


<?php

$username_session=$_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query= "DELETE from `user_tabel` where username='$username_session'";
    $del_result = mysqli_query($con, $delete_query);
    if($del_result){
        session_destroy();
        echo "<script>alert('Account Deleted')</script>";
        echo "<script>window.open('index.php','_self')</script>";

    }
}


if(isset($_POST['d_delete'])){
    echo "<script>window.open('profile.php','_self')</script>";
}

?>
<!-- <a href="../collection.php"></a> -->
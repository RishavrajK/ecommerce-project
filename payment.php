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
    <title>Clothify | payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            .reffer{
                width: 90%;
                margin: auto;
                display: block;
            }
        </style>
</head>
<body>
    <?php
    $user_ip=getIPAddress();
    $get_user="select *from`user_tabel`where user_ip='$user_ip'";
    $result=mysqli_query($con, $get_user);
    $run_query=mysqli_fetch_assoc($result);
    $user_id=$run_query['user_id'];
    ?>
    <div class="container">
        <h2 class="text-center text-secondary"> Payment option</h2>
        <div class="row d-flex justify-content-center align-item-center my-5">
            <div class="col-md-6">
                <a href="http://" target="_blank" rel="noopener noreferrer"><img src="./img/payment.jpg" alt="PAYMENT" class="reffer"></a>
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo"$user_id";?>"><h2 class="text-center">Pay offline</h2></a>
            </div>
        </div>
    </div>
</body>
</html>
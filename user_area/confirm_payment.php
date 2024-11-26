<?php
include('../admin_pages/database.php');
session_start();


if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $select_data="SELECT * from `user_orders`where order_id=$order_id";
    $result=mysqli_query($con, $select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];
}

//Inputing payment data in database payment_id	order_id	invoice_number	amount	payment_mode	date	


if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];

    $insert_query = "INSERT into `user_payments` (order_id,invoice_number,amount,payment_mode) values ($order_id,$invoice_number,$amount,'$payment_mode')";
    $input_query=mysqli_query($con, $insert_query);
    if($input_query){
        echo "<script>alert('Payment Complete')</script>";
        echo "<script>window.open('../profile.php','_self')</script>";
    }

        //update pending status
        $update_orders = "UPDATE `user_orders` SET order_status = 'Complete' where order_id=$order_id";
        $input_orders =mysqli_query($con, $update_orders);

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment pages</title>

    <style>
        body {
            text-align: center;
            margin-top: 25vh;
            background-color: #F1F1F1;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 25px;
            font-weight: 600;
        }

        .input-group input {
            width: 25%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .input1 {
            width: 26%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 10px;

        }

        .btn {
            padding: 10px 20px;
            margin-right: 10px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
            margin-top: 15px;
        
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>


</head>

<body>
    <h3 style="margin-bottom: 20px;">Edit Account</h3>
    <form action="" method="post">
        <div class="input-group">
            <input type="text" name="invoice_number" value="<?php echo $invoice_number;?>">
        </div>

        <div class=" input-group">
            <label for="">Amount</label>
            <input type="text" name="amount" value="<?php echo $amount_due; ?>">
        </div>

        <div class="input-group">
            <select name="payment_mode" class="input1">
                <option >select payment mode</option>
                <option >UPI</option>
                <option >Netbanking</option>
                <option >paypal</option>
                <option >Cash on delivery</option>
                <option >Pay offline</option>
            </select>
        </div>
        <!-- submit field -->
        <div>
            <input type="submit" value="Confirm payment" name="confirm_payment" class="btn">
        </div>
    </form>
</body>

</html><a href="../profile.php"></a>
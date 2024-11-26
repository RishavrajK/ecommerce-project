<?php

$username = $_SESSION['username'];
$get_user = "SELECT * from `user_tabel`where username='$username'";
$result = mysqli_query($con, $get_user);
$row_fetch = mysqli_fetch_assoc($result);
$user_id = $row_fetch['user_id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My orders</title>

</head>

<body>
    <h3 style="margin-bottom: 20px; color: #333;">My Orders</h3>
    <table>
        <thead>
            <tr>
                <th>Sl.no</th>
                <th>Amount Due</th>
                <th>Total Product</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $number = 1;
            $get_order_details = "SELECT * from `user_orders`where user_id=$user_id";
            $result_orders = mysqli_query($con, $get_order_details);
            while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                $order_id = $row_orders['order_id'];
                $amount_due = $row_orders['amount_due'];
                $total_products = $row_orders['total_products'];
                $invoice_number = $row_orders['invoice_number'];
                $order_date = $row_orders['order_date'];
                $order_status = $row_orders['order_status'];

                if ($order_status == 'pending') {
                    $order_status = 'Incomplete';
                } else {
                    $order_status = 'Complete';
                }
                

                
                echo "  <tr>
                <td>$number</td>
                <td>$amount_due</td>
                <td>$total_products</td>
                <td>$invoice_number</td>
                <td>$order_date</td>
                <td>$order_status</td>"
                ?>
                <?php
                if($order_status == 'Complete'){
                    echo "<td style='color:green; font-weight: bold;'>PAID</td>";
                }else{
                echo "<td><a href='../project_sem6/user_area/confirm_payment.php?order_id=$order_id' class='btn'>Confirm</a></td>
                </tr>";
                        }
                $number++;
            }

            ?>
            <!-- <tr>
                <td>2</td>
                <td>$250</td>
                <td>3</td>
                <td>12346</td>
                <td>2024-09-14</td>
                <td class="incomplete">Incomplete</td>
                <td>Pending</td>
            </tr> -->
        </tbody>
    </table>
</body>

</html>
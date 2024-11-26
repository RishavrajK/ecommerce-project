<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My orders</title>
    <link rel="stylesheet" href="styles/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <h3 style="margin-bottom: 20px; color: #333; text-align:center; font-weight:bold;">All Orders</h3>
    <table>
        <thead>
            <?php
            
            $get_order_details = "SELECT * from `user_orders`";
            $result_orders = mysqli_query($con, $get_order_details);
            $row_count = mysqli_num_rows($result_orders);
            echo "<tr>
                <th>Sl.no</th>
                <th>Due Amount</th>
                <th>Invoice Number</th>
                <th>Total Product</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Delete</th>
                </tr>
        </thead>
            <tbody>";

            if($row_count==0){
                echo"<h2 style='color:red;'>No Orders</h2>";
            }else{
                $number = 0;
            while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                $order_id = $row_orders['order_id'];
                $user_id = $row_orders['user_id'];
                $amount_due = $row_orders['amount_due'];
                $invoice_number = $row_orders['invoice_number'];
                $total_products = $row_orders['total_products'];
                $order_date = $row_orders['order_date'];
                $order_status = $row_orders['order_status'];
                $number++;

                if ($order_status == 'pending') {
                    $order_status = 'Incomplete';
                } else {
                    $order_status = 'Complete';
                }



                echo "  <tr>
                <td>$number</td>
                <td>$amount_due</td>
                <td>$invoice_number</td>
                <td>$total_products</td>
                <td>$order_date</td>
                <td>$order_status</td>
                <td><a href='admin_index1.php?delete_order=$order_id' style='color: #333;'><i class='fa-solid fa-trash'></i></a></td>
                ";
            }
            }
            ?>



            <!-- <tr>
                <td>2</td>
                <td>$250</td>
                <td>3</td>
                <td>12346</td>
                <td>2024-09-14</td>
                <td class="incomplete">Incomplete</td>
                <td><a href='admin_index.php?delete_product=<?php //echo $product_id; ?>' style='color: #333;'><i class='fa-solid fa-trash'></i></a></td>
            </tr> -->
            </tbody>
    </table>
</body>

</html>
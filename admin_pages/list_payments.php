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
    <h3 style="margin-bottom: 20px; color: #333; text-align:center; font-weight:bold;">All Payments</h3>
    <table>
        <thead>
            <?php

            $get_payment_details = "SELECT * from `user_payments`";
            $result_payment = mysqli_query($con, $get_payment_details);
            $row_count = mysqli_num_rows($result_payment);
            echo "<tr>
                <th>Sl.no</th>
                <th>Invoice Number</th>
                <th>Amount</th>
                <th>Payment Mode</th>
                <th>Payment Date</th>
                <th>Delete</th>
                </tr>
        </thead>
            <tbody>";

            if ($row_count == 0) {
                echo "<h2 style='color:red;'>No Payments</h2>";
            } else {
                $number = 0;
                while ($row_payments = mysqli_fetch_assoc($result_payment)) {
                    $order_id = $row_payments['order_id'];
                    $payment_id = $row_payments['payment_id'];
                    $amount = $row_payments['amount'];
                    $invoice_number = $row_payments['invoice_number'];
                    $payment_mode = $row_payments['payment_mode'];
                    $date = $row_payments['date'];
                    $number++;


                    echo "  <tr>
                <td>$number</td>
                <td>$invoice_number</td>
                <td>$amount</td>
                <td>$payment_mode</td>
                <td>$date</td>
                <td><a href='admin_index1.php?delete_payment=$payment_id' style='color: #333;'><i class='fa-solid fa-trash'></i></a></td>
                ";
                }
            }
            ?>

            </tbody>
    </table>
</body>

</html>
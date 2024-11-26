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
    <style>
        .product_img {
            width: 75px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <h3 style="margin-bottom: 20px; color: #333; text-align:center; font-weight:bold;">All products</h3>
    <table>
        <thead>
            <tr>
                <th>product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>status</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php

            $get_products = "SELECT * from `products`";
            $results = mysqli_query($con, $get_products);
            $number = 0;
            while ($row = mysqli_fetch_assoc($results)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $status = $row['status'];
                $number++;
            ?>
                <tr>
                    <td><?php echo $number ?></td>
                    <td><?php echo $product_title ?></td>
                    <td><img src='./product_img/<?php echo $product_image1 ?>' class='product_img'></td>
                    <td><?php echo $product_price ?>/-</td>
                    <td>
                        <?php
                        $get_count = "SELECT * from `orders_pending` where product_id=$product_id";
                        $result_count = mysqli_query($con, $get_count);
                        $row_count=mysqli_num_rows($result_count);
                        echo $row_count;
                        ?>
                    </td>
                    <td><?php echo $status ?></td>
                    <td><a href='admin_index1.php?delete_product=<?php echo $product_id;?>' style='color: #333;'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
            <?php
            }

            ?>

        </tbody>
    </table>
</body>

</html>
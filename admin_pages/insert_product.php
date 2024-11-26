<?php

include('database.php');

if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_gender = $_POST['product_gender'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // images
    $product_image1 = $_FILES['product_image1']['name'];
    // here since this data is file encrypt post method will not work hence $_FILES is used
    // $product_image2 = $_FILES['product_image2']['name'];
    // $product_image3 = $_FILES['product_image3']['name'];

    //img name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    // $temp_image2 = $_FILES['product_image2']['tmp_name'];
    // $temp_image3 = $_FILES['product_image3']['tmp_name'];

    //here we can write a function to whether all the feids have been
    if ($product_title == '' or $product_description ==  '' or $product_gender == '' or $product_image1=='' or $product_price =='') {
        echo "<script>alert('please fill all the feilds')</script>";
        exit();
    } else {
        //upload img  
        move_uploaded_file($temp_image1, "./product_img/$product_image1");
        // move_uploaded_file($temp_image2, "./product_img/$product_image2");
        // move_uploaded_file($temp_image3, "./product_img/$product_image3");
        //insert query
        $insert_products = "insert into `products` (product_title, product_description, product_gender, product_image1, product_price,date,status) values ('$product_title','$product_description','$product_gender','$product_image1','$product_price',NOW(),'$product_status')";

        $result_query = mysqli_query($con, $insert_products);
        if ($result_query) {
            echo "<script>alert('thank you')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <link rel="stylesheet" href="styles/product_form.css">
    <style>
        /* General Styles */

.con{
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0;
}
.container {
    width: 100%;
    max-width: 500px;
    background-color: #fff;
    padding: 30px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

.title {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 15px;
}

label {
    margin-bottom: 5px;
    font-size: 14px;
    color: #333;
}

input[type="text"],
input[type="number"],
input[type="file"],
select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="text"]:focus,
input[type="number"]:focus,
select:focus,
input[type="file"]:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

.submit-btn {
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
}

.submit-btn:hover {
    background-color: #0056b3;
}

@media (max-width: 600px) {
    .container {
        padding: 20px;
    }
}

    </style>
</head>

<body>
    <div class="con">
    <div class="container">
        <h1 class="title">Insert Product</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_title">Product Title</label>
                <input type="text" name="product_title" id="product_title" placeholder="Enter product title" required>
            </div>

            <div class="form-group">
                <label for="product_description">Product Description</label>
                <input type="text" name="product_description" id="product_description" placeholder="Enter product description" required>
            </div>

            <div class="form-group">
                <label for="product_gender">Gender</label>
                <select name="product_gender" id="product_gender" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="product_image1">Product Image</label>
                <input type="file" name="product_image1" id="product_image1" required>
            </div>

            <div class="form-group">
                <label for="product_price">Product Price</label>
                <input type="text" name="product_price" id="product_price" placeholder="Enter product price" required>
            </div>

            <div class="form-group">
                <input type="submit" name="insert_product" class="submit-btn" value="Insert Product">
            </div>
        </form>
    </div>
    </div>
</body>

</html>

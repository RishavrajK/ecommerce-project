<?php

include('database.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- css -->
    <link rel="stylesheet" href="styles/styles1.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="overflow-x: hidden;">
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="#" alt="CLOTHIFY" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Welcome guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage details</h3>
        </div>
        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1">
                <div class="button text-center my-3">

                    <button>
                        <a href="admin_index.php?insert_product" class="nav-link text-dark bg-info m-1 p-2">Insert product</a>
                    </button>

                    <button>
                        <a href="admin_index.php?view_product" class="nav-link text-dark bg-info m-1 p-2">View product</a>
                    </button>

                    <button>
                        <a href="admin_index.php?list_orders" class="nav-link text-dark bg-info m-1 p-2">All order</a>
                    </button>

                    <button>
                        <a href="#" class="nav-link text-dark bg-info m-1 p-2">All payments</a>
                    </button>

                    <button>
                        <a href="#" class="nav-link text-dark bg-info m-1 p-2">List user</a>
                    </button>

                    <button>
                        <a href="#" class="nav-link text-dark bg-info m-1 p-2">logout </a>
                    </button>

                </div>
            </div>
        </div>
        <!-- fourth child -->
         <div class="container my-5" style="height:65vh;">
            <?php

            //inserting products
            if(isset($_GET['insert_product'])){
                include('insert_product.php');
            }
            

            //viewing products
            if(isset($_GET['view_product'])) {
                include('view_product.php');
            }
            
            
            //deleting products
            if(isset($_GET['delete_product'])) {
                include('delete_product.php');
            }


            //viewing products
            if(isset($_GET['list_orders'])) {
                include('list_orders.php');
            }
            
            ?>
         </div>
    </div>
    <!-- <footer class="text-center" style="background-color: #0DCAF0;">
        <hr> Author: Rishav raj <br>
        &copy copyright reserved <br>
        <a href="mailto:form1243@gmail.com">form1243@gmail.com</a>
    </footer> -->
</body>
</html>
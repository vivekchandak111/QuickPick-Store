<?php
include('../includes/connect.php');
include('../funtions/common_functions.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <style>
        .adlogo{
            width: 200px;
            height: 100px;
            padding-left: 20px;
            object-fit: contain;
        }
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><b><i>QuickPick</i></b></a>
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="admin_login.php" class="nav-link">WELCOME ADMIN</a>
                    </li>
                </ul>
            </nav>
            </div>
        </nav>
        <!-- 2nd child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
        <!-- 3rd chlid -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div>
                    <a href="#"><img src="./product_images/admin_logo.jpg" alt="" class="adlogo"></a>
                    <?php
                    if(!isset($_SESSION['adminname'])){
                        echo "<p class='text-center text-light'><i>ADMIN</i></p>";
                    }
                    else{
                        echo "<p class='text-center text-light'><i>".$_SESSION['adminname']."</i></p>";
                    }
                    ?>
                </div>
                <div class="button text-center">
                    <button><a href="insertproduct.php" class="nav-link text-dark bg-info border border-white m-1">Insert Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-dark bg-info border border-white m-1">View Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-dark bg-info border border-white m-1">Insert Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-dark bg-info border border-white m-1">View Categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-dark bg-info border border-white m-1">Insert Brands</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-dark bg-info border border-white m-1">View Brands</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-dark bg-info border border-white m-1">All Orders</a></button>
                    <button><a href="index.php?list_payments" class="nav-link text-dark bg-info border border-white m-1">All Payments</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-dark bg-info border border-white m-1">List Users</a></button>
                    <button><a href="admin_logout.php" class="nav-link text-dark bg-info border border-white m-1">Logout</a></button>
                </div>
            </div>
        </div>
        <!-- 4th child -->
        <div class="container my-3">
            <?php
            if(isset($_SESSION['adminname'])){ 
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
            if(isset($_GET['insert_brand'])){
                include('insert_brands.php');
            }
            if(isset($_GET['view_products'])){
                include('view_products.php');
            }
            if(isset($_GET['edit_product'])){
                include('edit_product.php');
            }
            if(isset($_GET['delete_product'])){
                include('delete_product.php');
            }
            if(isset($_GET['view_categories'])){
                include('view_categories.php');
            }
            if(isset($_GET['view_brands'])){
                include('view_brands.php');
            }
            if(isset($_GET['edit_category'])){
                include('edit_category.php');
            }
            if(isset($_GET['edit_brand'])){
                include('edit_brand.php');
            }
            if(isset($_GET['delete_category'])){
                include('delete_category.php');
            }
            if(isset($_GET['delete_brand'])){
                include('delete_brand.php');
            }
            if(isset($_GET['list_orders'])){
                include('list_orders.php');
            }
            if(isset($_GET['delete_order'])){
                include('delete_order.php');
            }
            if(isset($_GET['list_payments'])){
                include('list_payments.php');
            }
            if(isset($_GET['delete_payment'])){
                include('delete_payment.php');
            }
            if(isset($_GET['list_users'])){
                include('list_users.php');
            }
        }
            ?>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
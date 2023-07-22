<?php
include('./includes/connect.php');
include('./funtions/common_functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickPick Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
      body{
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <!-- nav bar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><b><i>QuickPick</i></b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <?php
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_part/user_registration.php'>Register</a>
        </li>";
        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_part/profile.php'>My Account</a>
        </li>";
        }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price: <?php total_cart_price(); ?>/-</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-dark" type="submit">Search</button> -->
        <input type="submit" value="Search" class="btn btn-outline-dark" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<?php
cart();
?>

<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-primary bg-secondary">
  <ul class="navbar-nav me-auto">
        <?php
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link text-light' href='#'>WELCOME GUEST</a>
        </li>";
        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link text-light' href='#'>WELCOME ".$_SESSION['username']."</a>
        </li>";
        }
    if(!isset($_SESSION['username'])){
      echo "<li class='nav-item'>
      <a class='nav-link text-light' href='./users_part/user_login.php'>Login</a>
    </li>";
    }
    else{
      echo "<li class='nav-item'>
      <a class='nav-link text-light' href='./users_part/logout.php'>Logout</a>
    </li>";
    }
    ?>
  </ul>
</nav>

<!-- third child -->
<div class="bg-light">
  <h3 class="text-center">ONLINE RETAIL STORE</h3>
  <p class="text-center">Unlock limitless shopping possibilities with our online retail store</p>
</div>

<!-- fourth child -->
<div class="row">
  <div class="col-md-2 bg-secondary p-0 text-center">
    <!-- brands list -->
    <ul class="navbar-nav me-auto">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h5>Brands</h5></a>
      </li>
      <?php
        getbrands();
      ?>
    </ul>
    <!-- categoris list -->
    <ul class="navbar-nav me-auto">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h5>Categoris</h5></a>
      </li>
      <?php
        getcategories();
      ?>
    </ul>
  </div>
  <div class="col-md-10">
    <!-- products -->
    <div class="row">
      <?php
        view_details();
        get_uninque_cat();
        get_uninque_brands();
      ?>
  </div>
</div>

    </div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
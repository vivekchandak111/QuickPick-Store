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
      .cart_img{
        width: 80px;
        height: 80px;
        object-fit: contain;
      }
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
      </ul>
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
<<div class="container">
    <div class="row">
      <form action="" method="post">
        <div class="table-responsive">
            <table class="table table-bordered text-center">  
                    <?php
                    $get_ip_add = getIPAddress();
                    $total_price = 0;
                    $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add'";
                    $result = mysqli_query($con, $cart_query);
                    $result_count=mysqli_num_rows($result);
                    if($result_count>0){
                      echo "<thead>
                      <tr>
                          <th>Product Title</th>
                          <th>Product Image</th>
                          <th>Quantity</th>
                          <th>Total Price</th>
                          <th>Remove</th>
                          <th colspan='2'>Operation</th>
                      </tr>
                  </thead>
                  <tbody>";
                    while ($row = mysqli_fetch_array($result)) {
                      $product_id = $row['product_id'];
                      $select_product = "SELECT * FROM products WHERE product_id='$product_id'";
                      $result_product = mysqli_query($con, $select_product);
                      while ($row_product_price = mysqli_fetch_array($result_product)) {
                        $product_price = array($row_product_price['product_price']);
                        $product_values = array_sum($product_price);
                        $price_table=$row_product_price['product_price'];
                        $product_title=$row_product_price['product_title'];
                        $product_image1=$row_product_price['product_image1'];
                        $product_title=$row_product_price['product_title'];
                        $total_price += $product_values;
                    ?>
                    <tr>
                      <td><?php echo $product_title?></td>
                      <td><img src="./admin_part/product_images/<?php echo $product_image1?>" alt="" class="cart_img"></td>
                      <td><input type="text" name="qty" id="" class="form-input w-50"></td>
                      <?php
                      $get_ip_add = getIPAddress();
                      if(isset($_POST['update_cart'])){
                        $quantities=$_POST['qty'];
                        $update_cart="UPDATE cart_details SET quantity=$quantities WHERE ip_address='$get_ip_add'";
                        $result_product_quantity = mysqli_query($con, $update_cart);
                        $total_price = $total_price*$quantities;
                      }
                      ?>
                      <td><?php echo $price_table?></td>
                      <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
                      <td>
                        <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Update</button> -->
                        <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                        <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Remove</button> -->
                        <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                      </td>
                    </tr>
                    <?php 
                      }}}
                      else{
                        echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                      }
                    ?>
                </tbody>
            </table>
            <div class="d-flex mb-3">
              <?php
              $get_ip_add = getIPAddress();
              $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add'";
              $result = mysqli_query($con, $cart_query);
              $result_count=mysqli_num_rows($result);
              if($result_count>0){
                echo "<h4 class='px-3'>Total: <strong class='text-info'>$total_price/-</strong></h4>
                <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
                <button class='bg-secondary px-3 py-2 border-0 mx-3'><a href='./users_part/checkout.php' class='text-light text-decoration-none'>Order Now</a></button>";
              }
              else{
                echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
              }
              if(isset($_POST['continue_shopping'])){
                echo "<script>window.open('index.php','_self')</script>";
              }
              ?>
              
            </div>
        </div>
      </form>
    </div>
</div>
<?php 
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      echo $remove_id;
      $delete_query="DELETE FROM cart_details WHERE product_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }
}
echo $remove_item=remove_cart_item();
?>

    </div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
<?php
// include('../includes/connect.php');

function getproducts(){
    global $con;
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query="SELECT * FROM products ORDER BY RAND() LIMIT 0, 9";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-4 mb-3'>
          <div class='card'>
      <img src='./admin_part/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        <p class='card-text'>Price: $product_price/-</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more details</a>
      </div>
    </div>
          </div>";
        }
    }
}
}

function get_all_products(){
    global $con;
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query="SELECT * FROM products ORDER BY RAND()";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-4 mb-3'>
          <div class='card'>
      <img src='./admin_part/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        <p class='card-text'>Price: $product_price/-</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more details</a>
      </div>
    </div>
          </div>";
        }
    }
}
}

function get_uninque_cat(){
    global $con;
    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
        $select_query="SELECT * FROM products WHERE category_id=$category_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if ($num_of_rows==0){
            echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-4 mb-3'>
          <div class='card'>
      <img src='./admin_part/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        <p class='card-text'>Price: $product_price/-</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more details</a>
      </div>
    </div>
          </div>";
        }
    }
}

function get_uninque_brands(){
    global $con;
    if(isset($_GET['brand'])){
        $brand_id=$_GET['brand'];
        $select_query="SELECT * FROM products WHERE brand_id=$brand_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if ($num_of_rows==0){
            echo "<h2 class='text-center text-danger'>No stock for this brand</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-4 mb-3'>
          <div class='card'>
      <img src='./admin_part/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        <p class='card-text'>Price: $product_price/-</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more details</a>
      </div>
    </div>
          </div>";
        }
    }
}

function getcategories(){
    global $con;
    $select_categories="SELECT * FROM categories";
        $result_categories=mysqli_query($con,$select_categories);
        while($row_data=mysqli_fetch_assoc($result_categories)){
          $category_title=$row_data['category_title'];
          $category_id=$row_data['category_id'];
          echo "<li class='nav-item'>
          <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
          </li>";
        }
}

function getbrands(){
    global $con;
    $select_brands="SELECT * FROM brands";
        $result_brands=mysqli_query($con,$select_brands);
        while($row_data=mysqli_fetch_assoc($result_brands)){
          $brand_title=$row_data['brand_title'];
          $brand_id=$row_data['brand_id'];
          echo "<li class='nav-item'>
          <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
          </li>";
        }
}

function search_product(){
  global $con;
  if(isset($_GET['search_data_product'])){
    $search_data_value=$_GET['search_data'];
    $search_query = "SELECT * FROM products WHERE product_keywords LIKE '%$search_data_value%'";
        $result_query=mysqli_query($con,$search_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if ($num_of_rows==0){
            echo "<h2 class='text-center text-danger'>No product found</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-4 mb-3'>
          <div class='card'>
      <img src='./admin_part/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        <p class='card-text'>Price: $product_price/-</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more details</a>
      </div>
    </div>
          </div>";
        }
}
}

function view_details(){
  global $con;
  if (isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
          $product_id=$_GET['product_id'];
    $select_query="SELECT * FROM products WHERE product_id=$product_id";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_image2=$row['product_image2'];
          $product_image3=$row['product_image3'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-4 mb-3'>
          <div class='card'>
      <img src='./admin_part/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        <p class='card-text'>Price: $product_price/-</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
        <a href='index.php' class='btn btn-secondary'>Go to home</a>
      </div>
    </div>
          </div>
          <div class='col-md-8'>
            <div class='row'>
              <div class='col-md-12'>
                <h4 class='text-center text-info mb-5'>Related details</h4>
              </div>
              <div class='col-md-6'>
              <img src='./admin_part/product_images/$product_image2' class='card-img-top' alt='$product_title'>
              </div>
              <div class='col-md-6'>
              <img src='./admin_part/product_images/$product_image3' class='card-img-top' alt='$product_title'>
              </div>
            </div>
          </div>";
        }
    }
}
}
}

function getIPAddress() { 
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      } 
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}

function cart(){
  global $con;
  if (isset($_GET['add_to_cart'])){
    $get_ip_add=getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="SELECT * FROM cart_details WHERE ip_address='$get_ip_add' AND product_id=$get_product_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if ($num_of_rows>0){
      echo "<script>alert('This item is already present in cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
    else{
      $insert_query="INSERT INTO cart_details (product_id,ip_address,quantity) VALUES ($get_product_id,'$get_ip_add',0)";
      $result_query=mysqli_query($con,$insert_query);
      echo "<script>alert('This item is added to cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
}

function cart_item(){
  global $con;
  if (isset($_GET['add_to_cart'])){
    $get_ip_add=getIPAddress();
    $select_query="SELECT * FROM cart_details WHERE ip_address='$get_ip_add'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
  }
  else{
    $get_ip_add=getIPAddress();
    $select_query="SELECT * FROM cart_details WHERE ip_address='$get_ip_add'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
  }
  echo $count_cart_items;
}

function total_cart_price() {
  global $con;
  $get_ip_add = getIPAddress();
  $total_price = 0;
  $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add'";
  $result = mysqli_query($con, $cart_query);
  while ($row = mysqli_fetch_array($result)) {
    $product_id = $row['product_id'];
    $select_product = "SELECT * FROM products WHERE product_id='$product_id'";
    $result_product = mysqli_query($con, $select_product);
    while ($row_product_price = mysqli_fetch_array($result_product)) {
      $product_price = array($row_product_price['product_price']);
      $product_values = array_sum($product_price);
      $total_price += $product_values;
    }
  }
  echo $total_price;
}

function get_user_orders_details(){
  global $con;
  $username=$_SESSION['username'];
  $get_details="SELECT * FROM user_table WHERE username='$username'";
  $result_query=mysqli_query($con,$get_details);
  while($row_query=mysqli_fetch_array($result_query)){
    $user_id=$row_query['user_id'];
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delete_account'])){
          $get_oders="SELECT * FROM user_orders WHERE user_id=$user_id and order_status='pending'";
          $result_order_query=mysqli_query($con,$get_oders);
          $row_count=mysqli_num_rows($result_order_query);
          if($row_count>0){
            echo "<h3 class='text-center text-success mt-5 mb-2'> You have <span class='text-danger'>$row_count</span> pending orders</h3>
            <p class='text-center'><a class='text-dark' href='profile.php?my_orders'>Orders Details</a></p>";
          }
          else{
            echo "<h3 class='text-center text-success mt-5 mb-2'> You have 0 pending orders</h3>
            <p class='text-center'><a class='text-dark' href='../index.php'>Explore Store</a></p>";
          }
        }
      }
    }
  }
}
?>
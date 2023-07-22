<?php
include('../includes/connect.php');
include('../funtions/common_functions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container-fluid my-3">
        <h2 class="text-center bg-info text-light">User Registration Form</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="text" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm password" autocomplete="off" required="required" name="conf_user_password">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address">
                    </div>
                    
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact No.</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required="required" name="user_contact">
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Register" class="bg-info p-2 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?<a href="user_login.php" class="text-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_ip=getIPAddress();
    $select_query="SELECT * FROM user_table WHERE username='$user_username' OR user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('Usename and Email already exist')</script>";
    }
    else if($user_password!=$conf_user_password){
        echo "<script>alert('Password do not match')</script>";
    }
    else{
        $insert_query="INSERT INTO user_table (username,user_email,user_password,user_ip,user_address,user_mobile) VALUES ('$user_username','$user_email','$hash_password','$user_ip','$user_address','$user_contact')";
        $sql_excute=mysqli_query($con,$insert_query);
        if($sql_excute){
            echo "<script>alert('Data inserted successfully')</script>";
            echo "<script>window.open('user_login.php','_self')</script>";
        }
        else{
            die(mysqli_error($con));
        }
    }
    // $select_cart_items="SELECT * FROM cart_details WHERE ip_address='$user_ip'";
    // $result_cart=mysqli_query($con,$select_cart_items);
    // $row_count=mysqli_num_rows($result_cart);
    // if($row_count>0){
    //     $_SESSION['username']=$user_username;
    //     echo "<script>alert('You have items in cart')</script>";
    //     echo "<script>window.open('checkout.php','_self')</script>";
    // }
    // else{
    //     echo "<script>window.open('../index.php','_self')</script>";
    // }
}
?>
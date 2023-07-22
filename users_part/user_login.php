<?php
include('../includes/connect.php');
include('../funtions/common_functions.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container-fluid my-3">
        <h2 class="text-center bg-info text-light">User Login page</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                    </div>

                    <div class="text-center">
                        <input type="submit" value="Login" class="bg-info p-2 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?<a href="user_registration.php" class="text-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</body>
</html>
<?php
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $select_query="SELECT * FROM user_table WHERE username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();
    $select_query_cart="SELECT * FROM cart_details WHERE ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($result_cart);
    if($row_count>0){
        $_SESSION['username']=$user_username;
        if(password_verify($user_password,$row_data['user_password'])){           
            if($row_count==1 && $row_count_cart==0){
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login successfully')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }
            else{
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login successfully')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";
            }
        }
        else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }
    else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>
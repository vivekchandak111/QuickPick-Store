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
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container-fluid my-3">
        <h2 class="text-center bg-info text-light">Admin Login page</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="admin_name" class="form-label">Admin name</label>
                        <input type="text" id="admin_name" class="form-control" placeholder="Enter your admin name" autocomplete="off" required="required" name="admin_name">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="admin_password">
                    </div>

                    <div class="text-center">
                        <input type="submit" value="Login" class="bg-info p-2 border-0" name="admin_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?<a href="admin_registration.php" class="text-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['admin_login'])){
    $admin_name=$_POST['admin_name'];
    $admin_password=$_POST['admin_password'];
    $select_query="SELECT * FROM admin_table WHERE admin_name='$admin_name'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    if($row_count>0){
        $_SESSION['adminname']=$admin_name;
        if(password_verify($admin_password,$row_data['admin_password'])){
                echo "<script>alert('Login successfully')</script>";
                echo "<script>window.open('index.php','_self')</script>";
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
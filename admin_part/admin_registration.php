<?php
include('../includes/connect.php');
include('../funtions/common_functions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container-fluid my-3">
        <h2 class="text-center bg-info text-light">Admin Registration Form</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="admin_name" class="form-label">Admin name</label>
                        <input type="text" id="admin_name" class="form-control" placeholder="Enter your admin name" autocomplete="off" required="required" name="admin_name">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="admin_email" class="form-label">Admin Email</label>
                        <input type="text" id="admin_email" class="form-control" placeholder="Enter your admin email" autocomplete="off" required="required" name="admin_email">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="admin_password">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="conf_admin_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm password" autocomplete="off" required="required" name="conf_admin_password">
                    </div>
                    
                    <div class="form-outline mb-4">
                        <label for="passkey" class="form-label">Confirm Passkey</label>
                        <input type="password" id="passkey" class="form-control" placeholder="Confirm passkey" autocomplete="off" required="required" name="passkey">
                    </div>

                    <div class="text-center">
                        <input type="submit" value="Register" class="bg-info p-2 border-0" name="admin_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?<a href="admin_login.php" class="text-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['admin_register'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $passkey=$_POST['passkey'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $conf_admin_password=$_POST['conf_admin_password'];
    $select_query="SELECT * FROM admin_table WHERE admin_name='$admin_name' OR admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('Admin name and email already exist')</script>";
    }
    else if($admin_password!=$conf_admin_password){
        echo "<script>alert('Password do not match')</script>";
    }
    else if($passkey!='admin@123'){
        echo "<script>alert('Passkey do not match')</script>";
    }
    else{
        $insert_query="INSERT INTO admin_table (admin_name,admin_email,admin_password) VALUES ('$admin_name','$admin_email','$hash_password')";
        $sql_excute=mysqli_query($con,$insert_query);
        if($sql_excute){
            echo "<script>alert('Data inserted successfully')</script>";
            echo "<script>window.open('admin_login.php','_self')</script>";
        }
        else{
            die(mysqli_error($con));
        }
    }
}
?>
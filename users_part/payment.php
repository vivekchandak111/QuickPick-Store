<?php
include('../includes/connect.php');
include('../funtions/common_functions.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <?php
    $user_ip=getIPAddress();
    $username=$_SESSION['username'];
    $get_user="SELECT * FROM user_table WHERE username='$username'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
    ?>
    <div class="container">
        <h2 class="text-center bg-info text-light my-3">Payment Now</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <a href="order.php?user_id=<?php echo $user_id?>"><h2 class="text-center">Pay Now</h2></a>
        </div>
    </div>
</body>
</html>
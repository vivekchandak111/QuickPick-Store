<?php
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="SELECT * FROM user_table WHERE username='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['user_id'];
    $username=$row_fetch['username'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_mobile'];
}
if(isset($_POST['user_update'])){
    $update_id=$user_id;
    $username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_address=$_POST['user_address'];
    $user_mobile=$_POST['user_mobile'];
    $update_data="UPDATE user_table SET username='$username',user_email='$user_email',user_address='$user_address',user_mobile='$user_mobile' WHERE user_id=$update_id";
    $update_query=mysqli_query($con,$update_data);
    if($update_query){
        echo "<script>alert('The data has been updated successfully. Please Re-Login')</script>";
        echo "<script>window.open('logout.php','_self')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
    <h3 class="text-center text-dark mb-4">EDIT ACCOUNT</h3>
    <form action="" method="post">
        <div class="form-outline mb-4">
            <label for="user_username" class="form-label">Username</label>
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $username ?>" name="user_username">
        </div>
        <div class="form-outline mb-4">
            <label for="user_email" class="form-label">Email</label>
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_email ?>" name="user_email">
        </div>
        <div class="form-outline mb-4">
            <label for="user_address" class="form-label">Address</label>
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address ?>" name="user_address">
        </div>
        <div class="form-outline mb-4">
            <label for="user_contact" class="form-label">Contact No.</label>
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile ?>" name="user_mobile">
        </div>
        <input type="submit" value="Update" class="bg-info px-3 py-2 border-0 rounded" name="user_update">
    </form>
</body>
</html>
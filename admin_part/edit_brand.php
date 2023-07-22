<?php
if(isset($_GET['edit_brand'])){
    $edit_brand=$_GET['edit_brand'];
    $get_brand="SELECT * FROM brands WHERE brand_id=$edit_brand";
    $result=mysqli_query($con,$get_brand);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Brand</title>
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center">Edit Brand</h1>
        <form action="" method="post" class="text-center">
            <div class="form-outline w-50 mb-4 m-auto">
                <label for="brand_title" class="form-label">Brand Title</label>
                <input type="text" name="brand_title" value="<?php echo $brand_title?>" id="brand_title" class="form-control" required="required">
            </div>
            <div class="text-center">
                <input type="submit" name="edit_brand" value="Update brand" class="btn btn-info px-3 mb-3">
            </div>
        </form>
    </div>
</body>
</html>

<?php
if(isset($_POST['edit_brand'])){
    $brand_tit=$_POST['brand_title'];
    $update_query="UPDATE brands SET brand_title='$brand_tit' WHERE brand_id=$edit_brand";
    $result_update=mysqli_query($con,$update_query);
    if($result_update){
        echo "<script>alert('Successfully updated the brand')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
    }
}
?>
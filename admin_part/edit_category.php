<?php
if(isset($_GET['edit_category'])){
    $edit_cat=$_GET['edit_category'];
    $get_cat="SELECT * FROM categories WHERE category_id=$edit_cat";
    $result=mysqli_query($con,$get_cat);
    $row=mysqli_fetch_assoc($result);
    $category_title=$row['category_title'];
}
if(isset($_POST['edit_cat'])){
    $cat_tit=$_POST['category_title'];
    $update_query="UPDATE categories SET category_title='$cat_tit' WHERE category_id=$edit_cat";
    $result_update=mysqli_query($con,$update_query);
    if($result_update){
        echo "<script>alert('Successfully updated the category')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center">Edit Category</h1>
        <form action="" method="post" class="text-center">
            <div class="form-outline w-50 mb-4 m-auto">
                <label for="category_title" class="form-label">Category Title</label>
                <input type="text" name="category_title" id="category_title" class="form-control" required="required" value="<?php echo $category_title?>">
            </div>
            <input type="submit" value="Update category" class="btn btn-info px-3 mb-3" name="edit_cat">
        </form>
    </div>
</body>
</html>
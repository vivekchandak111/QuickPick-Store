<?php
if(isset($_GET['edit_product'])){
    $edit_id=$_GET['edit_product'];
    $get_data="SELECT * FROM products WHERE product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];

    $select_category="SELECT * FROM categories WHERE category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];

    $select_brand="SELECT * FROM brands WHERE brand_id=$brand_id";
    $result_brand=mysqli_query($con,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_title=$row_brand['brand_title'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        .eimg{
            width: 6vw;
            height: 12vh;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Product</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 mb-4 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" id="product_title" name="product_title" value="<?php echo $product_title?>" class="form-control" required="required">
            </div>
            <div class="form-outline w-50 mb-4 m-auto">
                <label for="product_desc" class="form-label">Product Description</label>
                <input type="text" id="product_desc" name="product_desc" value="<?php echo $product_description?>" class="form-control" required="required">
            </div>
            <div class="form-outline w-50 mb-4 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" id="product_keywords" name="product_keywords" value="<?php echo $product_keywords?>" class="form-control" required="required">
            </div>
            <div class="form-outline w-50 mb-4 m-auto">
                <label for="product_category" class="form-label">Product Categories</label>
                <select name="product_category" class="form-select" id="">
                    <option value="<?php echo $category_title?>"><?php echo $category_title?></option>
                    <?php
                        $select_query="SELECT * FROM categories";
                        $result_query=mysqli_query($con,$select_query);
                        while($row_data=mysqli_fetch_assoc($result_query)){
                            $category_title=$row_data['category_title'];
                            $category_id=$row_data['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-outline w-50 mb-4 m-auto">
                <label for="product_brands" class="form-label">Product Brands</label>
                <select name="product_brands" class="form-select" id="">
                    <option value="<?php echo $brand_title?>"><?php echo $brand_title?></option>
                    <?php
                        $select_query="SELECT * FROM brands";
                        $result_query=mysqli_query($con,$select_query);
                        while($row_data=mysqli_fetch_assoc($result_query)){
                            $brand_title=$row_data['brand_title'];
                            $brand_id=$row_data['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-outline w-50 mb-4 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <div class="d-flex">
                    <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
                    <img src="./product_images/<?php echo $product_image1?>" alt="" class="eimg">
                </div>  
            </div>
            <div class="form-outline w-50 mb-4 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <div class="d-flex">
                    <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required="required">
                    <img src="./product_images/<?php echo $product_image2?>" alt="" class="eimg">
                </div>  
            </div>
            <div class="form-outline w-50 mb-4 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <div class="d-flex">
                    <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto" required="required">
                    <img src="./product_images/<?php echo $product_image3?>" alt="" class="eimg">
                </div>  
            </div>
            <div class="form-outline w-50 mb-4 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" id="product_price" name="product_price" value="<?php echo $product_price?>" class="form-control" required="required">
            </div>
            <div class="text-center">
                <input type="submit" name="edit_product" value="Update product" class="btn btn-info px-3 mb-3">
            </div>
        </form>
    </div>
</body>
</html>

<?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brands'];
    // $product_image1=$_FILES['product_image1'];
    // $product_image2=$_FILES['product_image2'];
    // $product_image3=$_FILES['product_image3'];
    $product_price=$_POST['product_price'];

    // Accessing images name
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // Accessing images tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    if($product_title=='' or $product_desc=='' or $product_keywords=='' or $product_category=='' or $product_brand=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script>alert('Please fill all the details and continue the process')</script>";
    }
    else{
        move_uploaded_file($temp_image1, "./product_images/".$product_image1);
        move_uploaded_file($temp_image2, "./product_images/".$product_image2);
        move_uploaded_file($temp_image3, "./product_images/".$product_image3);

        $update_product="UPDATE products SET product_title='$product_title',product_description='$product_desc',product_keywords='$product_keywords',category_id='$product_category',brand_id='$product_brand',product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',product_price='$product_price',date=NOW() WHERE product_id=$edit_id";
        $result_update=mysqli_query($con,$update_product);
        if($result_update){
            echo "<script>alert('Successfully updated the products')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
    }
}
?>
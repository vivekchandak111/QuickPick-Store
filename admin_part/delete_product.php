<?php
if(isset($_GET['delete_product'])){
    $delete_id=$_GET['delete_product'];
    $delete_product="DELETE FROM products WHERE product_id=$delete_id";
    $reuslt_delete=mysqli_query($con,$delete_product);
    if($reuslt_delete){
        echo "<script>alert('Successfully deleted the products')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
?>
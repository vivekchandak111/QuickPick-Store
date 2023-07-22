<?php
if(isset($_GET['delete_category'])){
    $delete_category=$_GET['delete_category'];
    $delete_query="DELETE FROM categories WHERE category_id=$delete_category";
    $select_product="SELECT * FROM products WHERE category_id=$delete_category";
    $result_product=mysqli_query($con,$select_product);
    $row=mysqli_num_rows($result_product);
    if($row>0){
        $delete_product="DELETE FROM products WHERE category_id=$delete_category";
        $delete_result=mysqli_query($con,$delete_product);
    }
    $result_del=mysqli_query($con,$delete_query);
    if($result_del){
        echo "<script>alert('Successfully deleted the category')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
}
?>
<?php
if(isset($_GET['delete_brand'])){
    $delete_brand=$_GET['delete_brand'];
    $delete_query="DELETE FROM brands WHERE brand_id=$delete_brand";
    $select_product="SELECT * FROM products WHERE brand_id=$delete_brand";
    $result_product=mysqli_query($con,$select_product);
    $row=mysqli_num_rows($result_product);
    if($row>0){
        $delete_product="DELETE FROM products WHERE brand_id=$delete_brand";
        $delete_result=mysqli_query($con,$delete_product);
    }
    $result_del=mysqli_query($con,$delete_query);
    if($result_del){
        echo "<script>alert('Successfully deleted the brand')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
    }
}
?>
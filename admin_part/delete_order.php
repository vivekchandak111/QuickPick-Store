<?php
if(isset($_GET['delete_order'])){
    $delete_order=$_GET['delete_order'];
    $delete_query="DELETE FROM user_orders WHERE order_id=$delete_order";
    $result_del=mysqli_query($con,$delete_query);
    if($result_del){
        echo "<script>alert('Successfully deleted the order')</script>";
        echo "<script>window.open('index.php?list_orders','_self')</script>";
    }
}
?>
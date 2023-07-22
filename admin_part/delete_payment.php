<?php
if(isset($_GET['delete_payment'])){
    $delete_payment=$_GET['delete_payment'];
    $delete_query="DELETE FROM user_payments WHERE payment_id=$delete_payment";
    $result_del=mysqli_query($con,$delete_query);
    if($result_del){
        echo "<script>alert('Successfully deleted the payment')</script>";
        echo "<script>window.open('index.php?list_payments','_self')</script>";
    }
}
?>
<?php
include('../includes/connect.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_data="SELECT * FROM user_orders WHERE order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];
}
if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount_due=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="INSERT INTO user_payments (order_id,invoice_number,amount,payment_mode) VALUES ($order_id,$invoice_number,$amount_due,'$payment_mode')";
    $result_pay=mysqli_query($con,$insert_query);
    $update_orders="UPDATE user_orders SET order_status='Complete' WHERE order_id=$order_id";
    $result_orders=mysqli_query($con,$update_orders);
    if($result_pay){
        echo "<script>alert('Successfully completed the payment')</script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <div class="container my-5">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline w-50 text-center my-4 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number?>">
            </div>
            <div class="form-outline w-50 text-center my-4 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due?>">
            </div>
            <div class="form-outline w-50 text-center my-4 m-auto">
                <select name="payment_mode" class="form-select m-auto w-50">
                    <option>Select payment mode</option>
                    <option>UPI</option>
                    <option>Net Banking</option>
                    <option>Debit/Credit Card</option>
                    <option>Cash on Delivery</option>
                </select>
            </div>
            <div class="form-outline w-50 text-center my-4 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0 text-light rounded" value="Confirm" name="confirm_payment">
            </div>
        </form>
    </div>
    
</body>
</html>
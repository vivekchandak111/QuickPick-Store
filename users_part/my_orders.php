<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
</head>
<body>
    <?php
    $username=$_SESSION['username'];
    $get_user="SELECT * FROM user_table WHERE username='$username'";
    $result=mysqli_query($con,$get_user);
    $row_fetch=mysqli_fetch_assoc($result);
    $user_id=$row_fetch['user_id'];
    ?>
    <h3 class="text-success">All My Orders</h3>
    <div class="table-responsive">
        <table class="table table-bordered mt-5">
            <thead class="bg-info">
                <tr>
                    <th>Sl no</th>
                    <th>Amount due</th>
                    <th>Total Products</th>
                    <th>Invoice number</th>
                    <th>Date</th>
                    <th>Complete/Incomplete</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="bg-secondary text-light">
                <?php
                $number=1;
                $get_order_details="SELECT * FROM user_orders WHERE user_id=$user_id";
                $reuslt_orders=mysqli_query($con,$get_order_details);
                while($row_orders=mysqli_fetch_assoc($reuslt_orders)){
                    $order_id=$row_orders['order_id'];
                    $amount_due=$row_orders['amount_due'];
                    $invoice_number=$row_orders['invoice_number'];
                    $total_products=$row_orders['total_products'];
                    $order_status=$row_orders['order_status'];
                    $order_date=$row_orders['order_date'];
                    if($order_status=='pending'){
                        $order_status='Incomplete';
                    }
                    else{
                        $order_status='Complete';
                    }
                    echo "<tr>
                    <td>$number</td>
                    <td>$amount_due</td>
                    <td>$total_products</td>
                    <td>$invoice_number</td>
                    <td>$order_date</td>
                    <td>$order_status</td>";
                    if($order_status=='Complete'){
                        echo "<td>Paid</td>";
                    }
                    else{
                        echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>";
                    }  
                echo "</tr>";
                    $number++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
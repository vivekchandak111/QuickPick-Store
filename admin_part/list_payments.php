<h2 class="text-center text-info">All Payments</h2>
<div class="table-responsive">
    <table class="table table-bordered mt-2">
        <thead class="bg-info">
        <?php
            $get_payments="SELECT * FROM user_payments";
            $result=mysqli_query($con,$get_payments);
            $row_count=mysqli_num_rows($result);        
    if($row_count==0){
        echo "<h2 class='text-center text-danger mt-5'>No Payments received yet</h2>";
    }
    else{
        echo "<tr class='text-center'>
            <th>Sl.No.</th>
            <th>Invoice Number</th>
            <th>Amount</th>
            <th>Payment mode</th>
            <th>Order date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";
        $num=0;
        while($row=mysqli_fetch_assoc($result)){
            $order_id=$row['order_id'];
            $payment_id=$row['payment_id'];
            $amount=$row['amount'];
            $invoice_number=$row['invoice_number'];
            $order_date=$row['date'];
            $payment_mode=$row['payment_mode'];
            $num++;
            echo "<tr class='text-center'>
                <td>$num</td>
                <td>$invoice_number</td>
                <td>$amount</td>
                <td>$payment_mode</td>
                <td>$order_date</td>
                <td><a href='index.php?delete_payment=$payment_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>";
        }
        
    }
            ?>
            
        </tbody>
    </table>
</div>
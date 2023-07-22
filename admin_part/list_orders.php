<h2 class="text-center text-info">All Orders</h2>
<div class="table-responsive">
    <table class="table table-bordered mt-2">
        <thead class="bg-info">
            <?php
            $get_orders="SELECT * FROM user_orders";
            $result=mysqli_query($con,$get_orders);
            $row_count=mysqli_num_rows($result);        
    if($row_count==0){
        echo "<h2 class='text-center text-danger mt-5'>No Orders yet</h2>";
    }
    else{
        echo "<tr class='text-center'>
            <th>Sl.No.</th>
            <th>Due Amount</th>
            <th>Invoice Number</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";
        $num=0;
        while($row=mysqli_fetch_assoc($result)){
            $order_id=$row['order_id'];
            $user_id=$row['user_id'];
            $amount_due=$row['amount_due'];
            $invoice_number=$row['invoice_number'];
            $total_products=$row['total_products'];
            $order_date=$row['order_date'];
            $order_status=$row['order_status'];
            $num++;
            echo "<tr class='text-center'>
                <td>$num</td>
                <td>$amount_due</td>
                <td>$invoice_number</td>
                <td>$total_products</td>
                <td>$order_date</td>
                <td>$order_status</td>
                <td><a href='index.php?delete_order=$order_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>";
        }
        
    }
            ?>
            
        </tbody>
    </table>
</div>
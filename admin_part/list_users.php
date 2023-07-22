<h2 class="text-center text-info">All Users</h2>
<div class="table-responsive">
    <table class="table table-bordered mt-2">
        <thead class="bg-info">
        <?php
            $get_user="SELECT * FROM user_table";
            $result=mysqli_query($con,$get_user);
            $row_count=mysqli_num_rows($result);        
    if($row_count==0){
        echo "<h2 class='text-center text-danger mt-5'>No User yet</h2>";
    }
    else{
        echo "<tr class='text-center'>
            <th>Sl.No.</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>User Address</th>
            <th>User Mobile No.</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";
        $num=0;
        while($row=mysqli_fetch_assoc($result)){
            $user_id=$row['user_id'];
            $username=$row['username'];
            $user_email=$row['user_email'];
            $user_address=$row['user_address'];
            $user_mobile=$row['user_mobile'];
            $num++;
            echo "<tr class='text-center'>
                <td>$num</td>
                <td>$username</td>
                <td>$user_email</td>
                <td>$user_address</td>
                <td>$user_mobile</td>
            </tr>";
        }
        
    }
            ?>
            
        </tbody>
    </table>
</div>
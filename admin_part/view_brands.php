<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Brands</title>
</head>
<body>
    <h2 class="text-center text-info">All Brands</h2>
    <div class="table-responsive">
        <table class="table table-bordered mt-2">
            <thead class="bg-info">
                <tr class="text-center">
                    <th>Sl.No.</th>
                    <th>Brand title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class="bg-secondary text-light">
                <?php
                $sel_brand="SELECT * FROM brands";
                $result_brand=mysqli_query($con,$sel_brand);
                $num=0;
                while($row_brand=mysqli_fetch_assoc($result_brand)){
                    $num++;
                    $brand_id=$row_brand['brand_id'];
                    $brand_title=$row_brand['brand_title'];
                ?>
                <tr class="text-center">
                    <td><?php echo $num?></td>
                    <td><?php echo $brand_title?></td>
                    <td><a href="index.php?edit_brand=<?php echo $brand_id?>" class="text-light"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a href="index.php?delete_brand=<?php echo $brand_id?>" class="text-light"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <style>
        .pimg{
            width: 10vw;
            height: 20vh;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <h2 class="text-center text-info">All Products</h2>
    <div class="table-responsive">
        <table class="table table-bordered mt-2">
            <thead class="bg-info">
                <tr class="text-center">
                    <th>Product ID</th>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Product Price</th>
                    <th>Total Sold</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class="bg-secondary text-light">
                <?php
                $number=0;
                $get_products="SELECT * FROM products";
                $result_products=mysqli_query($con,$get_products);
                while($row=mysqli_fetch_assoc($result_products)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];
                    $product_status=$row['status'];
                    $number++;
                ?>
                <tr class="text-center">
                    <td><?php echo $number?></td>
                    <td><?php echo $product_title?></td>
                    <td><<?php echo "img src='./product_images/$product_image1' class='pimg'";?>></td>
                    <td><?php echo $product_price?></td>
                    <td>
                        <?php
                        $get_count="SELECT * FROM orders_pending WHERE product_id=$product_id";
                        $result_count=mysqli_query($con,$get_count);
                        $row_count=mysqli_num_rows($result_count);
                        echo $row_count;
                        ?>
                    </td>
                    <td><?php echo $product_status?></td>
                    <td><a href="index.php?edit_product=<?php echo $product_id;?>" class="text-light"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a href="index.php?delete_product=<?php echo $product_id;?>" class="text-light"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
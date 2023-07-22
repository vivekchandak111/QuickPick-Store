<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Categories</title>
</head>
<body>
    <h2 class="text-center text-info">All Categories</h2>
    <div class="table-responsive">
        <table class="table table-bordered mt-2">
            <thead class="bg-info">
                <tr class="text-center">
                    <th>Sl.No.</th>
                    <th>Category title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class="bg-secondary text-light">
                <?php
                $sel_cat="SELECT * FROM categories";
                $result_cat=mysqli_query($con,$sel_cat);
                $num=0;
                while($row_cat=mysqli_fetch_assoc($result_cat)){
                    $num++;
                    $category_id=$row_cat['category_id'];
                    $category_title=$row_cat['category_title'];
                ?>
                <tr class="text-center">
                    <td><?php echo $num?></td>
                    <td><?php echo $category_title?></td>
                    <td><a href="index.php?edit_category=<?php echo $category_id?>" class="text-light"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a href="index.php?delete_category=<?php echo $category_id?>" class="text-light"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View products</title>
</head>

<body> -->
<div class="d-flex flex-column align-items-center">
    <h3 class="text-center text-success">All products</h3>
    <table class="table table-bordered mt-3 w-75 text-center">
        <thead class="bg-info">
            <tr>
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

            $get_all_products_query = "Select * from `products`";
            $result_products = mysqli_query($con, $get_all_products_query);
            while ($row_orders = mysqli_fetch_assoc($result_products)) {
                $product_id = $row_orders['product_id'];
                $product_title = $row_orders['product_title'];
                $product_image = $row_orders['product_image1'];
                $product_price = $row_orders['product_price'];
                $status = $row_orders['status'];
                ?>

                <tr>
                    <td>
                        <?php echo $product_id ?>
                    </td>
                    <td>
                        <?php echo "$product_title" ?>
                    </td>
                    <td>
                        <img src='product_images/<?php echo "$product_image" ?>' id='cart-table-product-img'>
                    </td>
                    <td>
                        <?php echo "$product_price" ?>
                    </td>
                    <td>
                        <?php 
                        $get_count="Select * from `orders_pending` where product_id=$product_id";
                        $result_count=mysqli_query($con,$get_count);
                        $rows_count=mysqli_num_rows($result_count);
                        echo $rows_count;
                        ?>
                    </td>
                    <td>
                        <?php echo "$status" ?>
                    </td>
                    <td>
                        <a href='index.php?edit_product=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a>
                    </td>
                    <td>
                        <a href='index.php?delete_product=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a>
                    </td>
                </tr>

                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<!-- </body>

</html> -->
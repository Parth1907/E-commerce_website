<?php

if (isset($_GET['delete_product'])) {
    $product_id = $_GET['delete_product'];

    $delete_product="Delete from `products` where product_id='$product_id'";
    $result=mysqli_query($con, $delete_product);
    if ($result) {
        echo "<script>alert('Succesfully deleted the product')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}

?>
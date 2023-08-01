<?php

if (isset($_GET['delete_order'])) {
    $order_id = $_GET['delete_order'];

    $delete_order="Delete from `user_orders` where order_id='$order_id'";
    $result=mysqli_query($con, $delete_order);
    if ($result) {
        echo "<script>alert('Succesfully deleted the order')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}

?>
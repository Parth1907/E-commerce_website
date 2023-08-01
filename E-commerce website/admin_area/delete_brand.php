<?php

if (isset($_GET['delete_brand'])) {
    $brand_id = $_GET['delete_brand'];

    $delete_brand="Delete from `brands` where brand_id='$brand_id'";
    $result=mysqli_query($con, $delete_brand);
    if ($result) {
        echo "<script>alert('Succesfully deleted the brand')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}

?>
<?php

if (isset($_GET['delete_category'])) {
    $category_id = $_GET['delete_category'];

    $delete_category="Delete from `categories` where category_id='$category_id'";
    $result=mysqli_query($con, $delete_category);
    if ($result) {
        echo "<script>alert('Succesfully deleted the category')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}

?>
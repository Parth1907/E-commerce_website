<?php

if (isset($_GET['delete_payment'])) {
    $payment_id = $_GET['delete_payment'];

    $delete_payment="Delete from `user_payment` where payment_id='$payment_id'";
    $result=mysqli_query($con, $delete_payment);
    if ($result) {
        echo "<script>alert('Succesfully deleted the payment')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}

?>
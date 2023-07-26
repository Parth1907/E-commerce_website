<?php
include('../functions/common_functions.php');
include("../includes/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- external css link -->
    <link rel="stylesheet" href="style.css">
    <title>Payment Page</title>
</head>
<body>
    <?php

    $user_ip=getIPAddress();
    $get_user="Select * from `user_table` where user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];


    ?>

    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
    </div>
    <div class="row my-5">
        <div class="col-md-6 text-center">
            <a href="https://paytm.com/" class="text-decoration-none"><h3>UPI</h3></a>
        </div>
        <div class="col-md-6 text-center">
            <a href="order.php?user_id=<?php echo $user_id ?>" class="text-decoration-none"><h3>Pay offline</h3></a>
        </div>
    </div>
</body>
</html>
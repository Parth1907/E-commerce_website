<?php
include("../includes/connect.php");
include("../functions/common_functions.php");


if (isset($_POST['register'])) {
    $user_username = $_POST['username'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $user_conf_password = $_POST['conf_password'];
    $user_address = $_POST['address'];
    $user_contact = $_POST['contact'];
    $user_image = $_FILES['user_img']['name'];
    $temp_image = $_FILES['user_img']['tmp_name'];
    $user_ip = getIPAddress();

    // checking if user exists previously or not 
    $select_query = "Select * from `user_table` where username='$user_username' or user_email='$user_email'";
    $result_select_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_select_query);
    if ($num_of_rows > 0) {
        echo "<script>alert('Username or email already exists')</script>";
    } elseif ($user_conf_password != $user_password) {
        echo "<script>alert('Passwords do not match')</script>";
    } else {
        // insert query
        move_uploaded_file($temp_image, "user_img/$user_image");
        $insert_user_details = "insert into `user_table` (username,user_email,user_password,user_ip,user_address,user_mobile,user_image) values ('$user_username', '$user_email', '$hash_password', '$user_ip', '$user_address','$user_contact', '$user_image')";
        $result_query = mysqli_query($con, $insert_user_details);
        if ($result_query) {
            echo "<script>alert('Succesfully inserted the user details)</script>";
        }
    }

    // selecting cart items;
    $select_cart_items = "Select * from `cart_details` where ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_items);
    $row_count = mysqli_num_rows($result_cart);
    if ($row_count > 0) {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('../checkout.php','_self')</script>";
    } else {
        echo "<script>window.open('../index.php','_self')</script>";
    }
}

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
    <!-- External css link -->
    <link rel="stylesheet" href="style.css">
    <title>Registration Page</title>
</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username field -->
                    <div class="form-outline mb-3">
                        <label for="username" class="form-label mb-1">Username</label>
                        <input type="text" id="username" class="form-control" placeholder='Enter your username' autocomplete="off" name="username" required>
                    </div>
                    <!-- email field -->
                    <div class="form-outline mb-3">
                        <label for="email" class="form-label mb-1">Email</label>
                        <input type="email" id="email" class="form-control" placeholder='Enter your email' autocomplete="off" name="email" required>
                    </div>
                    <!-- img field -->
                    <div class="form-outline mb-3">
                        <label for="user_img" class="form-label mb-1">User Image</label>
                        <input type="file" id="user_img" class="form-control" name="user_img" required>
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-3">
                        <label for="password" class="form-label mb-1">Password</label>
                        <input type="password" id="password" class="form-control" placeholder='Enter your password' autocomplete="off" name="password" required>
                    </div>
                    <!-- confirm password field -->
                    <div class="form-outline mb-3">
                        <label for="conf_password" class="form-label mb-1">Password</label>
                        <input type="password" id="conf_password" class="form-control" placeholder='Confirm password' autocomplete="off" name="conf_password" required>
                    </div>
                    <!-- Address field -->
                    <div class="form-outline mb-3">
                        <label for="address" class="form-label mb-1">Address</label>
                        <input type="text" id="address" class="form-control" placeholder='Enter your address' autocomplete="off" name="address" required>
                    </div>
                    <!-- Contact field -->
                    <div class="form-outline mb-3">
                        <label for="contact" class="form-label mb-1">Contact</label>
                        <input type="text" id="contact" class="form-control" placeholder='Enter your phone number' autocomplete="off" name="contact" required>
                    </div>
                    <!-- submission or creation -->
                    <div class="mt-2 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="register">
                        <p class="small fw-bold mt-2 pt-1">Already have an account? <a class="text-danger" href="user_login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
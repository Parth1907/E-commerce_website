<?php
include("../includes/connect.php");
include("../functions/common_functions.php");


if (isset($_POST['admin_registration'])) {
    $admin_username = $_POST['username'];
    $admin_email = $_POST['email'];
    $admin_password = $_POST['password'];
    $admin_hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
    $admin_conf_password = $_POST['conf_password'];
    $admin_image = $_FILES['admin_img']['name'];
    $admin_temp_image = $_FILES['admin_img']['tmp_name'];

    if (empty($admin_image)) {
        $admin_img = 'admin-icon.png';
    }
    // checking if admin exists previously or not 
    $select_query = "Select * from `admin_table` where admin_username='$admin_username' or admin_email='$admin_email'";
    $result_select_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_select_query);
    if ($num_of_rows > 0) {
        echo "<script>alert('Username or email already exists')</script>";
    } elseif ($admin_conf_password != $admin_password) {
        echo "<script>alert('Passwords do not match')</script>";
    } else {
        // insert query
        move_uploaded_file($admin_temp_image, "admin_img/$admin_image");
        $insert_admin_details = "insert into `admin_table` (admin_username,admin_email,admin_password,admin_img) values ('$admin_username', '$admin_email', '$admin_hash_password', '$admin_image')";
        $result_query = mysqli_query($con, $insert_admin_details);
        if ($result_query) {
            echo "<script>alert('Succesfully inserted the admin details)</script>";
        }
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
    <title>Admin Registration Page</title>
</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New Admin Registration</h2>
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
                        <label for="admin_img" class="form-label mb-1">Admin Image</label>
                        <input type="file" id="admin_img" class="form-control" name="admin_img">
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-3">
                        <label for="password" class="form-label mb-1">Password</label>
                        <input type="password" id="password" class="form-control" placeholder='Enter your password' autocomplete="off" name="password" required>
                    </div>
                    <!-- confirm password field -->
                    <div class="form-outline mb-3">
                        <label for="conf_password" class="form-label mb-1">Confirm Password</label>
                        <input type="password" id="conf_password" class="form-control" placeholder='Confirm password' autocomplete="off" name="conf_password" required>
                    </div>
                    <!-- submission or creation -->
                    <div class="mt-2 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="admin_registration">
                        <p class="small fw-bold mt-2 pt-1">Already have an account? <a class="text-danger" href="admin_login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
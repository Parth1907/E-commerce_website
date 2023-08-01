<?php
include('../includes/connect.php'); 
include('../functions/common_functions.php');
@session_start();

if (isset($_POST['admin_login'])) {
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    // user selection
    $select_query = "Select * from `admin_table` where admin_username='$admin_username'";
    $result = mysqli_query($con, $select_query);
    $row_count=mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    if ($row_count > 0) {
        $_SESSION['username']=$admin_username;
        if (password_verify($admin_password, $row_data['admin_password'])) {
            // echo "<script>alert('Login Succesful')</script>";
            if ($row_count == 1) {
                $_SESSION['username']=$admin_username;
                echo "<script>alert('Login Succesful')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            } else {
                echo "<script>alert('Invalid Credentails')</script>";
            }
        } 
    } else {
        echo "<script>alert('No such admin credentials exists')</script>";
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
    <title>Admin Login Page</title>
</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">Admin Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username field -->
                    <div class="form-outline mb-3">
                        <label for="username" class="form-label mb-1">Username</label>
                        <input type="text" id="username" class="form-control" placeholder='Enter your username' autocomplete="off" name="username" required>
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-3">
                        <label for="password" class="form-label mb-1">Password</label>
                        <input type="password" id="password" class="form-control" placeholder='Enter your password' autocomplete="off" name="password" required>
                    </div>
                    <!-- submission or creation -->
                    <div class="mt-2 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="admin_login">
                        <p class="small fw-bold mt-2 pt-1">Don't have an account? <a class="text-danger" href="admin_registration.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
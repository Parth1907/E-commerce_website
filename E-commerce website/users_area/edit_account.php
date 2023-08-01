<?php

if (isset($_GET['edit_account'])) {
    $user_session_name = $_SESSION['username'];

    // info given from table or set previously
    $select_query = "Select * from `user_table` where username='$user_session_name'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $username = $row_fetch['username'];
    $email = $row_fetch['user_email'];
    $address = $row_fetch['user_address'];
    $contact = $row_fetch['user_mobile'];
    

    // to update the previous info 
    if (isset($_POST['update'])) {
        $updated_username = $_POST['username'];
        $updated_email = $_POST['email'];
        $updated_address = $_POST['address'];
        $updated_contact = $_POST['contact'];
        $updated_image = $_FILES['user_img']['name'];
        $temp_image = $_FILES['user_img']['tmp_name'];
        move_uploaded_file($temp_image, "user_img/$updated_image");
        // echo $user_img;
        if (empty($updated_image)) {
            $updated_image=$user_img;
        } 
        
        // if (empty($updated_img)) {
            $update_query = "Update `user_table` 
            set username='$updated_username',
            user_email='$updated_email',
            user_address='$updated_address',
            user_image='$updated_image',
            user_mobile='$updated_contact' where user_id=$user_id";
            if ($result_updated_query = mysqli_query($con, $update_query)) {
                echo "<script>alert('Succesfully inserted the user details')</script>";
                echo "<script>window.open('logout.php','_self')</script>";
            }
        // }
        // else {
        //     $update_query = "Update `user_table` 
        //     set username='$updated_username',
        //     user_email='$updated_email',
        //     user_address='$updated_address',
        //     user_mobile='$updated_contact' where user_id=$user_id";
        //     if ($result_updated_query = mysqli_query($con, $update_query)) {
        //         echo "<script>alert('Succesfully inserted the updated user details')</script>";
        //         echo "<script>window.open('logout.php','_self')</script>";
        //     }
        // }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit account</title>
</head>

<body>
    <h2 class="text-center text-success mb-4">Edit Account</h2>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <!-- username field -->
        <div class="form-outline mb-3">
            <input type="text" id="username" class="form-control w-50 m-auto" placeholder='Enter your username' value="<?php echo $username ?>" autocomplete="off" name="username">
        </div>
        <!-- email field -->
        <div class="form-outline mb-3">
            <input type="email" id="email" class="form-control w-50 m-auto" placeholder='Enter your email' value="<?php echo $email ?>" autocomplete="off" name="email">
        </div>
        <!-- img field -->
        <div class="form-outline mb-3 w-50 m-auto d-flex">
            <input type="file" id="user_img" class="form-control m-auto" name="user_img">
            <img src="./user_img/<?php echo $user_img ?>" alt="user profile image" class="edit-img">
        </div>
        <!-- Location field -->
        <div class="form-outline mb-3">
            <input type="text" id="address" class="form-control w-50 m-auto" placeholder='Enter your address' value="<?php echo $address ?>" autocomplete="off" name="address">
        </div>
        <!-- Contact field -->
        <div class="form-outline mb-3">
            <input type="text" id="contact" class="form-control w-50 m-auto" placeholder='Enter your phone number' value="<?php echo $contact ?>" autocomplete="off" name="contact">
        </div>
        <!-- submission or creation -->
        <div class="mt-2 pt-2">
            <input type="submit" value="Update" class="bg-info py-2 px-3 border-0 mb-5" name="update">
        </div>
    </form>
</body>

</html>
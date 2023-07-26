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
            <input type="text" id="username" class="form-control w-50 m-auto" placeholder='Enter your username' autocomplete="off" name="username" required>
        </div>
        <!-- email field -->
        <div class="form-outline mb-3">
            <input type="email" id="email" class="form-control w-50 m-auto" placeholder='Enter your email' autocomplete="off" name="email" required>
        </div>
        <!-- img field -->
        <div class="form-outline mb-3 w-50 m-auto d-flex">
            <input type="file" id="user_img" class="form-control m-auto" name="user_img" required>
            <img src="./user_img/<?php echo $user_img ?>" alt="user profile image" class="edit-img">
        </div>
        <!-- Location field -->
        <div class="form-outline mb-3">
            <input type="text" id="address" class="form-control w-50 m-auto" placeholder='Enter your address' autocomplete="off" name="address" required>
        </div>
        <!-- Contact field -->
        <div class="form-outline mb-3">
            <input type="text" id="contact" class="form-control w-50 m-auto" placeholder='Enter your phone number' autocomplete="off" name="contact" required>
        </div>
        <!-- submission or creation -->
        <div class="mt-2 pt-2">
            <input type="submit" value="Update" class="bg-info py-2 px-3 border-0 mb-5" name="update">
        </div>
    </form>
</body>

</html>
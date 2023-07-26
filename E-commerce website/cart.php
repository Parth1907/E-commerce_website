<?php
include('functions/common_functions.php');
include('./includes/connect.php');
session_start();

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

    <link rel="stylesheet" href="style.css">
    <title>E-commerce Website Cart details</title>
</head>

<body>
    <div id="page-container">
        <header class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="images/kisspng-e-commerce-web-design-website-development-internet-ebook-vendors-mspbasics-com-5b6e96aa031a87.7762759015339741860127.png" alt="Logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="users_area/user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cartItemQuantity(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-secondary navbar-light">
            <ul class="navbar nav me-auto">
                <?php
                if (!isset($_SESSION['username'])) {
                    echo " <li class='nav-item'>
                                <a href='' class='nav-link'>Welcome guest</a>
                            </li> ";
                } else {
                    echo " <li class='nav-item'>
                                <a href='' class='nav-link'>Welcome " . $_SESSION['username'] . "</a>
                            </li> ";
                }

                if (!isset($_SESSION['username'])) {
                    echo " <li class='nav-item'>
                                <a href='users_area/user_login.php' class='nav-link'>Login</a>
                            </li> ";
                }
                else {
                    echo " <li class='nav-item'>
                                <a href='users_area/logout.php' class='nav-link'>Logout</a>
                            </li> ";
                }
                ?>
            </ul>
        </nav>

        <section class="bg-light">
            <h3 class="text-center">Colours Of India</h3>
            <p class="text-center">A store made to show all the vibrant colours available in India</p>
        </section>

        <!-- cart details table -->
        <div class="container" id="content-wrap">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">

                        <!-- php code for dynamic data -->
                        <?php
                        global $con;
                        $get_ip_add = getIPAddress();
                        $total_price = 0;
                        $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "<thead>
                                    <tr>
                                        <th>Product Title</th>
                                        <th>Product Image</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Remove</th>
                                        <th colspan='2'>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>";

                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $product_quantity = $row['quantity']; //added by me, not included in video
                                $select_products = "Select * from `products` where product_id='$product_id'";
                                $result_products = mysqli_query($con, $select_products);
                                while ($row_product_price = mysqli_fetch_array($result_products)) {
                                    $product_price = array($row_product_price['product_price']); //gives array of prices
                                    $price_table = $row_product_price['product_price']; //gives the product price
                                    $product_title = $row_product_price['product_title'];
                                    $product_image1 = $row_product_price['product_image1'];
                                    $product_values = array_sum($product_price);
                                    $total_price+= $product_values; //adds the product prices
                        ?>

                                    <tr>
                                        <td><?php echo $product_title ?></td>
                                        <td><img id='cart-table-product-img' src='admin_area/product_images/<?php echo $product_image1 ?>' alt='$product_title'></td>
                                        <td>
                                            <input type='text' name='quantity' id='' class='form-input w-50'>
                                            <input type='hidden' name='product_id' value='<?php echo $product_id ?>'>
                                        </td>

                                        <!-- <td><?php //echo $product_quantity ?></td> added by me, not included in video -->

                                        <!-- php for updating quantity -->
                                        <?php
                                        $get_ip_add = getIPAddress();
                                        if (isset($_POST['update_cart'])) {
                                            $quantity = $_POST['quantity'];
                                            $product_id = $_POST['product_id']; //added by me
                                            $update_cart = "update `cart_details` set quantity=$quantity where ip_address='$get_ip_add' and product_id=$product_id"; //second where condition added by me
                                            $result_product_qty = mysqli_query($con, $update_cart);
                                            // $total_price*= $quantity;
                                        }
                                        ?>

                                        <td>&#8377;<?php echo $price_table ?>/-</td>
                                        <td><input type='checkbox' name='remove_items[]' value="<?php echo $product_id ?>"></td>
                                        <td>
                                            <input type="submit" value="Update Cart" class='bg-info px-3 px-2 mx-3 border-0' name="update_cart">
                                            <input type="submit" value="Remove Cart" class='bg-info px-3 px-2 mx-3 border-0' name="remove_cart_item">
                                        </td>
                                    </tr>

                        <?php
                                }
                            }
                        } else {
                            echo "<h2 class='text-center text-danger'>Your Cart is empty</h2>";
                        }

                        ?>

                        </tbody>
                    </table>
                    <!-- subtotal -->
                    <div class="d-flex">
                        <?php

                        $get_ip_add = getIPAddress();
                        $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo   "<h4 class='px-3 m-3'>Subtotal: <strong class='text-info'>&#8377;$total_price/-</strong></h4>
                                <input type='submit' value='Continue shopping' class='bg-info px-3 px-2 m-3 border-0' name='continue_shopping'>
                                <buttton class='bg-secondary px-3 px-2 m-3 border-0'><a class='text-light text-decoration-none' href='users_area/checkout.php'>Checkout</a></button>";
                        } else {
                            echo "<input type='submit' value='Continue shopping' class='bg-info px-3 px-2 m-3 border-0' name='continue_shopping'>";
                        }

                        if (isset($_POST['continue_shopping'])) {
                            echo "<script>window.open('index.php','_self')</script>";
                        }
                        ?>

                    </div>
            </div>
        </div>
        </form>
        <!-- function to remove item -->
        <?php

        function removeCartItem()
        {
            global $con;
            if (isset($_POST['remove_cart_item'])) {
                foreach ($_POST['remove_items'] as $remove_id) {
                    echo $remove_id;
                    $delete_query = "Delete from `cart_details` where product_id=$remove_id";
                    $run_delete = mysqli_query($con, $delete_query);
                    if ($run_delete) {
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            }
        }
        echo $remove_item = removeCartItem();
        ?>

        <!-- Footer -->
        <?php
        include('includes/footer.php');
        ?>
    </div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
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
    <!--External css link  -->
    <link rel="stylesheet" href="../style.css">
    <title>Checkout Page</title>
</head>

<body>
    <div id="page-container">
        <header class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/kisspng-e-commerce-web-design-website-development-internet-ebook-vendors-mspbasics-com-5b6e96aa031a87.7762759015339741860127.png" alt="Logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </header>

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
                                <a href='user_login.php' class='nav-link'>Login</a>
                            </li> ";
                } else {
                    echo " <li class='nav-item'>
                                <a href='logout.php' class='nav-link'>Logout</a>
                            </li> ";
                }

                ?>

            </ul>
        </nav>

        <section class="bg-light">
            <h3 class="text-center">Colours Of India</h3>
            <p class="text-center">A store made to show all the vibrant colours available in India</p>
        </section>


        <section class="row" id="content-wrap">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center">
                    <li class="nav-item bg-primary">
                        <a href="#" class="nav-link text-light">
                            <h4>Your profile</h4>
                        </a>
                    </li>

                    <?php
                    $username = $_SESSION['username'];
                    $select_image = "Select * from `user_table` where username='$username'";
                    $result_image = mysqli_query($con, $select_image);
                    $row_image = mysqli_fetch_array($result_image);
                    $user_img = $row_image['user_image'];
                    echo "
                    <li class='nav-item'>
                        <img class='profile-img mt-3' src='user_img/$user_img' alt=''>
                    </li>
                    "
                    ?>

                    <li class="nav-item">
                        <a href="profile.php" class="nav-link text-light">Pending Orders</a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?edit_account" class="nav-link text-light">Edit account</a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?my_orders" class="nav-link text-light">My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?delete_account" class="nav-link text-light">Delete Account</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <?php
                user_order_details();
                if (isset($_GET['edit_account'])) {
                    include('edit_account.php');
                }
                if (isset($_GET['my_orders'])) {
                    include('my_orders.php');
                }
                if (isset($_GET['delete_account'])) {
                    include('delete_account.php');
                }
                ?>
            </div>
        </section>
                
        <!-- Footer -->
        <?php
        include('../includes/footer.php');
        ?>
    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
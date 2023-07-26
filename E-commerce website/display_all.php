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
    <title>E-commerce Website</title>
</head>
<body>
<div id="page-container">
    <header class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="images/kisspng-e-commerce-web-design-website-development-internet-ebook-vendors-mspbasics-com-5b6e96aa031a87.7762759015339741860127.png" alt="Logo" class="logo" >
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="display_all.php">Products</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="users_area/user_registration.php">Register</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cartItemQuantity(); ?></sup></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">
                    Total price: &#8377;<?php totalCartPrice() ?>/-</a>
                </li>
            </ul>
            <form class="d-flex" action="search_product.php" method="get">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
            </form>
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
        <h3 class="text-center">Colours  Of India</h3>
        <p class="text-center">A store made to show all the vibrant colours available in India</p>
    </section>

    <section class="row" id="content-wrap">
        <!-- Products -->
        <div class="col-md-10">
            <div class="row m-2">
                <?php 
                    getAllProducts();
                    getUniqueCategory();
                    getUniqueBrand();
                ?>

            </div>
        </div>

        <!-- Sidenav -->
        <div class="col-md-2 bg-secondary p-0">
            <!-- Brands -->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
                </li>

                <?php
                    getBrands();
                ?>

            </ul>

            <!-- Categories -->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light"><h4>Category</h4></a>
                </li>

                <?php
                    getCategories();
                ?>
            </ul>
        </div>
    </section>

    <!-- Footer -->
    <?php
    include('includes/footer.php');
    ?>
</div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>
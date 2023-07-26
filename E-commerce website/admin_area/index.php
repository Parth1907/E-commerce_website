<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css file -->
    <link rel="stylesheet" href="../style.css">
    <title>Admin Dashboard</title>
</head>
<body>
    
    <div class="container-fluid p-0">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/kisspng-e-commerce-web-design-website-development-internet-ebook-vendors-mspbasics-com-5b6e96aa031a87.7762759015339741860127.png" alt="Logo" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link"><h5>Welcome guest</h1></a>
                        </li>
                    </ul>
                </nav> 
            </div>
        </nav>

        <!-- Admin Title -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- Admin Buttons -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5 pt-4">
                    <a href="#"><img src="../images/admin-icon.png" alt="" class="admin-image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>

                <div class="button text-center me-5"> 
                    <button>
                        <a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a>
                    </button>
                    <button>
                        <a href="" class="nav-link text-light bg-info my-1">View Products</a>
                    </button>
                    <button>
                        <a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a>
                    </button>
                    <button>
                        <a href="" class="nav-link text-light bg-info my-1">View Categories</a>
                    </button>
                    <button>
                        <a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands</a>
                    </button>
                    <button>
                        <a href="" class="nav-link text-light bg-info my-1">View Brands</a>
                    </button>
                    <button>
                        <a href="" class="nav-link text-light bg-info my-1">All Orders</a>
                    </button>
                    <button>
                        <a href="" class="nav-link text-light bg-info my-1">All payments</a>
                    </button>
                    <button>
                        <a href="" class="nav-link text-light bg-info my-1">List Users</a>
                    </button>
                    <button>
                        <a href="" class="nav-link text-light bg-info my-1">Logout</a>
                    </button>
                </div>
            </div>
        </div>

        <!-- Admin Forms/ Show on btn press php for all btns -->
        <div class="container my-4">
            <?php 
                if (isset($_GET['insert_category'])) {
                    include('insert_categories.php');
                }
                if (isset($_GET['insert_brands'])) {
                    include('insert_brands.php');
                }
            ?>
        </div>
    </div>

    

    <!-- Footer -->
    <footer class="bg-info p-1 text-center" style="
    position: absolute;
    bottom: 0;
    width: 100%;">
        <p>All rights reserved &copy;- Designed by Parth kalra-2023</p>
    <footer>
</body>
</html>


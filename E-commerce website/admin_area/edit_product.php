<?php

if (isset($_GET['edit_product'])) {
    $product_id = $_GET['edit_product'];

    // info given from table or set previously
    $select_query = "Select * from `products` where product_id='$product_id'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $product_title = $row_fetch['product_title'];
    $description = $row_fetch['product_description'];
    $product_keywords = $row_fetch['product_keywords'];
    $product_img1 = $row_fetch['product_image1'];
    $product_img2 = $row_fetch['product_image2'];
    $product_img3 = $row_fetch['product_image3'];
    $product_price = $row_fetch['product_price'];

    // to update the previous info 
    if (isset($_POST['update_product'])) {
        $updated_product_title = $_POST['product_title'];
        $updated_description = $_POST['description'];
        $updated_product_keywords = $_POST['product_keywords'];
        $updated_product_img1 = $_FILES['product_image1']['name'];
        $updated_product_img2 = $_FILES['product_image2']['name'];
        $updated_product_img3 = $_FILES['product_image3']['name'];
        $updated_product_price = $_POST['product_price'];

        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];

        move_uploaded_file($temp_image1, "./product_images/$updated_product_img1");
        move_uploaded_file($temp_image2, "./product_images/$updated_product_img2");
        move_uploaded_file($temp_image3, "./product_images/$updated_product_img3");

        $update_query = "Update `products` set 
        product_title= '$updated_product_title', 
        product_description= '$updated_description', 
        product_keywords= '$updated_product_keywords', 
        product_image1= '$updated_product_img1', 
        product_image2= '$updated_product_img2', 
        product_image3= '$updated_product_img3', 
        product_price= '$updated_product_price' where product_id=$product_id";

        if ($result_updated_query = mysqli_query($con, $update_query)) {
            echo "<script>alert('Succesfully inserted the updated product details')</script>";
            echo "<script>window.open('view_product.php','_self')</script>";
        }
    }
}

?>

<div class="container mt-3">
    <h1 class="text-center">Edit Product</h1>

    <!-- form -->
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <!-- title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product title</label>
            <input type="text" name="product_title" id="product_title" class="form-control"
                placeholder="Enter product title" value="<?php echo $product_title ?>" autocomplete="false" >
        </div>

        <!-- description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description" class="form-control"
                placeholder="Enter product description" value="<?php echo $description ?>" autocomplete="false" >
        </div>

        <!-- keywords -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords" class="form-label">Keywords</label>
            <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" value="<?php echo $product_keywords ?>" autocomplete="false" >
        </div>

        <!-- categories -->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_category" id="category_select" class="form-select">
                <option value="">Select a Category</option>
                <?php
                $select_query = "Select * from `categories`";
                $result_query = mysqli_query($con, $select_query);

                while ($row = mysqli_fetch_assoc($result_query)) {
                    $category_title = $row['category_title'];
                    $category_id = $row['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
                ?>
            </select>
        </div>

        <!-- brand -->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_brand" id="brand_select" class="form-select">
                <option value="">Select a Brand</option>
                <?php
                $select_query = "Select * from `brands`";
                $result_query = mysqli_query($con, $select_query);

                while ($row = mysqli_fetch_assoc($result_query)) {
                    $brand_title = $row['brand_title'];
                    $brand_id = $row['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }
                ?>
            </select>
        </div>

        <!-- Image 1 -->
        <label for="product_image1" class="form-label mb-0">Product Image 1</label>
        <div class="form-outline mb-4 w-50 m-auto d-flex">
            <input type="file" name="product_image1" id="product_image1" class="form-control m-auto" placeholder="Enter product keywords" autocomplete="false">
            <img src="./product_images/<?php echo $product_img1 ?>" alt="product image" class="edit-img">
        </div>

        <!-- Image 2 -->
        <label for="product_image2" class="form-label mb-0">Product Image 2</label>
        <div class="form-outline mb-4 w-50 m-auto d-flex">
            <input type="file" name="product_image2" id="product_image2" class="form-control m-auto" placeholder="Enter product keywords" autocomplete="false">
            <img src="./product_images/<?php echo $product_img2 ?>" alt="product image" class="edit-img">
        </div>

        <!-- Image 3 -->
        <label for="product_image3" class="form-label mb-0">Product Image 3</label>
        <div class="form-outline mb-4 w-50 m-auto d-flex">
            <input type="file" name="product_image3" id="product_image3" class="form-control m-auto" autocomplete="false">
            <img src="./product_images/<?php echo $product_img3 ?>" alt="product image" class="edit-img">
        </div>

        <!-- price -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="product_price" class="form-control"
                placeholder="Enter product price" value="<?php echo $product_price ?>" autocomplete="false">
        </div>

        <!-- submission -->
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="update_product" class="btn btn-info mb-3 px-3" value="Update Product">
        </div>
    </form>
</div>
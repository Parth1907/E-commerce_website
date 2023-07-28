<div class="container mt-3">
    <h1 class="text-center">Edit Product</h1>

    <!-- form -->
    <form action="" method="post" enctype="multipart/form-data">
        <!-- title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product title</label>
            <input type="text" name="product_title" id="product_title" class="form-control"
                placeholder="Enter product title" autocomplete="false" required>
        </div>

        <!-- description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description" class="form-control"
                placeholder="Enter product description" autocomplete="false" required>
        </div>

        <!-- keywords -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords" class="form-label">Keywords</label>
            <input type="text" name="product_keywords" id="product_keywords" class="form-control"
                placeholder="Enter product keywords" autocomplete="false" required>
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
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image1" class="form-label">Product Image 1</label>
            <input type="file" name="product_image1" id="product_image1" class="form-control"
                placeholder="Enter product keywords" autocomplete="false" required>
        </div>

        <!-- Image 2 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image2" class="form-label">Product Image 2</label>
            <input type="file" name="product_image2" id="product_image2" class="form-control"
                placeholder="Enter product keywords" autocomplete="false" required>
        </div>

        <!-- Image 3 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image3" class="form-label">Product Image 3</label>
            <input type="file" name="product_image3" id="product_image3" class="form-control" autocomplete="false"
                required>
        </div>

        <!-- price -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="product_price" class="form-control"
                placeholder="Enter product price" autocomplete="false" required>
        </div>

        <!-- submission -->
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
        </div>
    </form>
</div>
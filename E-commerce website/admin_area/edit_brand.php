<?php
if (isset($_GET['edit_brand'])) {
    $brand_id = $_GET['edit_brand'];

    // info given from table or set previously
    $select_query = "Select * from `brands` where brand_id='$brand_id'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $brand_title = $row_fetch['brand_title'];

    if (isset($_POST['update_brand'])) {
        $updated_brand_title = $_POST['brand_title'];
        $update_query = "Update `categories` set 
            brand_title= '$updated_brand_title' where brand_id=$brand_id";
            if ($result_updated_query = mysqli_query($con, $update_query)) {
                echo "<script>alert('Succesfully inserted the updated brand details')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }  
    }
}
?>
<div class="container mt-3">
    <h1 class="text-center">Edit brand</h1>

    <!-- form -->
    <form action="" method="post" class="text-center">
        <!-- title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label">brand title</label>
            <input type="text" name="brand_title" id="brand_title" class="form-control"
                placeholder="Enter brand title" value="<?php echo $brand_title ?>" autocomplete="false" >
        </div>
        <!-- submission -->
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="update_brand" class="btn btn-info mb-3 px-3" value="Update brand">
        </div>
    </form>
</div>

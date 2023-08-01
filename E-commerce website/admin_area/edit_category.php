<?php
if (isset($_GET['edit_category'])) {
    $category_id = $_GET['edit_category'];

    // info given from table or set previously
    $select_query = "Select * from `categories` where category_id='$category_id'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $category_title = $row_fetch['category_title'];

    if (isset($_POST['update_category'])) {
        $updated_category_title = $_POST['category_title'];
        $update_query = "Update `categories` set 
            category_title= '$updated_category_title' where category_id=$category_id";
            if ($result_updated_query = mysqli_query($con, $update_query)) {
                echo "<script>alert('Succesfully inserted the updated category details')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }  
    }
}
?>
<div class="container mt-3">
    <h1 class="text-center">Edit category</h1>

    <!-- form -->
    <form action="" method="post" class="text-center">
        <!-- title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label">category title</label>
            <input type="text" name="category_title" id="category_title" class="form-control"
                placeholder="Enter category title" value="<?php echo $category_title ?>" autocomplete="false" >
        </div>
        <!-- submission -->
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="update_category" class="btn btn-info mb-3 px-3" value="Update category">
        </div>
    </form>
</div>

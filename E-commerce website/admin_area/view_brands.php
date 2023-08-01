<div class="d-flex flex-column align-items-center">
    <h3 class="text-center text-success">All brands</h3>
    <table class="table table-bordered mt-3 w-75 text-center">
        <thead class="bg-info">
            <tr>
                <th>Brand ID</th>
                <th>Brand Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

        </thead>
        <tbody class="bg-secondary text-light">
            <?php

            $get_brand = "Select * from `brands`";
            $result = mysqli_query($con, $get_brand);
            while ($row = mysqli_fetch_assoc($result)) {
                $brand_id = $row['brand_id'];
                $brand_title = $row['brand_title'];
            ?>
                <tr>
                    <td><?php echo $brand_id ?></td>
                    <td><?php echo $brand_title ?></td>
                    <td>
                        <a href='index.php?edit_brand=<?php echo $brand_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a>
                    </td>
                    <td>
                        <a href='index.php?delete_brand=<?php echo $brand_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
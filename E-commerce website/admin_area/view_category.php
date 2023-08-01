<div class="d-flex flex-column align-items-center">
    <h3 class="text-center text-success">All categories</h3>
    <table class="table table-bordered mt-3 w-75 text-center">
        <thead class="bg-info">
            <tr>
                <th>Category ID</th>
                <th>Category Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

        </thead>
        <tbody class="bg-secondary text-light">
            <?php

            $get_category = "Select * from `categories`";
            $result = mysqli_query($con, $get_category);
            while ($row = mysqli_fetch_assoc($result)) {
                $category_id = $row['category_id'];
                $category_title = $row['category_title'];
            ?>
                <tr>
                    <td><?php echo $category_id ?></td>
                    <td><?php echo $category_title ?></td>
                    <td>
                        <a href='index.php?edit_category=<?php echo $category_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a>
                    </td>
                    <td>
                        <a href='index.php?delete_category=<?php echo $category_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
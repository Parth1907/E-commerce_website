
<div class="d-flex flex-column align-items-center">
    <h3 class="text-center text-success">All users</h3>
    <table class="table table-bordered mt-3 w-75 text-center">
        <thead class="bg-info">
            <tr>
                <th>User ID</th>
                <th>User name</th>
                <th>User email</th>
                <th>User image</th>
                <th>User mobile</th>
                <th>User address</th>
                <th>Delete</th>
            </tr>


        </thead>
        <tbody class="bg-secondary text-light">
            <?php

            $get_all_users = "Select * from `user_table`";
            $result_users = mysqli_query($con, $get_all_users);
            while ($row_user = mysqli_fetch_assoc($result_users)) {
                $user_id=$row_user['user_id'];
                $username=$row_user['username'];
                $user_email=$row_user['user_email'];
                $user_image=$row_user['user_image'];
                $user_mobile=$row_user['user_mobile'];
                $user_address=$row_user['user_address'];
            ?>

                <tr>
                    <td>
                        <?php echo $user_id ?>
                    </td>
                    <td>
                        <?php echo "$username" ?>
                    </td>
                    <td>
                        <?php echo "$user_email" ?>
                    </td>
                    <td>
                        <img src="../users_area/user_img/<?php echo "$user_image" ?>" alt="" class="edit-img">    
                    </td>
                    <td>
                        <?php echo "$user_mobile" ?>
                    </td>
                    <td>
                        <?php echo "$user_address" ?>
                    </td>
                    <td>
                        <a href='index.php?delete_user=<?php echo $user_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a>
                    </td>
                </tr>

                <?php
            }
            ?>
        </tbody>
    </table>
</div>

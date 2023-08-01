<div class="d-flex flex-column align-items-center">
    <h3 class="text-center text-success">All orders</h3>
    <table class="table table-bordered mt-3 w-75 text-center">
        <thead class="bg-info">
            <tr>
                <th>Order ID</th>
                <th>Due amount</th>
                <th>Invoice no</th>
                <th>Total Products</th>
                <th>Order date</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>


        </thead>
        <tbody class="bg-secondary text-light">
            <?php

            $get_all_orders_query = "Select * from `user_orders`";
            $result_orders = mysqli_query($con, $get_all_orders_query);
            $num_of_rows = mysqli_num_rows($result_orders);
            if ($num_of_rows == 0) {
                echo "<h2 class='text-center text-danger'>No orders have been placed yet</h2>";
            } else {
                while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                    $order_id = $row_orders['order_id'];
                    $amount_due = $row_orders['amount_due'];
                    $invoice_number = $row_orders['invoice_number'];
                    $total_products = $row_orders['total_products'];
                    $order_date = $row_orders['order_date'];
                    $status = $row_orders['order_status'];
            ?>

                    <tr>
                        <td>
                            <?php echo $order_id ?>
                        </td>
                        <td>
                            <?php echo "$amount_due" ?>
                        </td>
                        <td>
                            <?php echo "$invoice_number" ?>
                        </td>
                        <td>
                            <?php echo "$total_products" ?>
                        </td>
                        <td>
                            <?php echo "$order_date" ?>
                        </td>
                        <td>
                            <?php echo "$status" ?>
                        </td>
                        <td>
                            <a href='index.php?delete_order=<?php echo $order_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a>
                        </td>
                    </tr>

            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>